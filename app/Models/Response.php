<?php

namespace App\Models;

use App\Observers\ResponseObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([ResponseObserver::class])]
class Response extends Model
{
    protected $fillable = [
       'question_id', 'user_id', 'answer'
    ];

    public function question(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
