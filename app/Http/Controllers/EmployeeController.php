<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Menampilkan semua data employee
    public function index()
    {
        $employees = Employee::all();
        return view('admin.Employee.employee-database', compact('employees'));
    }

    // Menampilkan form tambah employee
    public function create()
    {
        return view('admin.Employee.new-employee');
    }

    // Simpan data employee baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'employee_id' => 'required|string|max:50|unique:employees,employee_id',
            'department' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:15',
        ]);

        Employee::create($validated);

        return redirect()->route('admin.employee.database')->with('success', 'Employee added successfully!');
    }

    // Menampilkan form edit employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.Employee.new-employee', compact('employee'));
    }

    // Update data employee
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'employee_id' => 'required|string|max:50|unique:employees,employee_id,' . $id,
            'department' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'nullable|string|max:15',
        ]);

        $employee->update($validated);

        return redirect()->route('admin.employee.database')->with('success', 'Employee updated successfully!');
    }

    // Hapus data employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.employee.database')->with('success', 'Employee deleted successfully!');
    }

    // Import data employee dari file CSV
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        $file = $request->file('file');
        $fileHandle = fopen($file, 'r');

        $header = fgetcsv($fileHandle); // Skip header

        while (($row = fgetcsv($fileHandle)) !== false) {
            Employee::create([
                'id' => $row[0],
                'user_id' => $row[1],
                'ck_settings_id' => $row[2],
                'first_name' => $row[3],
                'last_name' => $row[4],
                'gender' => $row[5],
                'address' => $row[6],
                'position' => $row[7],
                'avatar' => $row[8],
            ]);
        }

        fclose($fileHandle);

        return redirect()->back()->with('success', 'Data berhasil diimport!');
    }
}
