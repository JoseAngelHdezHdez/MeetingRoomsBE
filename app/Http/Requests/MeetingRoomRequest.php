<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $meeting_room_id = $this->id;
        return [
            'code_room' => "required|string|unique:meeting_rooms,code_room,{$meeting_room_id}",
            'size' => 'required|in:Grande,Mediano,Chico'
        ];
    }
}
