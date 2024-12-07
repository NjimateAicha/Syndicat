@extends('layouts.main')

@section('content')
    <x-layouts.navbar :user="Auth::user()" route="reclamations.residence"></x-layouts.navbar>

    <form action="{{ route('regelement.update', $residence->id) }}" method="POST" id="myform">
        @csrf
        @method('POST')
        <div class="flex flex-col md:w-[76rem] p-4 space-y-4 bg-white shadow-lg rounded-[20px] mb-6">
            <!-- Toolbar and Save Button Layout -->
            <div class="w-full flex flex-col md:flex-row justify-between items-center rounded-lg">
                <!-- Toolbar in the center -->
                <div class="flex-1 basis-1/5 text-white p-2 rounded-lgbackground-color:#E9ECEE; color: #3c4c7c flex items-center justify-end"></div>
                <div class="flex-1 basis-3/5 text-white p-2 rounded-lg flex justify-center">
                    <div id="toolbar" class="flex w-full flex-wrap gap-4" style="border: none">
                        <!-- Undo and Redo buttons -->
                        <button id="undo" class="ql-undo mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border"  style="background-color:#E9ECEE"><img src="{{ asset('assets/images/undo_1.png') }}" width="18" height="18" alt="Undo" class="text-[#444444] transition-colors duration-300 ease-in-out hover:text-[#0066cc]"></button>
                        <button id="redo" class="ql-redo mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border" style="background-color:#E9ECEE"><img src="{{ asset('assets/images/forward_1.png') }}" width="18" height="18" alt="Redo" class="text-[#444444] transition-colors duration-300 ease-in-out hover:text-[#0066cc]"></button>

                        <!-- Other Quill's built-in options -->
                        <select class="ql-header mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border"  style="background-color:#E9ECEE">
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option selected></option>
                        </select>
                        <button class="ql-bold mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border"  style="background-color:#E9ECEE"></button>
                        <button class="ql-italic mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border"  style="background-color:#E9ECEE"></button>
                        <button class="ql-underline mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border"  style="background-color:#E9ECEE"></button>
                        <button class="ql-align mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border" value=""  style="background-color:#E9ECEE"></button>
                        <button class="ql-align mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border" value="center"  style="background-color:#E9ECEE"></button>
                        <button class="ql-align mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border" value="right"  style="background-color:#E9ECEE"></button>
                        {{-- <button class="ql-list" value="ordered"></button> --}}
                        <button class="ql-list mx-3 shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[8px] w-[24px] h-[24px] box-sizing-border" value="bullet"  style="background-color:#E9ECEE"></button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex-1 basis-1/5 text-white p-2 rounded-lgbackground-color:#E9ECEE; color: #3c4c7c flex items-center justify-end">
                    <button
                        id="btn"
                        class="rounded-[8px] bg-[linear-gradient(90deg,#80C637,#34B734)] relative flex flex-row p-[4.5px_12px_4.5px_15px] box-sizing-border hover:bg-[linear-gradient(90deg,#34B734,#80C637)] transition duration-300 ease-in-out transform hover:scale-105"
                        type="button">
                        <span class="m-[0_4.3px_0_0] break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                            {{__('Enregistrer')}}
                        </span>
                        <div
                            class="bg-[url('{{ asset('assets/images/save_1.png') }}')] bg-[50%_50%] bg-cover bg-no-repeat m-[1.5px_0_1.5px_0] w-[12px] h-[12px]">
                        </div>
                    </button>
                </div>
            </div>

            <!-- Quill Editor -->
            <div id="editor-container" class="w-full p-4 rounded-lg text-[#6F7D93]" style="height: 700px; border:none">
                <!-- Old content (residence description) -->
                <p>{!! old('editor_content', $residence->description) !!}</p>
            </div>

            <!-- Hidden Input for Quill content -->
            <input type="hidden" id="editor-content" name="editor_content" value="54564564646">
        </div>
    </form>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        var toolbarOptions = [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline'],
            [{ 'align': '' }, { 'align': 'center' }, { 'align': 'right' }],
            [{ 'list': 'bullet' }]
        ];

        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: '#toolbar'
                },
                history: {
                    delay: 2000,
                    userOnly: true
                }
            }
        });

            // Custom binding for Shift + Space to insert non-breaking space (&nbsp;)
        quill.keyboard.addBinding({
        key: ' ',
        shiftKey: true,   // Detect Shift + Space
        }, function(range, context) {
        // Insert a non-breaking space (or any custom character/formatting)
        quill.insertText(range.index, '\u00A0');  // Unicode for non-breaking space
        quill.setSelection(range.index + 1);  // Move the cursor after the inserted space
        });

        // Set editor's content from old value (if available)
        quill.root.innerHTML = `{!! old('editor_content', $residence->description) !!}`;

        // Undo button handler
        document.getElementById('undo').addEventListener('click', function() {
            quill.history.undo();
        });

        // Redo button handler
        document.getElementById('redo').addEventListener('click', function() {
            quill.history.redo();
        });

        // On form submission, save editor content into the hidden input
        var form = document.querySelector('form');
        // form.addEventListener('submit', function() {
        //     console.log("fdsfdsfs");
        //     document.querySelector('#editor-content').value = quill.root.innerHTML;
        // });

        document.getElementById('btn').addEventListener('click', function() {
            console.log( quill.root.innerHTML);
            document.querySelector('#editor-content').value = quill.root.innerHTML;

            console.log( "test ", document.getElementById('editor-content').value );

            document.getElementById('myform').submit();
        });

    </script>
@endsection
