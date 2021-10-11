<?php

namespace App\Observers;

use App\Models\Booking;
use Hashids\Hashids;

class BookingObserver
{
    /**
     * Handle the Request on creating.
     *
     * @param Booking $booking
     * @return void
     */
    public function creating(Booking $booking)
    {
        // Generate random and unique key for the request
        $hashids = new Hashids($booking, 10);
        $uniqueNumber = (int)(microtime(true) * 10000);

        $booking->key = $hashids->encode($uniqueNumber);
    }
}
