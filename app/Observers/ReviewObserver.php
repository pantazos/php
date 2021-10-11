<?php

namespace App\Observers;

use App\Models\Review;
use App\Models\Status;
use Hashids\Hashids;

class ReviewObserver
{
    /**
     * Handle the Request on creating.
     *
     * @param Review $review
     * @return void
     */
    public function creating(Review $review)
    {
        // Generate random and unique key for the request
        $hashids = new Hashids($review, 10);
        $uniqueNumber = (int)(microtime(true) * 10000);

        $review->key = $hashids->encode($uniqueNumber);
    }

    public function created(Review $review)
    {
        $reviewed = Status::byKey(Status::REVIEWED)->first();
        $review->booking->status()
            ->associate($reviewed)
            ->update();
    }
}
