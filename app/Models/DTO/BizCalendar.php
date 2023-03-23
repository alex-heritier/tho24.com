<?php

namespace App\Models\DTO;

class BizCalendar
{
    const WEEKDAYS = ['Su', 'M', 'Tu', 'W', 'Th', 'F', 'Sa'];

    private int $first_day_weekcode;
    private int $num_days_in_current_month;
    private int $num_days_in_prev_month;

    function __construct(protected $date)
    {
        // Get the day of the week of the 1st day of the current month
        $first_day = date('Y-m-01');
        $first_day_weekday = date('N', strtotime($first_day)) % 7; // 0 is Sunday, 6 is Saturday

        // Get the number of days in the previous month
        $prev_month = date('Y-m-01', strtotime('-1 month'));
        $num_days_in_prev_month = date('t', strtotime($prev_month));

        $this->first_day_weekcode = $first_day_weekday;
        $this->num_days_in_current_month = date('t');
        $this->num_days_in_prev_month = $num_days_in_prev_month;

        // echo "first_day_weekcode - " . $this->first_day_weekcode . "\n";
        // echo "num_days_in_current_month - " . $this->num_days_in_current_month . "\n";
        // echo "num_days_in_prev_month - " . $this->num_days_in_prev_month . "\n";
    }

    public function getCalendarGrid(): array
    {
        $grid = [];

        $days_away_from_main_month = $this->first_day_weekcode;

        for ($i = 0; $i < 5; $i++) {
            $grid[$i] = [];
            for ($j = 0; $j < 7; $j++) {
                $main_month_value = 7 * $i + $j - $this->first_day_weekcode;
                $prev_month_value = $this->num_days_in_prev_month - $days_away_from_main_month + 1;

                $value = ($days_away_from_main_month <= 0) ? (($main_month_value % $this->num_days_in_current_month) + 1) : $prev_month_value;
                $grid[$i][$j] = $value;

                $days_away_from_main_month--;
            }
        }

        return $grid;
    }
}
