<?php

namespace App\Observers;

use App\Models\Survey;

class SurveyObserver
{
    /**
     * Handle the Survey "created" event.
     */
    public function creating(Survey $survey): void
    {
        $survey->published_at = now();
    }
}
