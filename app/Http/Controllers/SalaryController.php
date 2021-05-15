<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\SalaryHistory;
use App\Models\SalaryProcess;
use Carbon\Carbon;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function salaryUpdate()
    {
        $employees = Employee::all();
        return view('salary.salary_update', compact('employees'));
    }

    public function salaryUpdateStore(Request $request)
    {

        $lastSalary = SalaryHistory::where('employee_id', $request->employee_id)->latest()->first();
        $lastSalary->to = Carbon::now();
        $lastSalary->status = 0;
        $lastSalary->save();

        $salary = new SalaryHistory();
        $salary->employee_id = $request->employee_id;
        $salary->salary = $request->salary;
        $salary->status = 1;
        $salary->from = Carbon::now();

        $salary->save();


        
        $emp = Employee::find($request->employee_id);

        // $emp = new Employee();
        $emp->salary = $request->salary;

        $emp->save();
        
        return redirect()->route('employee')
            ->with('success', 'Salary Updated successfully.');
    }

    public function salaryAssignGet(){
        $employees = Employee::all();
        return view('salary.salary_assign', compact('employees'));
    }

    public function salaryAssign(Request $request)
    {
        $salary = new SalaryProcess();
        $salary->salary_year = $request->s_year;
        $salary->salary_month = $request->s_month;
        $salary->employee_id = $request->employee;
        $salary->salary_amount = $request->salary;
        $salary->paid_amount = $request->paid_salary;
        $salary->due_amount = $salary->salary_amount - $salary->paid_amount;
        // convert date format
        $myDate = $request->date;
        $date = Carbon::createFromFormat('d/m/Y', $myDate)->format('Y-m-d');
        $salary->salary_date = $date;
        $salary->save();

        return redirect()->route('employee')
            ->with('success', 'Salary Paid successfully.');
    }

    public function salaryHistory(){
        $salaries = SalaryProcess::with('employee')->get();
        return view('salary.salary_history', compact('salaries'));
    }

}
