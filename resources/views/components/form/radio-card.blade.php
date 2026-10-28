@props([
    'name',
    'value',
    'label',
    'model' => null,
    'description' => null,
])

<label 
    class="flex items-start gap-3 p-3.5 rounded-xl border border-[#E2DBCB] cursor-pointer hover:bg-[#f7f3ea]/60 transition-all select-none"
    @if ($model)
        :class="{{ $model }} === '{{ $value }}' ? 'bg-[#E6F2EC] border-[#006c4f] ring-1 ring-[#006c4f]' : 'bg-white'"
    @endif
>
    <input 
        type="radio" 
        name="{{ $name }}" 
        value="{{ $value }}"
        @if ($model) x-model="{{ $model }}" @endif
        @change="clearError('{{ $name }}')"
        {{ $attributes->merge(['class' => 'w-4 h-4 mt-0.5 text-[#063527] focus:ring-[#006c4f] border-[#c0c8c3]']) }}
    >
    <div class="flex flex-col">
        <span class="text-sm font-medium text-[#1c1c16]">{{ $label }}</span>
        @if ($description)
            <span class="text-xs text-[#52625A] mt-0.5">{{ $description }}</span>
        @endif
    </div>
</label>
