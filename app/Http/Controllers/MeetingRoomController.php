<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRoomRequest;
use App\Meeting;
use App\MeetingRoom;

class MeetingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            MeetingRoom::all(),
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MeetingRoomRequest $request)
    {
        $newMeetingRoom = MeetingRoom::create($request->validated());
        return response()->json(
            $newMeetingRoom,
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(MeetingRoom $meeting_room)
    {
        return response()->json(
            $meeting_room,
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MeetingRoomRequest $request, MeetingRoom $meeting_room)
    {
        $meeting_room->fill($request->validated());
        $meeting_room->save();
        return response()->json(
            $meeting_room,
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MeetingRoom $meeting_room)
    {
        $meeting_room->delete();
        return response()->json(
            [],
            200
        );
    }

    public function meetingRoomSchedule(MeetingRoom $meeting_room)
    {
        return response()->json(
            Meeting::all()->where('meeting_room_id', $meeting_room->id),
            200
        );
    }
}
