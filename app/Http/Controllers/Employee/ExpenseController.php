<?php

namespace App\Http\Controllers\Employee;

use App\Expense;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;
        $data = [
            'employee' => $employee,
            'expenses' => $employee->expense
        ];
        return view('employee.expenses.index')->with($data);
    }

    public function create()
    {
        $data = [
            'employee' => Auth::user()->employee
        ];
        return view('employee.expenses.create')->with($data);
    }

    public function store(Request $request, $employee_id)
    {
        $data = [
            'employee' => Auth::user()->employee
        ];
        $this->validate($request, [
            'reason' => 'required',
            'description' => 'required',
            'file' => 'image|nullable'
        ]);

        if ($request->hasFile('file')) {
            $filename_store = $request->image->store('public/requisition');
        } else {
            $filename_store = null;
        }
        Expense::create([
            'employee_id' => $employee_id,
            'reason' => $request->input('reason'),
            'description' => $request->input('description'),
            'file' => $filename_store
        ]);
        $request->session()->flash('success', 'Your Requisition has been successfully applied, wait for approval.');
        return redirect()->route('employee.expenses.create')->with($data);
    }

    public function edit($expense_id)
    {
        $expense = Expense::findOrFail($expense_id);
        Gate::authorize('employee-expenses-access', $expense);
        return view('employee.expenses.edit')->with('expense', $expense);
    }

    public function update(Request $request, $expense_id)
    {
        $expense = Expense::findOrFail($expense_id);
        Gate::authorize('employee-expenses-access', $expense);
        $data = [
            'employee' => Auth::user()->employee
        ];
        $this->validate($request, [
            'reason' => 'required',
            'description' => 'required',
            'file' => 'image | nullable'
        ]);
        $expense->reason = $request->reason;
        $expense->description = $request->description;
        if ($request->hasFile('file')) {
            Storage::delete($expense->file);
            $expense->file = $request->file->store('public/requisition');
        } else {
            $expense->file = null;
        }
        $expense->save();
        $request->session()->flash('success', 'Your expense has been successfully updated!');
        return redirect()->route('employee.expenses.index');
    }

    public function destroy($expense_id)
    {
        $expense = Expense::findOrFail($expense_id);
        Gate::authorize('employee-expenses-access', $expense);
        $filepath = public_path(DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'receipts' . DIRECTORY_SEPARATOR . $expense->receipt);
        if (file_exists($filepath)) {
            File::delete($filepath);
        }
        $expense->delete();
        request()->session()->flash('success', 'Expense has been successfully deleted');
        return redirect()->route('employee.expenses.index');
    }
}
