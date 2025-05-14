<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <aside class="w-20 bg-blue-200 flex flex-col items-center py-6 shadow-md" style="margin-top: 64px;">
        <div class="h-screen w-16 bg-blue-200 flex flex-col items-center py-4">
            <!-- Icons di atas -->
            <nav class="flex flex-col space-y-6">
                <a href="#" class="hover:text-blue-500"><i class="ri-dashboard-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-user-3-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-time-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-calendar-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-bar-chart-box-line text-2xl"></i></a>
            </nav>

            <!-- Spacer flex-1 untuk dorong ke bawah -->
            <div class="flex-1"></div>

            <!-- Icons di bawah -->
            <nav class="flex flex-col space-y-6">
                <a href="#" class="hover:text-blue-500"><i class="ri-customer-service-2-line text-2xl"></i></a>
                <a href="#" class="hover:text-blue-500"><i class="ri-settings-3-line text-2xl"></i></a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Top Navbar -->
        <nav class="bg-white px-6 py-4 flex items-center justify-between shadow w-full fixed top-0 left-0 z-10">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10">
                <h1 class="text-xl font-bold pl-6">Employee Database</h1>
            </div>
            <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center">
                <input type="text" placeholder="Search"
                       class="w-[400px] px-6 py-3 border rounded-l-lg focus:outline-none focus:ring focus:border-blue-300">
                <button class="bg-blue-500 text-white px-4 py-3 rounded-r-lg hover:bg-blue-600">
                    <i class="ri-search-line"></i>
                </button>
            </div>
            <div class="flex items-center space-x-4">
                <button>
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>
                <div class="relative">
                    <button class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-blue-800"></div>
                        <div class="text-sm text-gray-700">
                            <div>username</div>
                        </div>
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Form Section -->
        <div class="flex items-center justify-center flex-grow mt-20 px-6">
            <div class="max-w-6xl w-full p-6 bg-white shadow-md rounded-2xl">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Add New Employee</h2>
                <form action="{{ route('employees.store') }}" method="POST" class="grid grid-cols-2 gap-6">
                    @csrf
                    <div class="col-span-2 flex items-center">
                        <div class="w-24 h-24 bg-blue-800 rounded flex items-center justify-center">
                            <span class="text-white text-sm">Foto</span>
                        </div>
                        <button type="button" class="ml-4 px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                            + Upload Foto
                        </button>
                    </div>
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-600">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter the First Name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-600">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter the Last Name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm" required>
                    </div>
                    <div>
                        <label for="mobile_number" class="block text-sm font-medium text-gray-600">Mobile Number</label>
                        <input type="text" id="mobile_number" name="mobile_number" placeholder="Enter the Mobile Number" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-600">NIK</label>
                        <input type="text" id="nik" name="nik" placeholder="Enter the NIK" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-600">Gender</label>
                        <select id="gender" name="gender" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                            <option value="">-Choose Gender-</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="last_education" class="block text-sm font-medium text-gray-600">Last Education</label>
                        <select id="last_education" name="last_education" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                            <option value="">-Choose Education-</option>
                            <option value="high_school">SMA/SMK Sederajat</option>
                            <option value="bachelor">S1</option>
                            <option value="master">S2</option>
                        </select>
                    </div>
                    <div>
                        <label for="place_of_birth" class="block text-sm font-medium text-gray-600">Place of Birth</label>
                        <input type="text" id="place_of_birth" name="place_of_birth" placeholder="Enter the Place of Birth" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-600">Date of Birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-600">Position</label>
                        <input type="text" id="position" name="position" placeholder="Enter the Position" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="branch" class="block text-sm font-medium text-gray-600">Branch</label>
                        <input type="text" id="branch" name="branch" placeholder="Enter the Branch" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="contract_type" class="block text-sm font-medium text-gray-600">Contract Type</label>
                        <select id="contract_type" name="contract_type" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                            <option value="">-Choose Type-</option>
                            <option value="permanent">Permanent</option>
                            <option value="contract">Contract</option>
                        </select>
                    </div>
                    <div>
                        <label for="grade" class="block text-sm font-medium text-gray-600">Grade</label>
                        <input type="text" id="grade" name="grade" placeholder="Enter the Grade" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="bank" class="block text-sm font-medium text-gray-600">Bank</label>
                        <select id="bank" name="bank" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                            <option value="">-Choose Bank-</option>
                            <option value="bank_a">BCA</option>
                            <option value="bank_a">BNI</option>
                            <option value="bank_b">BRI</option>
                            <option value="bank_b">BSI</option>
                            <option value="bank_b">BTN</option>
                            <option value="bank_b">CMIB</option>
                            <option value="bank_b">Mandiri</option>
                            <option value="bank_b">Permata</option>
                        </select>
                    </div>
                    <div>
                        <label for="account_number" class="block text-sm font-medium text-gray-600">Account Number</label>
                        <input type="text" id="account_number" name="account_number" placeholder="Enter the Account Number" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="account_holder_name" class="block text-sm font-medium text-gray-600">Account Holder's Name</label>
                        <input type="text" id="account_holder_name" name="account_holder_name" placeholder="Bank Number Account Holder Name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                    </div>
                    <div>
                        <label for="warning_letter_type" class="block text-sm font-medium text-gray-600">Warning Letter Type</label>
                        <select id="warning_letter_type" name="warning_letter_type" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                            <option value="">-Choose Type-</option>
                            <option value="type_a">Sp 1</option>
                            <option value="type_b">Sp 2</option>
                            <option value="type_b">Sp 3</option>
                        </select>
                    </div>
                    <div class="col-span-2 flex justify-end space-x-4">
                        <button type="button" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>
