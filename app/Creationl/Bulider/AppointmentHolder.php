<?php

namespace App\Creationl\Bulider;

use Carbon\Carbon;
use DateTime;

class AppointmentHolder
{
    private $location;
    private $zipCode;
    private $date;
    private $durationTime = [];

    function __construct($location, $date)
    {
        $this->location = $location;
        $this->date = $date;
    }
    public function checkLocation()
    {
        if ($this->location["country_name"] == "Uk") {
            $this->zipCode = $this->location['zipcode'];
        } else {
            $this->zipCode = false;
        }
    }

    public function getTimeFromDate()
    {
        $time = new DateTime($this->date);
        $startTime = $time->format('H:i:s');
        $date = Carbon::parse($this->date)->addHour();
        $endHour = new DateTime($date);
        $endTime = $endHour->format('H:i:s');
        $theDate = new DateTime($date);
        $theFormatedDate = $theDate->format('Y-m-d');
        $this->durationTime["start"] = $startTime;
        $this->durationTime["end"] = $endTime;
        $this->durationTime["date"] = $theFormatedDate;
    }

    public function getConfigData()
    {
        return array("zip_code" => $this->zipCode, "time" => $this->durationTime);
    }
}
