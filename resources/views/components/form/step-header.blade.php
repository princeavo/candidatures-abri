@props([
    'step',
    'total' => 8,
    'title',
    'description' => null,
])

<div class="border-b border-[#f1eee5] pb-4">
    <span class="text-xs font-bold text-[#006c4f] uppercase tracking-wider">Étape {{ $step }} sur {{ $total }}</span>
    <h2 class="font-heading text-2xl font-bold text-[#001e14] mt-1">{{ $title }}</h2>
    @if ($description)
        <p class="text-sm text-[#52625A] mt-1">{{ $description }}</p>
    @endif
</div>
