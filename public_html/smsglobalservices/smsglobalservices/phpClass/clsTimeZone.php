<?php
    class clsTimeZone {
        /**
         *
         * @param string $unformatted_offset
         * @return DateTime
         */
        private function calculateSecondsForOffset($unformatted_offset) {

            $sec_in_hr = 3600;
            $sec_in_min = 60;

            $offsetParts = explode(":", $unformatted_offset);
            $mulFactor = -1;
            $hours = 0;
            $minutes = 0;

            if(count($offsetParts) > 1) {
                $hours = intval($offsetParts[0]);
                $minutes = intval($offsetParts[1]);
            }
            else {
                $hours = intval($offsetParts[0]);
                $minutes = 0;
            }

            $finalHSec = $hours * $sec_in_hr;
            $finalMSec = $minutes * $sec_in_min;
            $finalduo = $finalHSec + $finalMSec;
            $finalduo *= $mulFactor;

            return $finalduo;
        }

        /**
         *
         * @param date $time
         * @param string $calculate_for_offset
         * @param string $your_current_offset
         * @return DateTime
         */
        function getTimeForTimezoneOffset($time, $your_current_offset, $calculate_for_offset) {
            $inTime = strtotime($time);

            $aSeconds = $this->calculateSecondsForOffset($calculate_for_offset);
            $bSeconds = -1 * $this->calculateSecondsForOffset($your_current_offset);

            $inTime += $aSeconds;
            $inTime += $bSeconds;

            $tzObj = new DateTimeZone("GMT");
            $ndtObj = new DateTime(date("Y-m-d H:i",$inTime), $tzObj);

            return $ndtObj;
        }
    }
?>
