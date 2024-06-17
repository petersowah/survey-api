<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyRequest;
use App\Http\Requests\UpdateSurveyRequest;
use App\Http\Resources\SurveyResource;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SurveyResource::collection(Survey::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurveyRequest $request): SurveyResource
    {
        $user = auth()->user();

        $survey = $user->surveys()->create($request->only([
            'title', 'description'
        ]));

        return new SurveyResource($survey);
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey): SurveyResource
    {
        return new SurveyResource($survey);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveyRequest $request, Survey $survey): SurveyResource
    {
        $survey->update($request->only([
            'title', 'description'
        ]));

        return new SurveyResource($survey);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey): \Illuminate\Http\Response
    {
        $survey->delete();

        return response()->noContent();
    }

    public function responses(Request $request, Survey $survey): SurveyResource
    {
        collect($request->all())->each(fn($response) => $survey->responses()->create($response));

        return new SurveyResource($survey);
    }
}
