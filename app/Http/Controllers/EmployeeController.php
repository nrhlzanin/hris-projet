<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'employee_id' => 'required|string|max:50|unique:employees,employee_id',
            'department' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:15',
        ]);

        // Simpan data ke database
        Employee::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('employee.database')->with('success', 'Employee added successfully!');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileHandle = fopen($file, 'r');
        $header = fgetcsv($fileHandle); // Ambil header CSV

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
                'avatar' => $row[8], // Tambahkan avatar
            ]);
        }

        fclose($fileHandle);

        return redirect()->back()->with('success', 'Data berhasil diimport!');
    }

    public function index()
    {
        // Ambil semua data karyawan dari database
        $employees = Employee::all();

        // Kirim data ke view
        return view('Employee.employee-database', compact('employees'));
    }
}
