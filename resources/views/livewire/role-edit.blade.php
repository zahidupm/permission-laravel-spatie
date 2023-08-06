<form wire:submit.prevent="updateRole">
    <div class="mb-4">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Role name',
            'required' => 'required',
        ])
    </div>
    <h3 class="font-semibold mb-2">Permissions</h3>
    <div class="flex flex-wrap -mx-4">
        @foreach($permissions as $permission)
            <div class="w-1/3 px-4 mb-4">
                <label class="inline-flex items-center">
                    <input wire:model.lazy="selectedPermissions" type="checkbox" class="form-checkbox" value="{{$permission->name}}">
                    <span class="ml-2">{{ $permission->name }}</span>
                </label>
            </div>
        @endforeach
    </div>

    @include('components.wire-loading-btn')
</form>
