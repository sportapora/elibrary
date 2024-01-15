@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-sm text-[#0D1F5C] ']) }}>
    {{ $value ?? $slot }}
</label>
