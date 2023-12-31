<?php

namespace App\Rules;

use App\Meeting;
use Illuminate\Contracts\Validation\Rule;

class MeetingDates implements Rule
{
    protected $start_date;
    protected $finish_date;
    protected $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start_date, $finish_date, $id)
    {
        $this->start_date = $start_date;
        $this->finish_date = $finish_date;
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $newMeeting = [
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
        ];
        $meetings = Meeting::where('meeting_room_id', $value)->get();

        foreach ($meetings as $meeting){
            if ($this->id === $meeting->id && $newMeeting['start_date'] === $meeting['start_meeting'] && $newMeeting['finish_date'] === $meeting['finish_meeting']) {
                return true;
            }
            if ($this->datesOverlap($newMeeting, $meeting, $this->id)) {
                return false;
            }
        }
        return true;
    }

    protected function datesOverlap($newMeeting, $existingMeeting, $id)
    {
        return !(
            $newMeeting['finish_date'] < $existingMeeting['start_meeting'] ||
            $newMeeting['start_date'] > $existingMeeting['finish_meeting']
        );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La validación ha fallado: las fechas se superponen con reuniones existentes.';
    }
}
