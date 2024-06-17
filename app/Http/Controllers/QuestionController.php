<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): QuestionResource
    {
        $survey = auth()->user()->surveys()->findOrFail($request->survey_id);
        $question = $survey->questions()->create($request->all());

        return new QuestionResource($question);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question): QuestionResource
    {
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question): QuestionResource
    {
        $question->update($request->all());

        return new QuestionResource($question);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question): \Illuminate\Http\Response
    {
        $question->delete();

        return response()->noContent();
    }
}
