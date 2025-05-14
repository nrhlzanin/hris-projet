<aside class="w-20 bg-blue-200 flex flex-col items-center py-6 shadow-md min-h-screen fixed left-0 top-[70px] z-20">
  <!-- Top Menu -->
  <nav class="flex flex-col space-y-4">
      <a href="{{ route('admin-dashboard') }}" class="hover:text-blue-500">
          <i class="ri-dashboard-line text-2xl text-black"></i>
      </a>
      <a href="{{ route('employee.database') }}" class="hover:text-blue-500">
          <i class="ri-user-3-line text-2xl text-black"></i>
      </a>
      <a href="{{ route('user_checklock') }}" class="hover:text-blue-500">
          <i class="ri-time-line text-2xl text-black"></i>
      </a>
      <a href="{{ route('user_absensi') }}" class="hover:text-blue-500">
          <i class="ri-calendar-line text-2xl text-black"></i>
      </a>
      <a href="#" class="hover:text-blue-500">
          <i class="ri-bar-chart-box-line text-2xl text-black"></i>
      </a>
  </nav>

  <!-- Spacer -->
  <div class="flex-grow"></div>

  <!-- Bottom Menu -->
  <nav class="flex flex-col space-y-5 mb-14">
      <a href="#" class="hover:text-blue-500">
          <i class="ri-customer-service-2-line text-2xl"></i>
      </a>
      <a href="#" class="hover:text-blue-500">
          <i class="ri-settings-3-line text-2xl"></i>
      </a>
  </nav>
</aside>
