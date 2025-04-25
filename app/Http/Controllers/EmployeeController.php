<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; // Pastikan model Employee sudah dibuat

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
}
