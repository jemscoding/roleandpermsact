<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Role Info</title>
</head>
<body>
    {{-- Starting Table --}}
    <div class="flex justify-center"> <!-- Center the table -->
        <div class="max-w-lg w-full"> <!-- Set max width -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden border border-gray-300 rounded-lg shadow-md"> <!-- Added border and shadow -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Role ID</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Role</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Guard Name</th>
                                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $role->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $role->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $role->guard_name }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <!-- Show Button -->
                                            <a href="{{ route('roles.show', $role->id) }}" class="">
                                                Show
                                            </a>
                                        </td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('roles.edit', $role->id) }}" class="">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <!-- Delete Button -->
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="" onclick="return confirm('Are you sure you want to delete this role?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Table --}}
</body>
</html>
