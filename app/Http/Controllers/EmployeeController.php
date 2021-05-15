<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SalaryHistory;
use Illuminate\Http\Request;
use App\Models\SalaryProcess;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function details($id)
    {
        $salaries = SalaryProcess::with('employee')->where('employee_id','=',$id)->get();
        $employee = Employee::find($id);
        return view('employee.details', compact('salaries','employee'));
    }

    public function getInfo(Request $request)
    {
        return Employee::find($request->emp_id);
    }

    public function create()
    {
        return view('employee.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'userid'=>'required',
            'email'=>'required|email|unique:employees',
            'designation' => 'required',
            'salary' => 'required|numeric'
        ]);

        $emp = new Employee();
        $emp->name = $request->name;
        $emp->userid = $request->userid;
        $emp->email = $request->email;
        $emp->designation = $request->designation;
        $emp->salary = $request->salary;
        $emp->remarks = $request->remarks;

        // if request has file
        if($request->hasFile('photo')){
            $filenameWithExt=$request->file('photo')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('photo')->getClientOriginalExtension();
            $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
            request()->photo->move(public_path('img'), $fileNameToStore);  
        }else{
           // if no file from request , then set default no-image.jpeg to database
           $fileNameToStore='no-image.jpeg';
        }
        $emp->photo=$fileNameToStore;
        //dd($emp);
        $emp->save();
        

        $salary = new SalaryHistory();
        $salary->employee_id = $emp->id;
        $salary->salary = $emp->salary;
        $salary->status = 1;
        $salary->from = Carbon::now();

        $salary->save();
        
        return redirect()->route('employee')
            ->with('success', 'New employee info added successfully.');

    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'userid'=>'required',
            'email'=>'required|email',
            'designation' => 'required',
            'salary' => 'required|numeric'
        ]);
        $employee = Employee::find($request->id);
        $employee->name = $request->name;
        $employee->userid = $request->userid;
        $employee->email = $request->email;
        $employee->designation = $request->designation;
        if($request->salary != $employee->salary){

            //update on salaryHistory
            $lastSalary = SalaryHistory::where('employee_id', $employee->id)->latest()->first();
           // dd($lastSalary);
            $lastSalary->to = Carbon::now();
            $lastSalary->status = 0;
            $lastSalary->save();

            $salary = new SalaryHistory();
            $salary->employee_id = $request->id;
            $salary->salary = $request->salary;
            $salary->status = 1;
            $salary->from = Carbon::now();
            $salary->save();

            //new salary
            $employee->salary = $request->salary;
        }
        
        $employee->photo = $request->photo;
        $employee->remarks = $request->remarks;
        $employee->save();

        return redirect()->route('employee')
            ->with('success', 'employee Info updated successfully');
    }

    public function destroy($id)
    {
        if(SalaryProcess::where('employee_id','=',$id)->get()->isEmpty() == false) {
            return redirect()->route('employee')
                ->with('danger', 'Employee has salary records. You cannot delete this Employee Data');
        }else {
            Employee::where('id',$id)->delete();
            return redirect()->route('employee')
                ->with('success', 'Employee Data Deleted successfully');
        }
        
    }


}
