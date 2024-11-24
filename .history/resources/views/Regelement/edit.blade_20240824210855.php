@extends('layouts.main')

@section('content')
    {{-- navbar --}}
    <x-layouts.navbar :user="Auth::user()" route="regelement.index" ></x-layouts.navbar>
<form action="{{ route('regelement.update', $residence->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)] rounded-[20px] bg-[#FFFFFF] relative flex flex-col p-[20px_0_20.5px_0] w-[fit-content] box-sizing-border">
        <div class="m-[0_30px_26px_30px] flex flex-row justify-between self-end w-[787px] box-sizing-border">
            <button class="rounded-[8px] bg-[linear-gradient(90deg,#80C637,#34B734)] relative flex flex-row p-[4.5px_12px_4.5px_15px] box-sizing-border hover:bg-[linear-gradient(90deg,#34B734,#80C637)] transition duration-300 ease-in-out transform hover:scale-105" type="submit">
                <span class="m-[0_4.3px_0_0] break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                    Enregistrer
                </span>
                <div class="bg-[url('../assets/images/save_1.png')] bg-[50%_50%] bg-cover bg-no-repeat m-[1.5px_0_1.5px_0] w-[12px] h-[12px]"></div>
            </button>
        </div>
        <div class="bg-[#F7F7F7] m-[0_0_20.5px_0] w-[1220px] h-[0px]"></div>
        <input
            name="titre_regelement"
            class="m-[0_20px_22.5px_20px] w-[900px] inline-block self-start break-words font-['Inter'] font-semibold text-[12px] text-[#000000]"
            placeholder="Titre" value="{{ old('titre_regelement', $residence->titre_regelement) }}">
        <div class="bg-[#F7F7F7] m-[0_0_20.5px_0] w-[1220px] h-[0px]"></div>
        <div id="editor-container" style="height: 700px; border:none">
            {!! old('editor_content', $residence->description) !!}
        </div>
        <input type="hidden" id="editor-content" name="editor_content">
    </div>
</form>

<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Custom icons for Undo and Redo buttons
        var icons = Quill.import('ui/icons');
        icons['undo'] = '<img src="../assets/images/undo_1.png" width="18" height="18" alt="Undo">';
        icons['redo'] = '<img src="../assets/images/forward_1.png" width="18" height="18" alt="Redo">';
        icons['increase'] = '<img src="../assets/images/letter.png" width="18" height="18" alt="Increase">';
        icons['decrease'] = '<img src="../assets/images/decrease_font_size_1.png" width="18" height="18" alt="Decrease">';

        // Initialize Quill editor with custom toolbar
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: [
                        ['undo', 'redo'], // Undo and Redo buttons
                        ['increase', 'decrease'], // Increase and Decrease buttons
                        ['bold', 'italic', 'underline'],
                        [{'align': ''}, {'align': 'center'}, {'align': 'right'}, {'align': 'justify'}],
                        [{'list': 'bullet'}, {'list': 'ordered'}],
                    ],
                    handlers: {
                        'undo': function() {
                            quill.history.undo();
                        },
                        'redo': function() {
                            quill.history.redo();
                        },
                        'increase': function() {
                            changeFontSize(1);
                        },
                        'decrease': function() {
                            changeFontSize(-1);
                        }
                    }
                },
                history: {
                    delay: 2000,
                    userOnly: true
                }
            }
        });

        var Parchment = Quill.import('parchment');
        var SizeStyle = new Parchment.Attributor.Style('size', 'font-size', {
            scope: Parchment.Scope.INLINE,
            whitelist: ['10px', '11px', '12px', '13px', '14px', '15px', '16px', '17px', '18px', '19px', '20px',
                '21px', '22px', '23px', '24px', '25px', '26px', '27px', '28px', '29px', '30px', '32px', '36px',
                '48px', '60px', '72px'
            ]
        });
        Quill.register(SizeStyle, true);

        function changeFontSize(step) {
            const range = quill.getSelection();
            if (range) {
                const currentSize = quill.getFormat(range).size || '16px';
                let newSize = parseInt(currentSize, 10) + step;
                newSize = Math.max(10, Math.min(72, newSize)); // Limit between 10px and 72px
                quill.formatText(range.index, range.length, 'size', `${newSize}px`);
            }
        }

        // Form submission handler
        var form = document.querySelector('form');
        form.addEventListener('submit', function() {
            // Populate hidden input with the editor's HTML content
            document.querySelector('#editor-content').value = quill.root.innerHTML;
        });
    });
</script>
@endsection
