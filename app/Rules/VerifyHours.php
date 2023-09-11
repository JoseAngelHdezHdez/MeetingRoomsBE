<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VerifyHours implements Rule
{
    protected $start_date;
    protected $finish_date;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start_date, $finish_date)
    {
        $this->start_date = $start_date;
        $this->finish_date = $finish_date;
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
        $startMeeting = strtotime($this->start_date);
        $finishMeeting = strtotime($this->finish_date);

        // Verificar que start_meeting sea menor o igual que finish_meeting
        if ($startMeeting > $finishMeeting) {
            return false;
        }

        // Calcular la diferencia en segundos (3600 segundos en una hora)
        $differenceInSeconds = $finishMeeting - $startMeeting;

        // Verificar que la diferencia sea de 2 horas o menos (7200 segundos)
        if ($differenceInSeconds > 7200) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La duración de la reunión no es válida.';
    }
}
