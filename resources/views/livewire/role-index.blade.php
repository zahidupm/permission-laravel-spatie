<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">#</th>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Permissions</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
        @foreach($roles as $key => $role)
            <tr>
                <td class="border px-4 py-2">{{ $roles->perPage() * ($roles->currentPage() - 1) + ++$key }}</td>
                <td class="border px-4 py-2">{{ $role->name }}</td>
                    <td class="border px-4 py-2">
                        @foreach($role->permissions as $permission)
                            <span class="px-2 py-1 bg-blue-400 text-white text-sm rounded">{{$permission->name}}</span>
                        @endforeach
                    </td>
                <td class="border px-4 py-2">
                    <div class="flex items-center justify-center">
                        <a href="{{route('role.edit', $role->id)}}" class="mr-4">
                            @include('components.icons.edit')
                        </a>

                        <form onsubmit="return confirm('Are you sure!')" wire:submit.prevent="leadDelete({{$role->id}})">
                            <button type="submit">
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $roles->links() }}
    </div>
</div>
