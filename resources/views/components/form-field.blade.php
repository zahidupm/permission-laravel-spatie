<label for="{{ $name }}" class="permission-label">{{ $label }}</label>
@if($type== 'textarea')
    <textarea wire:model.lazy="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" {{ $required }} class="permission-input"></textarea>
@else
    <input wire:model.lazy="{{ $name }}" type="{{ $type }}" id="{{ $name }}" class="permission-input" placeholder="{{ $placeholder }}" {{ $required }}>
@endif

@error($name)
<p class="text-red-500 text-sm mt-2">{{ $message }}</p>
@enderror
