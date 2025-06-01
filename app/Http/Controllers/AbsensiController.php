<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'absent_type' => 'required|in:sick,leave,permit',
            'supporting_evidence' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'detail_address' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('supporting_evidence')) {
            $validated['supporting_evidence'] = $request->file('supporting_evidence')->store('absensi_evidence', 'public');
        }

        // Simpan ke database (pastikan ada model Absensi dan migrasi sesuai)
        // Contoh:
        // Absensi::create([
        //     'user_id' => auth()->id(),
        //     'absent_type' => $validated['absent_type'],
        //     'supporting_evidence' => $validated['supporting_evidence'] ?? null,
        //     'detail_address' => $validated['detail_address'],
        //     'lat' => $validated['lat'],
        //     'lng' => $validated['lng'],
        // ]);

        return redirect()->route('user.absensi')->with('success', 'Absensi berhasil disimpan!');
    }
}
