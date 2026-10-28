@props([
    'name',
    'label',
    'required' => false,
    'icon' => 'upload_file',
    'accept' => '.pdf,.jpg,.jpeg,.png,.mp4',
    'hint' => 'Formats acceptés : PDF, JPG, PNG (moins de 10 Mo)',
])

<div class="space-y-1">
    <div 
        class="border-2 border-dashed rounded-xl p-4 sm:p-5 text-center transition-colors bg-[#fdf9f0]/40"
        :class="errors['{{ $name }}'] ? 'border-[#E8112D] bg-[#fff8f8]' : 'border-[#c0c8c3] hover:border-[#006c4f]'"
    >
        <span class="material-symbols-outlined text-2xl text-[#52625A]">{{ $icon }}</span>
        <p class="text-xs font-semibold text-[#1c1c16] mt-1">
            {{ $label }}
            @if ($required)
                <span class="text-[#E8112D] font-bold">*</span>
            @endif
        </p>
        @if ($hint)
            <p class="text-[11px] text-[#52625A] mt-0.5">{{ $hint }}</p>
        @endif
        <input 
            type="file" 
            id="{{ $name }}" 
            name="{{ $name }}"
            accept="{{ $accept }}"
            @if ($required) required @endif
            @change="clearError('{{ $name }}')"
            {{ $attributes->merge(['class' => 'mt-2 text-xs text-[#52625A] file:mr-3 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-[#063527] file:text-white hover:file:bg-[#0A4A35] transition-colors cursor-pointer']) }}
        >
    </div>

    <template x-if="errors['{{ $name }}']">
        <p class="text-xs text-[#E8112D] font-medium flex items-center gap-1 mt-1" x-text="errors['{{ $name }}']"></p>
    </template>
</div>
