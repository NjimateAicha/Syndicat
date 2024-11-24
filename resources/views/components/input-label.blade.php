@props(['value'])

<label {{ $attributes->merge(["class' => 'block mb-1 font-['Inter'] font-medium text-[16px] text-[#6F7D93]"]) }}>
    {{ $value ?? $slot }}
</label>
