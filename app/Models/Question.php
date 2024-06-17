<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $with = ['questionType', 'responses'];
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

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }
}
