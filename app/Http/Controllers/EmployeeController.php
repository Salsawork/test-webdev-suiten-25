<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Bank;
use App\Models\Position;
use App\Models\Shift;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with(['bank', 'position'])->paginate(99);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create', [
            'banks' => Bank::all(),
            'positions' => Position::all(),
            'shifts' => Shift::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required',
            'bank_id' => 'required',
            'phone' => 'nullable',
        ]);

        Employee::create([
            'name' => $request->name,
            'position_id' => $request->position_id,
            'bank_id' => $request->bank_id,
            'phone' => $request->phone,
            'bank_account_number' => $request->bank_account_number,
            'salary_base' => $request->salary_base,
            'salary_period' => $request->salary_period,
            'meal_allowance' => $request->meal_allowance,
            'meal_allowance_holiday' => $request->meal_allowance_holiday,
            'shift_id' => $request->shift_id,
            'overtime_rate' => $request->overtime_rate,
            'overtime_rate_holiday' => $request->overtime_rate_holiday,
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'banks' => Bank::all(),
            'shifts' => Shift::all(),
            'positions' => Position::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Deleted');

    }
}
