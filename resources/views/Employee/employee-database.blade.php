<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex h-screen">
    {{-- Sidebar --}}
    @include('components.sidebar')
    
    <!-- Main content -->
    <div class="flex-1 flex flex-col ml-20">
        
        {{-- Navbar --}}
        @include('components.navbar')
        
        <!-- Content Wrapper -->
        <div class="flex-1 flex flex-col items-center justify-start px-4 sm:px-6 py-6">
            <!-- Summary Info -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full max-w-6xl">
                <div class="bg-white shadow rounded-lg p-4">
                    <div class="text-gray-600 text-sm">Periode</div>
                    <div class="text-lg font-bold">Bulan Tahun</div>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <div class="text-gray-600 text-sm">Total Employee</div>
                    <div class="text-2xl font-bold">208</div>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <div class="text-gray-600 text-sm">Total New Hire</div>
                    <div class="text-2xl font-bold">20</div>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <div class="text-gray-600 text-sm">Full Time Employee</div>
                    <div class="text-2xl font-bold">20</div>
                </div>
            </div>

            <!-- Table + Action -->
            <div class="bg-white rounded-lg shadow p-4 w-full max-w-6xl mt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-4 sm:space-y-0">
                    <h2 class="text-lg font-semibold">All Employees Information</h2>
                    <div class="flex flex-wrap gap-2">
                        <input type="text" placeholder="Search Employee"
                               class="px-3 py-2 border rounded-md focus:ring focus:border-blue-300 w-full sm:w-auto">
                        <button class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 w-full sm:w-auto">Filter</button>
                        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 w-full sm:w-auto">Import</button>
                        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 w-full sm:w-auto">Export</button>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 w-full sm:w-auto">
                            <a href="{{ route('new.employee') }}">+ Add Data</a>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2">No.</th>
                            <th class="p-2">Avatar</th>
                            <th class="p-2">Nama</th>
                            <th class="p-2">Jenis Kelamin</th>
                            <th class="p-2">Nomor Telepon</th>
                            <th class="p-2">Cabang</th>
                            <th class="p-2">Jabatan</th>
                            <th class="p-2">Grade</th>
                            <th class="p-2">Status</th>
                            <th class="p-2">Action</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        @for ($i = 1; $i <= 10; $i++)
                            <tr>
                                <td class="p-2">{{ $i }}</td>
                                <td class="p-2">
                                    <div class="w-8 h-8 rounded-full bg-blue-800"></div>
                                </td>
                                <td class="p-2">Nama {{ $i }}</td>
                                <td class="p-2">
                                    <span
                                        class="px-2 py-1 rounded-full text-white {{ $i % 2 == 0 ? 'bg-blue-500' : 'bg-rose-500' }}">
                                        {{ $i % 2 == 0 ? 'Men' : 'Woman' }}
                                    </span>
                                </td>
                                <td class="p-2">0812803310{{ $i }}</td>
                                <td class="p-2">Jakarta</td>
                                <td class="p-2">Staff</td>
                                <td class="p-2">Lead</td>
                                <td class="p-2">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" {{ $i % 3 == 0 ? '' : 'checked' }}>
                                        <div
                                            class="w-10 h-5 bg-gray-200 rounded-full peer peer-checked:bg-blue-500 relative after:content-[''] after:absolute after:left-1 after:top-1 after:bg-white after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:after:translate-x-5">
                                        </div>
                                    </label>
                                </td>
                                <td class="p-2 flex space-x-2">
                                    <button class="p-1 bg-green-500 hover:bg-green-600 text-white rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                                                       stroke-width="2"
                                                                       d="M15 12H9m4 4H9m1-8H9m13 5a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </button>
                                    <button class="p-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded">
                                        ✎
                                    </button>
                                    <button class="p-1 bg-red-500 hover:bg-red-600 text-white rounded">
                                        🗑
                                    </button>
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-500 space-y-4 sm:space-y-0">
                    <div>Showing <select class="border rounded px-1 py-0.5 ml-1"><option>10</option></select> out of 60 records</div>
                    <div class="flex items-center space-x-2">
                        <button class="px-2 py-1 border rounded">1</button>
                        <button class="px-2 py-1 border rounded bg-blue-500 text-white">2</button>
                        <button class="px-2 py-1 border rounded">3</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
