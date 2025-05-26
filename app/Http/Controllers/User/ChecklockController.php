<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ChecklockController extends Controller
{
    public function index(Request $request)
    {
        // Contoh data dummy, ganti dengan query ke database jika sudah ada model
        $data = collect([
            [
                'date' => 'March 01, 2025',
                'clock_in' => '09:28 AM',
                'clock_out' => '04:00 PM',
                'work_hours' => '10h 5m',
                'status' => 'On Time',
            ],
            [
                'date' => 'March 02, 2025',
                'clock_in' => '09:30 AM',
                'clock_out' => '04:30 PM',
                'work_hours' => '8h 50m',
                'status' => 'Late',
            ],
            // ...tambahkan data lain sesuai kebutuhan
        ]);

        // Sorting
        $sort = $request->input('sort', 'date');
        $direction = $request->input('direction', 'asc');
        $sorted = $data->sortBy($sort, SORT_REGULAR, $direction == 'desc');

        // Pagination
        $perPage = $request->input('per_page', 10);
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $attendances = new LengthAwarePaginator(
            $currentItems,
            $sorted->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('user.checklock', compact('attendances'));
    }
}