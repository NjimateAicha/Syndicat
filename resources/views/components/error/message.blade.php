    @if($errors->any())
        <div class="text-red-500 p-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif
