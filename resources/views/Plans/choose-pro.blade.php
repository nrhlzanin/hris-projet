    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HRIS - Choose Package(Pro)</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- Tailwind CSS via Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="bg-white text-gray-900 font-inter min-h-screen flex flex-col">

        <div class="max-w-7xl mx-auto px-4 py-12 flex-grow grid grid-cols-1 sm:grid-cols-2 gap-10 ">

            {{-- Left Section --}}
            <div class="flex flex-col justify-between">
                <div>
                    <img src="/img/logo.png" alt="Logo" class="w-8 mb-4">

                    <h1 class="text-3xl font-bold mb-1">Choosing Package</h1>
                    <p class="text-gray-500 mb-1">Upgrade to Pro</p>
                    <a href="{{route('pricing.plans')}}" class="text-sm text-blue-600 underline inline-block mb-6">Change Plan</a>

                    <!-- Billing Period -->
                    <h2 class="font-semibold mb-2">Billing Period</h2>
                    <div class="flex space-x-4 mb-6 flex-wrap">
                        <button id="billing-single" data-price="17000"
                            class="billing-btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition w-full sm:w-auto mb-2 sm:mb-0">
                            Single Payment - Rp 17.000 / User
                        </button>
                        <button id="billing-monthly" data-price="7000"
                            class="billing-btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition w-full sm:w-auto">
                            Monthly - Rp 7.000 / User
                        </button>
                    </div>



                    {{-- Team Size --}}
                    <h2 class="font-semibold mb-2">Size Matters</h2>
                    <p class="text-gray-600 mb-2">Choose the right fit for your team!</p>
                    <div class="flex items-center space-x-6 mb-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="team_size" class="form-radio text-blue-500" checked>
                            <span class="ml-2">1 - 50</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="team_size" class="form-radio text-blue-500">
                            <span class="ml-2">51 - 100</span>
                        </label>
                    </div>

                    <!-- Employee Count -->
                    <div class="flex items-center justify-between mb-10">
                        <h2 class="font-semibold">Number of Employees</h2>
                        <div class="flex items-center">
                            <button id="decrement" class="bg-gray-200 px-3 py-1 text-lg font-bold rounded w-10 h-10">
                                -
                            </button>
                            <span id="employee-count" class="w-12 text-center mx-2 text-lg font-semibold">
                                2
                            </span>
                            <button id="increment" class="bg-gray-200 px-3 py-1 text-lg font-bold rounded w-10 h-10">
                                +
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Section: Order Summary --}}
            <div class="bg-gray-100 p-8 rounded-lg shadow mt-8 sm:mt-0 flex flex-col justify-between flex-grow">
                <h2 class="text-2xl font-bold mb-6">Order Summary</h2>

                <!--  Order Summary (replace just this inner block)  -->
                <div class="text-sm space-y-2">

                    <!-- one 3-column grid row per item -->
                    <div class="grid grid-cols-3 gap-x-2">
                        <span>Package</span>
                        <span class="text-center">:</span>
                        <span>Premium</span>
                    </div>

                    <div class="grid grid-cols-3 gap-x-2">
                        <span>Billing Period</span>
                        <span class="text-center">:</span>
                        <span id="billing-period-summary">Single Payment</span>
                    </div>

                    <div class="grid grid-cols-3 gap-x-2">
                        <span>Team Size</span>
                        <span class="text-center">:</span>
                        <span id="team-size-summary">1 - 50</span>
                    </div>

                    <div class="grid grid-cols-3 gap-x-2">
                        <span>Number of Employees</span>
                        <span class="text-center">:</span>
                        <span id="employee-summary">2</span>
                    </div>

                    <div class="grid grid-cols-3 gap-x-2">
                        <span>Price per User</span>
                        <span class="text-center">:</span>
                        <span id="price-per-user">Rp 17.000</span>
                    </div>
                </div>

                <hr class="my-6 border-black">

                <div class="text-sm space-y-2">
                    <div class="flex justify-between">
                        <span>Subtotal</span><span>Rp <span id="subtotal">34.000</span></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tax</span><span>Rp 0.000</span>
                    </div>
                </div>

                <hr class="my-6 border-black">

                <div class="flex justify-between font-bold text-lg mb-6">
                    <span>Total at renewal</span><span>Rp <span id="total">34.000</span></span>
                </div>

                <button class="w-full bg-blue-900 text-white py-3 rounded hover:bg-blue-800 font-semibold">
                    Confirm and upgrade
                </button>
            </div>
        </div>

        <!-- Update Order Summary Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const decrementButton = document.getElementById('decrement');
                const incrementButton = document.getElementById('increment');
                const employeeCount = document.getElementById('employee-count');
                const employeeSummaryElement = document.getElementById('employee-summary');
                const teamSizeRadioButtons = document.querySelectorAll('input[name="team_size"]');
                const teamSizeSummaryElement = document.getElementById('team-size-summary');

                // --- Billing Period Button Elements ---
                const billingButtons = document.querySelectorAll('.billing-btn');
                // Set default to the Single Payment option:
                let pricePerUser = parseInt(document.getElementById('billing-single').dataset.price);
                // Also update the billing period summary initially:
                document.getElementById('billing-period-summary').textContent = "Single Payment";

                // Function to update the order summary when employee count or price per user changes.
                const updateSummary = () => {
                    const count = parseInt(employeeCount.textContent);
                    const subtotal = count * pricePerUser;
                    document.getElementById('subtotal').textContent = subtotal.toLocaleString();
                    document.getElementById('total').textContent = subtotal.toLocaleString();
                    employeeSummaryElement.textContent = count;
                };

                // --- Team Size Logic ---
                // Set the default employee count based on the team size option.
                const setDefaultEmployeeCount = (teamSizeValue) => {
                    const lowerBound = parseInt(teamSizeValue.split('-')[0].trim(), 10);
                    employeeCount.textContent = lowerBound;
                };

                // Determine the initial team size based on the default checked radio button.
                let selectedTeamSize = "1 - 50";
                teamSizeRadioButtons.forEach((radio) => {
                    if (radio.checked) {
                        selectedTeamSize = radio.nextElementSibling.textContent.trim();
                        setDefaultEmployeeCount(selectedTeamSize);
                    }
                });

                // Update the team size summary text.
                const updateTeamSize = () => {
                    teamSizeSummaryElement.textContent = selectedTeamSize;
                };

                teamSizeRadioButtons.forEach((radio) => {
                    radio.addEventListener('change', function() {
                        if (this.checked) {
                            selectedTeamSize = this.nextElementSibling.textContent.trim();
                            updateTeamSize();
                            setDefaultEmployeeCount(selectedTeamSize);
                            updateSummary();
                        }
                    });
                });

                // --- Billing Period Logic ---
                billingButtons.forEach((button) => {
                    button.addEventListener('click', function() {
                        // Update the global pricePerUser from the data attribute.
                        pricePerUser = parseInt(this.dataset.price);
                        // Optionally update active styling:
                        billingButtons.forEach(btn => btn.classList.remove('bg-blue-700'));
                        this.classList.add('bg-blue-700');
                        // Update the Price per User in the order summary.
                        document.getElementById('price-per-user').textContent = "Rp " + pricePerUser
                            .toLocaleString();
                        // Update the Billing Period summary.
                        const billingSummaryText = (this.id === 'billing-single') ? "Single Payment" :
                            "Monthly";
                        document.getElementById('billing-period-summary').textContent =
                            billingSummaryText;
                        // Recalculate the totals.
                        updateSummary();
                    });
                });

                // --- Employee Count Button Logic ---
                decrementButton.addEventListener('click', function() {
                    let count = parseInt(employeeCount.textContent);
                    const defaultCount = parseInt(selectedTeamSize.split('-')[0].trim());
                    if (count > defaultCount) {
                        employeeCount.textContent = count - 1;
                        updateSummary();
                    }
                });

                incrementButton.addEventListener('click', function() {
                    let count = parseInt(employeeCount.textContent);
                    employeeCount.textContent = count + 1;
                    updateSummary();
                });

                // Initial summary updates on page load.
                updateSummary();
                updateTeamSize();
            });
        </script>


    </body>

    </html>
