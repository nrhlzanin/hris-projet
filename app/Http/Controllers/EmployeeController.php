<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    // Menampilkan semua data employee
    public function index(Request $request)
    {
        $query = Employee::query();

        $sortable = ['nama', 'jenis_kelamin', 'cabang', 'jabatan'];
        $direction = $request->get('direction', 'asc');
        if ($request->filled('sort') && in_array($request->sort, $sortable)) {
            $query->orderBy($request->sort, $direction);
        } else {
            $query->orderBy('id', 'desc');
        }

        $perPage = $request->get('per_page', 10);
        $employees = $query->paginate($perPage)->appends($request->except('page'));

        // Summary data
        $periode = now()->format('F Y'); // contoh: May 2025
        $totalEmployee = Employee::count();
        $totalNewHire = Employee::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $fullTimeEmployee = Employee::where('status', true)->count();

        return view('admin.Employee.employee-database', compact(
            'employees', 'periode', 'totalEmployee', 'totalNewHire', 'fullTimeEmployee'
        ));
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

        return redirect()->route('admin.Employee.employee-database')->with('success', 'Employee added!');
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

        return redirect()->route('admin.Employee.employee-database')->with('success', 'Employee updated successfully!');
    }

    // Hapus data employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.Employee.employee-database')->with('success', 'Employee deleted successfully!');
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

    // Export data employee ke file Excel
    public function export()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }
}
