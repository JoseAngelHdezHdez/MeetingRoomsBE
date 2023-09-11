<?php

namespace App\Http\Requests;

use App\Rules\MeetingDates;
use App\Rules\VerifyHours;
use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
        $id = $this->id;
        $start_date = $this->start_meeting;
        $finish_date = $this->finish_meeting;
        return [
            'meeting_room_id' => ['required', 'integer', 'exists:meeting_rooms,id', new MeetingDates($start_date, $finish_date, $id), new VerifyHours($start_date, $finish_date)],
            'start_meeting' => "required|date",
            'finish_meeting' => "required|date",
            'status_meeting' => 'nullable|in:Finalizado,En proceso,Programado'
        ];
    }
}
