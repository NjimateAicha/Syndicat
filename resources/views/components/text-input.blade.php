@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full h-16 px-6 py-2 border rounded-[25px] focus:outline-none focus:ring-2 focus:ring-indigo-700']) !!}>