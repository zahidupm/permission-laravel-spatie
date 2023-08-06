<form wire:submit.prevent="formSubmit">
    <div class="flex -mx-4 mb-6">
        <div class="flex-1 px-4">
            <label for="name" class="permission-label">Name</label>
            <input wire:model.lazy="name" type="text" name="name" class="permission-input" id="name">
            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex-1 px-4">
            <label for="email" class="permission-label">email</label>
            <input wire:model.lazy="email" type="email" name="email" class="permission-input" id="email">
            @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex-1 px-4">
            <label for="phone" class="permission-label">Phone</label>
            <input wire:model.lazy="phone" type="text" name="phone" class="permission-input" id="phone">
            @error('phone')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </div>

    @include('components.wire-loading-btn')
</form>
