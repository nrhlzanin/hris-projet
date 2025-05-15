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
                        <button id="import-button" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Import</button>
                        <form id="import-form" action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data" class="hidden">
                            @csrf
                            <input id="file-input" type="file" name="file" accept=".csv" class="hidden">
                        </form>
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
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="p-2">{{ $loop->iteration }}</td>
                                    <td class="p-2">
                                        <img src="{{ asset('storage/' . $employee->avatar) }}" alt="Avatar" class="w-8 h-8 rounded-full">
                                    </td>
                                    <td class="p-2">{{ $employee->nama }}</td>
                                    <td class="p-2">
                                        <span class="px-2 py-1 rounded-full text-white {{ $employee->jenis_kelamin == 'Men' ? 'bg-blue-500' : 'bg-rose-500' }}">
                                            {{ $employee->jenis_kelamin }}
                                        </span>
                                    </td>
                                    <td class="p-2">{{ $employee->nomor_telepon }}</td>
                                    <td class="p-2">{{ $employee->cabang }}</td>
                                    <td class="p-2">{{ $employee->jabatan }}</td>
                                    <td class="p-2">{{ $employee->grade }}</td>
                                    <td class="p-2">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="sr-only peer" {{ $employee->status ? 'checked' : '' }}>
                                            <div class="w-10 h-5 bg-gray-200 rounded-full peer peer-checked:bg-blue-500 relative after:content-[''] after:absolute after:left-1 after:top-1 after:bg-white after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:after:translate-x-5">
                                            </div>
                                        </label>
                                    </td>
                                    <td class="p-2 flex space-x-2">
                                        <button class="p-1 bg-green-500 hover:bg-green-600 text-white rounded">✎</button>
                                        <button class="p-1 bg-red-500 hover:bg-red-600 text-white rounded">🗑</button>
                                    </td>
                                </tr>
                            @endforeach
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

<script>
    document.getElementById('import-button').addEventListener('click', function () {
        document.getElementById('file-input').click();
    });

    document.getElementById('file-input').addEventListener('change', function () {
        if (this.files.length > 0) {
            document.getElementById('import-form').submit();
        }
    });
</script>

</body>
</html>
