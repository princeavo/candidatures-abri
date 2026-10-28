@props([
    'name',
    'value' => '1',
    'label',
    'description' => null,
])

<label class="flex items-start gap-3 p-3.5 rounded-xl border border-[#E2DBCB] cursor-pointer hover:bg-[#f7f3ea]/60 transition-all select-none bg-white">
    <input 
        type="checkbox" 
        name="{{ $name }}" 
        value="{{ $value }}"
        {{ $attributes->merge(['class' => 'w-4 h-4 mt-0.5 text-[#063527] rounded-md focus:ring-[#006c4f] border-[#c0c8c3]']) }}
    >
    <div class="flex flex-col">
        <span class="text-sm font-medium text-[#1c1c16]">{{ $label }}</span>
        @if ($description)
            <span class="text-xs text-[#52625A] mt-0.5 leading-relaxed">{{ $description }}</span>
        @endif
    </div>
</label>
