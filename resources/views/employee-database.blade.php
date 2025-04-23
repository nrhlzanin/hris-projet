<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-20 bg-blue-200 flex flex-col items-center py-6 space-y-6 shadow-md">
        <a href="#"><img src="/icons/dashboard.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/employees.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/clock.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/calendar.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/report.svg" class="w-6 h-6" /></a>
        <a href="#"><img src="/icons/support.svg" class="w-6 h-6" /></a>
        <a href="#" class="mt-auto"><img src="/icons/setting.svg" class="w-6 h-6" /></a>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">

        <!-- Navbar -->
        <nav class="bg-white px-6 py-4 flex items-center justify-between shadow">
            <div class="flex items-center space-x-4">
                <h1 class="text-xl font-bold">Employee Database</h1>
                <input type="text" placeholder="Search"
                       class="ml-4 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="flex items-center space-x-4">
                <button>
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-full bg-blue-800"></div>
                    <div class="text-sm text-gray-700">
                        <div>username</div>
                        <div class="text-xs text-gray-500">roles user</div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Summary Info -->
        <div class="grid grid-cols-4 gap-4 p-6">
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
        <div class="px-6">
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">All Employees Information</h2>
                    <div class="flex space-x-2">
                        <input type="text" placeholder="Search Employee"
                               class="px-3 py-2 border rounded-md focus:ring focus:border-blue-300">
                        <button class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Filter</button>
                        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Import</button>
                        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Export</button>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Add Data</button>
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
                <div class="mt-4 flex justify-between items-center text-sm text-gray-500">
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
