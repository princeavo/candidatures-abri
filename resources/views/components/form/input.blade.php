@props([
    'name',
    'label' => null,
    'type' => 'text',
    'required' => false,
    'placeholder' => null,
    'model' => null,
    'hint' => null,
])

<div class="space-y-1">
    @if ($label)
        <label for="{{ $name }}" class="block text-xs font-semibold uppercase text-[#52625A]">
            {{ $label }}
            @if ($required)
                <span class="text-[#E8112D] font-bold">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <input 
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            @if ($model) x-model="{{ $model }}" @endif
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($required) required @endif
            @input="clearError('{{ $name }}')"
            :class="errors['{{ $name }}'] ? 'border-[#E8112D] focus:border-[#E8112D] focus:ring-[#E8112D]/20 bg-[#fff8f8]' : 'border-[#c0c8c3] focus:border-[#006c4f] focus:ring-[#006c4f]/20 bg-white'"
            {{ $attributes->merge(['class' => 'w-full px-4 py-2.5 rounded-xl border text-sm transition-colors focus:ring-2 focus:outline-none text-[#1c1c16]']) }}
        >
    </div>

    @if ($hint)
        <p class="text-xs text-[#717974]">{{ $hint }}</p>
    @endif

    <template x-if="errors['{{ $name }}']">
        <p class="text-xs text-[#E8112D] font-medium flex items-center gap-1 mt-1" x-text="errors['{{ $name }}']"></p>
    </template>
</div>
