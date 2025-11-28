<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'position_id',
        'bank_id',
        'phone',
        'bank_account_number',
        'salary_base',
        'salary_period',
        'meal_allowance',
        'meal_allowance_holiday',
        'shift',
        'overtime_rate',
        'overtime_rate_holiday'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
