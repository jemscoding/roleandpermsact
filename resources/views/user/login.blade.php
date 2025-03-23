@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="flex justify-center items-center min-h-screen bg-gray-100 dark:bg-neutral-900 px-4">
    <div class="w-1/2 max-w-sm bg-white border border-gray-200 rounded-xl shadow-2xl dark:bg-neutral-900 dark:border-neutral-700">
      <div class="p-6 sm:p-8">
        <div class="mt-5">
          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="grid gap-y-4">
              <!-- Email -->
              <div>
                <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                <div class="relative">
                  <input type="email" id="email" name="email" class="py-2.5 sm:py-3 px-4 w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" required>
                </div>
              </div>
              <!-- Password -->
              <div>
                <div class="flex justify-between items-center">
                  <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                </div>
                <div class="relative">
                  <input type="password" id="password" name="password" class="py-2.5 sm:py-3 px-4 w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" required>
                </div>
              </div>
              <!-- Remember Me -->
              <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember-me" class="ml-2 text-sm dark:text-white">Remember me</label>
              </div>
              <!-- Submit Button -->
              <button type="submit" class="w-full py-3 px-4 text-sm font-medium rounded-lg bg-gray-600 dark:bg-gray-700 text-white hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">Sign in</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
  </div>


