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
                    <div class="text-lg font-bold">{{ $periode }}</div>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <div class="text-gray-600 text-sm">Total Employee</div>
                    <div class="text-2xl font-bold">{{ $totalEmployee }}</div>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <div class="text-gray-600 text-sm">Total New Hire</div>
                    <div class="text-2xl font-bold">{{ $totalNewHire }}</div>
                </div>
                <div class="bg-white shadow rounded-lg p-4">
                    <div class="text-gray-600 text-sm">Full Time Employee</div>
                    <div class="text-2xl font-bold">{{ $fullTimeEmployee }}</div>
                </div>
            </div>

            <!-- Table + Action -->
            <div class="bg-white rounded-lg shadow p-4 w-full max-w-6xl mt-6">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-4 sm:space-y-0">
                    <h2 class="text-lg font-semibold">All Employees Information</h2>
                    <div class="flex flex-wrap gap-2">
                        <input type="text" placeholder="Search Employee"
                               class="px-3 py-2 border rounded-md focus:ring focus:border-blue-300 w-full sm:w-auto">
                        <button id="import-button" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Import</button>
                        <form id="import-form" action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data" class="hidden">
                            @csrf
                            <input id="file-input" type="file" name="file" accept=".csv" class="hidden">
                        </form>
                        <button onclick="window.location='{{ route('employees.export') }}'" type="button" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 w-full sm:w-auto">
                            Export
                        </button>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 w-full sm:w-auto">
                            <a href="{{ route('new.employee') }}">+ Add Data</a>
                        </button>
                        <a href="{{ route('admin.Employee.employee-database') }}" class="px-4 border py-2 text-700 rounded hover:bg-gray-400 w-full sm:w-auto">
                            <i class="ri-refresh-line mr-2"></i>Reset Sort
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2">No.</th>
                            <th class="p-2">Avatar</th>
                            <th class="p-2">
                                <a href="{{ route('admin.Employee.employee-database', [
                                    'sort' => 'nama',
                                    'direction' => request('sort') == 'nama' && request('direction') == 'asc' ? 'desc' : 'asc'
                                ]) }}" class="flex items-center gap-1">
                                    Nama
                                    @if(request('sort') == 'nama')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="p-2">
                                <a href="{{ route('admin.Employee.employee-database', [
                                    'sort' => 'jenis_kelamin',
                                    'direction' => request('sort') == 'jenis_kelamin' && request('direction') == 'asc' ? 'desc' : 'asc'
                                ]) }}" class="flex items-center gap-1">
                                    Jenis Kelamin
                                    @if(request('sort') == 'jenis_kelamin')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="p-2">Nomor Telepon</th>
                            <th class="p-2">
                                <a href="{{ route('admin.Employee.employee-database', [
                                    'sort' => 'cabang',
                                    'direction' => request('sort') == 'cabang' && request('direction') == 'asc' ? 'desc' : 'asc'
                                ]) }}" class="flex items-center gap-1">
                                    Cabang
                                    @if(request('sort') == 'cabang')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="p-2">
                                <a href="{{ route('admin.Employee.employee-database', [
                                    'sort' => 'jabatan',
                                    'direction' => request('sort') == 'jabatan' && request('direction') == 'asc' ? 'desc' : 'asc'
                                ]) }}" class="flex items-center gap-1">
                                    Jabatan
                                    @if(request('sort') == 'jabatan')
                                        @if(request('direction') == 'asc')
                                            <i class="ri-arrow-up-s-line text-blue-500"></i>
                                        @else
                                            <i class="ri-arrow-down-s-line text-blue-500"></i>
                                        @endif
                                    @else
                                        <i class="ri-arrow-up-down-line text-gray-400"></i>
                                    @endif
                                </a>
                            </th>
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
                    <form method="GET" class="flex items-center">
                        {{-- Keep all query except per_page --}}
                        @foreach(request()->except(['per_page', 'page']) as $key => $val)
                            <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                        @endforeach
                        Showing
                        <select name="per_page" class="border rounded px-1 py-0.5 ml-1" onchange="this.form.submit()">
                            @foreach([10, 25, 50, 100] as $size)
                                <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>{{ $size }}</option>
                            @endforeach
                        </select>
                        out of {{ $employees->total() }} records
                    </form>
                    <div>
                        {{ $employees->withQueryString()->links() }}
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
