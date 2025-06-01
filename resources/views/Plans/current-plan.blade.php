<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Current Plan - Laravel HRIS</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;900&display=swap"
        rel="stylesheet">
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter min-h-screen bg-gradient-to-b from-white via-blue-100 to-blue-500 flex items-center justify-center">
    <section class="py-20 w-full flex flex-col items-center">
        <h2 class="py-3 text-4xl font-bold mb-8 text-gray-1000" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">
            Your Current Plan
        </h2>
        <div class="bg-gradient-to-l from-[#1D395E] to-[#3C77C4] text-white rounded-xl shadow-lg p-10 w-full max-w-md">
            <h3 class="text-2xl font-semibold mb-2">Starter</h3>
            <p class="text-3xl font-bold mb-4">Free</p>