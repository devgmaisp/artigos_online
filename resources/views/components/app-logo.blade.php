@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="ARTIGOS" {{ $attributes }}>
        <x-slot name="logo">
            <span class="text-xl font-bold tracking-wide text-accent-foreground">ARTIGOS</span>
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="ARTIGOS" {{ $attributes }}>
        <x-slot name="logo">
            <span class="text-xl font-bold tracking-wide text-accent-foreground">ARTIGOS</span>
        </x-slot>
    </flux:brand>
@endif
