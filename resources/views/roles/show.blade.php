<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Role Info</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex flex-col items-center min-h-screen py-8">

    <!-- Back Button -->
    <div class="w-full max-w-5xl mb-4">
        <a href="{{ route('roles.index') }}"
           class="py-2 px-4 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none">
            Back
        </a>
    </div>

    <!-- Table Container -->
    <div class="w-full max-w-5xl overflow-auto rounded-lg shadow-md">
        <table class="table-auto w-full min-w-max border border-gray-300 divide-y divide-gray-200 dark:divide-neutral-700">
            <thead class="bg-gray-200 dark:bg-neutral-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Role ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Guard Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Permissions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                <tr class="bg-white dark:bg-neutral-800">
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $role->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $role->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $role->guard_name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200 break-words">
                        {{ $role->permissions->pluck('name')->map(fn($name) => ucfirst($name))->implode(', ') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>
