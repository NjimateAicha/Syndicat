@props(['action', 'submitText', 'modalTitle', 'isUpdate' => false, 'residenceId'])

<form action="{{ $action }}" method="POST" class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full">
    @csrf
    @if ($isUpdate)
        @method('PUT')
    @endif
    @if ($isUpdate)
        <input type="hidden" id="id" name="event_id">
    @endif

    <div class="flex justify-between items-center">
        <h2 class="text-lg text-[#3C4C7C] font-semibold">{{ $modalTitle }}</h2>
        <button type="button" class="text-gray-500 hover:text-gray-700 close-modal-btn">&times;</button>
    </div>

    <div class="mt-4">
        <label for="{{ $isUpdate ? 'title_update' : 'title' }}"
            class="block text-sm text-[#6F7D93] font-semibold mb-2">{{ __('Enter Event') }}</label>
        <input type="text" id="{{ $isUpdate ? 'title_update' : 'title' }}" name="title"
            class="border rounded-lg w-full py-2 px-3 bg-[#f1f1f1] border-[#dce1e8]" placeholder="{{ __('Enter Event') }}"
            required>
    </div>

    <div class="mt-4 flex items-center justify-between gap-2">
        <label for="{{ $isUpdate ? 'toggleSwitch_update' : 'toggleSwitch' }}"
            class="text-sm text-[#6F7D93] font-semibold">{{ __('Jour_entier') }}</label>
        <label class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" id="{{ $isUpdate ? 'toggleSwitch_update' : 'toggleSwitch' }}" name="jour_entier"
                class="sr-only peer">
            <div
                class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
            </div>
        </label>
    </div>

    <div class="mt-4 flex items-center gap-4">
        <label for="{{ $isUpdate ? 'start_update' : 'start' }}"
            class="block text-sm text-[#6F7D93] font-semibold w-[120px]">{{ __('Start') }}</label>
        <input type="text" id="{{ $isUpdate ? 'start_update' : 'start' }}"
            placeholder="Ex: 19 septembre 2020 | 14:00"
            class="flatpickr border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]" required>
        <input type="hidden" id="{{ $isUpdate ? 'start_hidden_update' : 'start_hidden' }}" name="start">
    </div>

    <div class="mt-4 flex items-center gap-4">
        <label for="{{ $isUpdate ? 'end_update' : 'end' }}"
            class="block text-sm text-[#6F7D93] font-semibold w-[120px]">{{ __('End') }}</label>
        <input type="text" id="{{ $isUpdate ? 'end_update' : 'end' }}" placeholder="Ex: 19 septembre 2020 | 14:00"
            class="flatpickr border rounded-lg w-full py-2 px-3 text-gray-600 bg-[#f1f1f1] border-[#dce1e8]" required>
        <input type="hidden" id="{{ $isUpdate ? 'end_hidden_update' : 'end_hidden' }}" name="end">
    </div>

    <div class="mt-4">
        <label for="{{ $isUpdate ? 'note_update' : 'note' }}"
            class="block text-sm text-[#6F7D93] font-semibold mb-2">{{ __('Add Note') }}</label>
        <textarea id="{{ $isUpdate ? 'note_update' : 'note' }}" name="note" placeholder="Notes ( Facultatif )"
            class="h-[80px] w-full border-2 p-1 bg-[#f1f1f1] border-[#dce1e8] rounded-lg"></textarea>
    </div>
    <input type="hidden" name="residence_id" value="{{ $residenceId }}">

    <div class="mt-6">
        <button type="submit"
            class="w-full bg-[#3C4C7C] hover:bg-[#3e569b] text-white py-1 px-6 rounded-full font-bold text-lg">{{ $submitText }}</button>
    </div>
</form>
