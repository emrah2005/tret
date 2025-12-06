{{-- resources/views/components/stepper.blade.php --}}
@props([
    'steps' => [],
    'active' => 1,
])

<div class="flex items-center gap-4 mb-8">
    @foreach($steps as $index => $label)
        @php $stepNumber = $index + 1; @endphp
        <div class="flex items-center gap-2">
            <div class="flex items-center justify-center h-8 w-8 rounded-full text-sm font-semibold
                {{ $stepNumber <= $active ? 'bg-purple-600 text-white' : 'bg-slate-100 text-slate-500' }}">
                {{ $stepNumber }}
            </div>
            <span class="text-xs lg:text-sm {{ $stepNumber <= $active ? 'text-slate-900 font-medium' : 'text-slate-500' }}">
                {{ $label }}
            </span>
            @if(!$loop->last)
                <div class="w-10 h-px bg-slate-200"></div>
            @endif
        </div>
    @endforeach
</div>

