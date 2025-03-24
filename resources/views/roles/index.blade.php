<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Roles</title>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <div class="container mx-auto p-4">
        <!-- Create Role Button -->
        <div class="flex justify-end mb-4">
            <a class="py-2 px-4 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none"
                href="{{ route('roles.create') }}">
                <svg class="inline-block w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Create Role
            </a>
        </div>

        <!-- Responsive Table Container -->
        <div class="overflow-auto rounded-lg shadow-md">
            <table class="table-auto w-full min-w-max border border-gray-300 divide-y divide-gray-200 dark:divide-neutral-700">
                <thead class="bg-gray-200 dark:bg-neutral-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Role ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Guard Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Permissions</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase dark:text-neutral-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    @foreach ($roles as $role)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $role->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ ucfirst($role->name) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">{{ $role->guard_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                            {{ $role->permissions->pluck('name')->map(fn($name) => ucfirst($name))->implode(', ') }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm">
                            <div class="flex justify-end space-x-2">
                                <!-- Show Button -->
                                <a class="py-2 px-3 text-xs font-medium bg-green-500 text-white rounded-lg hover:bg-green-600"
                                    href="{{ route('roles.show', $role->id) }}">
                                    Show
                                </a>
                                <!-- Edit Button -->
                                <a class="py-2 px-3 text-xs font-medium bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                                    href="{{ route('roles.edit', $role->id) }}">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="py-2 px-3 text-xs font-medium bg-red-500 text-white rounded-lg hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- End of Table -->
    </div>

</body>
</html>
