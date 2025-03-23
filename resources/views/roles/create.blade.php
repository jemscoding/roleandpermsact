
<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Roles</title>
</head>
<body>
    {{-- Starting form --}}
    <div class="container">
        <div class="-m-1.5 overflow-x-auto">
          <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden">
                <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                <div class="max-w-sm">
                    <label for="input-label-with-helper-text" class="block text-sm font-medium mb-2 dark:text-white">Role</label>
                    <input type="text" name = "name" id="input-label-with-helper-text" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Role name" aria-describedby="hs-input-helper-text">
                  </div>


                  <div>
                    <H3>Permissions</H3>
                    @foreach ($permissions as $permission)
                    <label for="hs-default-checkbox" class="text-sm text-gray-500 ms-3 dark:text-neutral-400"><input type="checkbox" name = "permissions[{{$permission->name}}]" value = "{{$permission->name}}" class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-default-checkbox"> {{$permission->name}}</label><br>
                    @endforeach
                  </div>
                  <button class = "py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" type = "submit">Create Role</button>
                </form>
            </div>
          </div>
        </div>
      </div>
      {{-- End form --}}

</body>
</html>
