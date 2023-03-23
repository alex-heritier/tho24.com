<?php

namespace App\Models\DTO;

use Illuminate\Support\Facades\Log;

class BizCalendar
{
    const WEEKDAYS = ['Su', 'M', 'Tu', 'W', 'Th', 'F', 'Sa'];

    private string $date;
    private string $firstDay;

    function __construct($date = null)
    {
        $this->date = isset($date) ? $date : date('Y-m-d');
        // Get the day of the week of the 1st day of the current month
        $this->firstDay = date('Y-m-01', strtotime(substr($this->date, 0, 7) . '-01'));
    }

    public function getCalendarGrid(): array
    {
        $grid = [];

        $daysUntilFirstDay = date('N', strtotime($this->firstDay)) % 7; // 0 is Sunday, 6 is Saturday
        for ($i = 0; $i < 5; $i++) {
            $grid[$i] = [];
            for ($j = 0; $j < 7; $j++) {
                $offset = -$daysUntilFirstDay;
                // Log::debug($this->firstDay . " $offset days");
                $currDate = date('Y-m-d', strtotime($this->firstDay . " $offset days"));

                $grid[$i][$j] = [
                    'dotm' => ltrim(date('d', strtotime($currDate)), '0'),
                    'pretty_date' => date('m-d-Y', strtotime($currDate)),
                    // 'days_until' => $daysUntilFirstDay,
                ];

                $daysUntilFirstDay--;
            }
        }

        return $grid;
    }
}
