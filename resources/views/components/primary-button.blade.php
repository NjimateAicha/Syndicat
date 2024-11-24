<button {{ $attributes->merge(['type' => 'submit', 'class' => 'my-7 w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white
                                py-2 px-4 rounded-full font-bold text-xl']) }}>
    {{ $slot }}
</button>
