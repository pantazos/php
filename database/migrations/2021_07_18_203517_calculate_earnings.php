<?php

use App\Models\Booking;
use App\Models\Status;
use Illuminate\Database\Migrations\Migration;

class CalculateEarnings extends Migration
{
    public function up()
    {
        $bookings = Booking::ByStatusArray([Status::DONE, Status::REVIEWED])->whereHas('provider')->get();
        foreach ($bookings as $booking) {
            $provider = $booking->provider;

            $provider->providerEarning()->updateOrCreate(
                ['provider_id' => $provider->id],
                [
                    'bookings_count' => ($provider->providerEarning->bookings_count ?? 0) + 1,
                    'total_earning' => ($provider->providerEarning->total_earning ?? 0) + $booking->total,
                    'admin_earning' => ($provider->providerEarning->admin_earning ?? 0) + $booking->commission,
                    'provider_earning' => ($provider->providerEarning->provider_earning ?? 0) + $booking->total - $booking->commission,
                    'total_tax' => ($provider->providerEarning->total_tax ?? 0) + $booking->tax
                ]
            );
        }
    }
}
