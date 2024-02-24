<?php

namespace App\Http\Resources\EmployeeAttendance;

use App\Http\Resources\Employee\SimpleEmployeeResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeAttendanceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'check_date' => ($this->check_date),
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'photo_check_in' => $this->photo_check_in,
            'photo_check_out' => $this->photo_check_out,
            'location_check_in' => json_decode($this->location_check_in),
            'location_check_out' => json_decode($this->location_check_out),
            'note' => $this->note,

            'month' => Carbon::parse($this->check_date)->format('M'),
            'date' => Carbon::parse($this->check_date)->format('d'),

            'full_date' => Carbon::parse($this->check_date)->translatedFormat('l, j F Y'),

            'tanggal_formated' => Carbon::parse($this->check_date)->translatedFormat('l, j F Y'),
            'detail' => $this->processCheckInAndCheckOut($this->check_in, $this->check_out),

            'employee' => $this->when(strpos(request()->route()->getName(), 'employees.') !== 0, function () {
                return new SimpleEmployeeResource($this->employee);
            }),

            'trashed' => $this->when(auth()->check() && auth()->user()->hasAnyRole(['admin', 'superadmin']), function () {
                return (bool) $this->deleted_at;
            }),

        ];
    }

    function processCheckInAndCheckOut($checkIn, $checkOut)
    {
        // Define the time ranges
        $checkInStartTime = Carbon::parse('08:00:00');
        $checkInLateTime = Carbon::parse('09:00:00');
        $checkInEndTime = Carbon::parse('11:59:59');
        $checkOutStartTime = Carbon::parse('12:00:00');
        $checkOutEndTime = Carbon::parse('23:59:59');
        $startOfDay = Carbon::parse('00:00:00');

        // Parse check-in and check-out times
        $checkInTime = Carbon::parse($checkIn);
        $checkOutTime = Carbon::parse($checkOut);
        // return $checkInTime->diffInMinutes($checkInLateTime);

        // Initialize variables to track late and early minutes
        $lateMinutes = 0;
        $earlyMinutes = 0;
        $flag = null;
        $noteCheckIn = null;
        $noteCheckOut = null;
        $officeHours = $checkOutTime->diffInMinutes($checkInTime);
        // $officeHours = $checkOutTime->diffInMinutes($checkInTime) / 60;

        //CHECK IN
        // Check if check-in is outside the valid range
        if ($checkInTime < $startOfDay || $checkInTime > $checkInEndTime || $checkInTime === null) {
            $permitCheckIn = true;
            $lateFromCheckIn = null;
            $lateMinutes = null;
            $noteCheckIn = 'Izin setengah hari 08:00 - 12:00';
        } elseif ($checkInTime > $checkInLateTime) {
            // Calculate late minutes
            $lateMinutes = $checkInTime->diffInMinutes($checkInLateTime);
            $permitCheckIn = false;
            $lateFromCheckIn = true;
            $noteCheckIn = 'Datang terlambat';
            $officeHours -= $lateMinutes;
            // $officeHours -= $lateMinutes / 60;
        } else if ($checkInTime < $checkInStartTime) {
            //calculate if check in before 08:00:00 set to 08:00:00
            $lateFromCheckIn = false;
            $permitCheckIn = false;
            $checkInTime = $checkInStartTime;
            $officeHours = $checkOutTime->diffInMinutes($checkInTime);
            // $officeHours = $checkOutTime->diffInMinutes($checkInTime) / 60;
            $noteCheckIn = 'Datang kepagian';
        } else {
            $permitCheckIn = false;
            $lateFromCheckIn = false;
            $noteCheckIn = 'Datang tepat waktu';
        }

        //CHECK OUT
        // Check if check-out is outside the valid range
        if ($checkOutTime < $checkOutStartTime || $checkOutTime > $checkOutEndTime || $checkOutTime === null) {
            $permitCheckOut = true;
            $earlyFromCheckOut = null;
            $earlyMinutes = null;
            $noteCheckOut = 'Izin setengah hari 12:00 - 17:00';
        } elseif ($checkOutTime > $checkOutStartTime && $officeHours < 540) {
            // } elseif ($checkOutTime > $checkOutStartTime && $officeHours < 9) {
            // Calculate early minutes
            $earlyMinutes = $checkInTime->addHours(9)->diffInMinutes($checkOutTime);
            $permitCheckOut = false;
            $earlyFromCheckOut = true;
            $noteCheckOut = 'Pulang cepat';
        } else {
            $permitCheckOut = false;
            $earlyFromCheckOut = false;
            $noteCheckOut = 'Pulang sesuai aturan > 9 jam kerja';
        }

        // If either permit_check_in or permit_check_out is true, set office_hours to 9
        if ($permitCheckIn || $permitCheckOut) {
            $officeHours = 540;
            // $officeHours = 9;
        }
        // Mark early_from_check_out as true if office hours are less than 9 hours
        if (!$earlyFromCheckOut && $officeHours < 540) {
            // if (!$earlyFromCheckOut && $officeHours < 9) {
            $earlyFromCheckOut = true;
            $earlyMinutes += (540) - ($officeHours);
            // $earlyMinutes += (9 * 60) - ($officeHours * 60);
        }
        // If both permit_check_in and permit_check_out are true, set office_hours to 0
        if ($permitCheckIn && $permitCheckOut) {
            $officeHours = 0;
            $lateMinutes = 0;
            $earlyMinutes = 0;
        }

        // Initialize the result array
        $result = [
            'permit_check_in' => $permitCheckIn,
            'permit_check_out' => $permitCheckOut,
            'late_from_check_in' => $lateFromCheckIn,
            'early_from_check_out' => $earlyFromCheckOut,
            'late_minutes' => $this->formattedTime($lateMinutes),
            'early_minutes' => $this->formattedTime($earlyMinutes),
            'office_hours' => $this->formattedTime($officeHours),
            'note_check_in' => $noteCheckIn,
            'note_check_out' => $noteCheckOut,
        ];

        return $result;
    }

    function formattedTime($minutes)
    {
        if ($minutes >= 60) {
            $hours = floor($minutes / 60);
            $minutes = $minutes % 60;
            return "$hours Hour(s) and $minutes Minute(s)";
        } else {
            return "$minutes Minute(s)";
        }
    }
}
