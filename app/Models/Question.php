<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $fillable = [
        'question', 'survey_id', 'question_type_id', 'options'
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array'
        ];
    }
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function questionType(): BelongsTo
    {
        return $this->belongsTo(QuestionType::class);
    }
}
