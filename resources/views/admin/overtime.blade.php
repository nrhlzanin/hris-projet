<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Overtime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main content -->
    <div class="flex-1 flex flex-col ml-20">
        
        <!-- Navbar -->
        @include('components.navbar')
    </div>
</body>

</html>
