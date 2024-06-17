<?php

namespace App\Observers;

use App\Models\Response;

class ResponseObserver
{
    /**
     * Handle the Response "updated" event.
     */
    public function creating(Response $response): void
    {
        $response->user_id = auth()->id();
    }
}
