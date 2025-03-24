<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Role</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen px-4">

    <!-- Form Container -->
    <div class="w-full max-w-lg bg-white dark:bg-neutral-800 rounded-lg shadow-lg p-6">
        <h2 class="text-center text-2xl font-semibold text-gray-800 dark:text-white mb-6">Edit Role</h2>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Role Name -->
            <div class="mb-5">
                <label for="role-name" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Role Name</label>
                <input type="text" name="name" id="role-name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-white"
                    value="{{ $role->name }}" placeholder="Enter role name" required>
            </div>

            <!-- Permissions -->
            <div class="mb-5">
                <h3 class="text-sm font-medium text-gray-700 dark:text-white mb-3">Permissions</h3>
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($permissions as $permission)
                    <label class="flex items-center space-x-2 text-gray-700 dark:text-neutral-300">
                        <input type="checkbox" name="permissions[{{ $permission->name }}]" value="{{ $permission->name }}"
                            class="peer hidden" @if(in_array($permission->name, $role->permissions->pluck('name')->toArray())) checked @endif>
                        <div class="w-5 h-5 border border-gray-400 rounded-md flex items-center justify-center peer-checked:bg-blue-600 peer-checked:border-blue-600 transition">
                            <svg class="w-4 h-4 text-white hidden peer-checked:block" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span>{{ ucfirst($permission->name) }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-3 mt-6">
            <button type="submit"
                class="py-2.5 px-4 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none">
                Update Role
            </button>
                <a href="{{ route('roles.index') }}"
                    class="py-2.5 px-4 text-sm font-medium text-white bg-gray-500 rounded-lg hover:bg-gray-600 focus:outline-none">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</body>
</html>
