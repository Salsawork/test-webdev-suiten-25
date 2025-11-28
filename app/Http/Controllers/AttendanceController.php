<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $attendances = Attendance::with(['employee', 'position'])
                    ->paginate(99);

    return view('attendances.index', compact('attendances'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendances.create', [
            'employees' => Employee::all(),
            'positions' => Position::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rows' => 'required|array',
        ]);

        foreach ($request->rows as $row) {
            if (!isset($row['checked'])) continue;
    
            $jamPulang = intval($row['jam_pulang']);
            $selisihJam = ($jamPulang > 17) ? ($jamPulang - 17) : 0;

            // Default
            $hariKerja = 1; 
            $totalLembur = 0;

            if ($selisihJam > 0) {
                if ($selisihJam >= 5) {
                    $hariKerja = 2;
                    $totalLembur = $selisihJam - 5;
                } else {
                    $hariKerja = 1;
                    $totalLembur = $selisihJam;
                }
            }
            $clockOutFormatted = sprintf("%02d:00:00", $jamPulang);
    
            Attendance::create([
                'employee_id'          => $row['employee_id'],
                'position_id'          => $row['position_id'],
                'date'                 => now()->format('Y-m-d'),
                'clock_in'             => '08:00:00',
                'clock_out'            => $clockOutFormatted, 
                
                'work_days'            => $hariKerja, 
                'total_overtime_hours' => $totalLembur,
            ]);
        }
        
        return redirect()->route('attendances.index')->with('success', 'Data absensi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        return view('attendances.edit', [
            'attendance' => $attendance,
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update($request->all());
        return redirect()->route('attendances.index')->with('success', 'Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Deleted');
    }
}
