<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $guarded = ['id'];

    protected $fillable = [
        'employee_id',
        'position_id',
        'date',
        'clock_in',
        'clock_out',
        'work_days',
        'total_overtime_hours',
        'notes'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
