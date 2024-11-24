<form action="{{ route('residence.select') }}" method="POST">
    @csrf
    <select id="residence-select"
        class="m-[13.5px_11.5px_13.5px_0] inline-block w-[375px] break-words font-['Fredoka_One','Roboto_Condensed'] font-normal text-[20px] text-[#6F7D93]" onchange="this.form.submit()">
        @foreach ($residences as $residence)
            <option value="{{ $residence->id }}" {{ $selectedResidence && $selectedResidence->id == $residence->id ? 'selected' : '' }}>
                {{ $residence->nomResidence }}
            </option>
        @endforeach
    </select>
</form>
