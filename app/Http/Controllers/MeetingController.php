<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Meeting;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Meeting::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeetingRequest $request)
    {
        $newMeeting = Meeting::create($request->validated());
        return response()->json(
            $newMeeting,
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        return response()->json(
            $meeting,
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MeetingRequest $request, Meeting $meeting)
    {
        $meeting->fill($request->validated());
        $meeting->save();
        return response()->json(
            $meeting,
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return response()->json(
            [],
            200
        );
    }
}
