<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">#</th>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
        @foreach($users as $key => $user)
            <tr>
                <td class="border px-4 py-2">{{ $users->perPage() * ($users->currentPage() - 1) + ++$key }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($user->created_at))}}</td>
                <td class="border px-4 py-2">
                    <div class="flex items-center justify-between">
                        <a href="{{route('user.edit', $user->id)}}">
                            @include('components.icons.edit')
                        </a>
                        <a href="{{route('user.show', $user->id)}}">
                            @include('components.icons.eye')
                        </a>

                        <form onsubmit="return confirm('Are you sure!')" wire:submit.prevent="leadDelete({{$user->id}})">
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
        {{ $users->links() }}
    </div>
</div>
