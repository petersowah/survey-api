<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseResource;
use App\Models\Question;
use App\Models\Response;
use App\Models\Survey;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Survey $survey, Question $question, Request $request): ResponseResource
    {
        $response = $question->responses()->create($request->all());

        return new ResponseResource($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Survey $survey, Question $question, Response $response, Request $request): ResponseResource
    {
       $response->update($request->all());

        return new ResponseResource($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response): \Illuminate\Http\Response
    {
        $response->delete();

        return response()->noContent();
    }
}
