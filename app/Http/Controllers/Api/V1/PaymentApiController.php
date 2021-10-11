<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BookingResource;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Http\Request;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use Symfony\Component\HttpFoundation\Response;

class PaymentApiController extends Controller
{
    /**
     * Create a PayPal order for the sent booking_key
     */
    public function createPayPalOrder(Request $request): Response
    {
        $isPayPalPaymentsEnabled = (boolean)Setting::byKey('enable_paypal_payments')->first()->value;
        if (!$isPayPalPaymentsEnabled) {
            return response(['message' => 'PayPal payments is not enabled'], 400);
        }

        $request->validate([
            'booking_key' => 'required|string'
        ]);

        $booking = Booking::where('key', $request->input('booking_key'))->firstOrFail();

        $payPalRequest = new OrdersCreateRequest();
        $payPalRequest->body = [
            "intent" => "CAPTURE",
            "application_context" => [
                "user_action" => "PAY_NOW"
            ],
            "purchase_units" => [
                [
                    "reference_id" => $booking->service->name . ' - ' . $booking->key,
                    "amount" => [
                        "value" => $booking->total,
                        "currency_code" => "USD"
                    ]
                ]
            ]
        ];

        $client = PayPalClient::client();
        $response = $client->execute($payPalRequest);
        return response()->json($response->result);
    }

    /**
     * Capture PayPal order and create new payment
     */
    public function capturePayPalOrder(Request $request): Response
    {
        $request->validate([
            'booking_key' => 'required|string',
            'order_id' => 'required|string'
        ]);

        $booking = Booking::where('key', $request->input('booking_key'))->firstOrFail();
        $paypalRequest = new OrdersCaptureRequest($request->input('order_id'));
        $paypalRequest->prefer('return=representation');
        $client = PayPalClient::client();
        $response = $client->execute($paypalRequest);

        if ($response->statusCode == 200 || $response->statusCode == 201) {
            // Update booking status to done and calculate the earnings
            $booking->markAsDone();

            // Create a new payment record
            $payment = new Payment([
                'amount' => $response->result->purchase_units[0]->amount->value,
                'method' => 'paypal'
            ]);
            $user = $request->user();
            $payment->user()->associate($user);
            $payment->save();

            return response(new BookingResource($booking));
        }

        return response()->json($response->result);
    }
}
