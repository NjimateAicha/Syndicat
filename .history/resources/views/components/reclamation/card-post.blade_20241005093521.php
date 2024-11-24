    @php
        use App\Http\Controllers\TimeFunction;
    @endphp
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<div class="w-full ">
    <div class="flex flex-row justify-between">
        class="rounded-[20px] bg-[#FFFFFF]  relative flex flex-col p-[10px_0_0.5px_0] box-sizing-border box-sizing-border m-1 w-full">
        <div class="m-[0_30px_12.5px_15px] flex flex-row justify-between  box-sizing-border ">

            <div
                class="m-[7.5px_7.5px_7.5px_0] inline-block break-words font-['Inter'] font-semibold text-[12px] text-[#6F7D93]">
                <span class="capitalize">{{ $data->type }}</span> : {{ $data->titre }}
            </div>
            <div>
                <span class="text-right break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93]">
                    {{ TimeFunction::formatDateToFrench($data->created_at) }}<br />
                    {{ $data->lieu }}
                </span>
            </div>


        </div>


        <div
            class="p-[0_30px_11.5px_30px] inline-block self-start break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93] max-w-full ">
            {{ $data->description }}
        </div>

        @if ($data->image)
            <div class="rounded-[10px] bg-[50%_50%] bg-cover bg-no-repeat m-[0_30px_13.9px_30px] self-start w-4/5 h-[230.1px] "
                style="background-image: url('{{ asset($data->image) }}');">
            </div>
        @endif


        <div class="bg-[#F7F7F7] m-[0_0_8px_0] w-full h-[0px]">
        </div>

        <div class="">
            @if ($data->commentaires)
                @foreach ($data->commentaires as $comment)
                    <div class="p-[0_30px_0_15px] flex flex-row w-full box-sizing-border">
                        <div class="rounded-[100px] m-[0_5px_15.5px_0] w-[30px] h-[30px]"
                            style="background-image: url('{{ asset($comment->user->image) }}'); background-size: cover; background-position: center;">
                        </div>

                        <div class="flex flex-col items box-sizing-border w-full b">
                            <div class="m-[0_0_0.5px_0] flex flex-row justify-between w-full box-sizing-border">
                                <span
                                    class="m-[0_7.5px_0_0] w-[235px] break-words font-['Inter'] font-medium text-[12px] text-[#6F7D93]">
                                    {{ $comment->user->name }} “ {{ $comment->user->getRoleNames()->implode(', ') }} ”
                                </span>
                                <div
                                    class="m-[1.5px_0_1.5px_0]  break-words font-['Inter'] font-medium text-[10px] text-[#6F7D93] flex justify-end">
                                    {{ TimeFunction::formatDateToFrench($comment->created_at) }}<br />
                                </div>
                            </div>
                            <span
                                class="m-[0_71.1px_0_0] break-words font-['Inter'] font-normal text-[12px] text-[#6F7D93] text-start	 ">
                                {{ $comment->text }}
                            </span>
                        </div>
                    </div>
                @endforeach

        @endif
        </div>



        @role('Super Admin|Admin|Manager principal|Manager')
            <form action="{{ route('commentaires.store') }}" method="POST" class="w-full">
                @csrf
                <div class="p-[0_12px_27px_15px] flex flex-row w-full box-sizing-border">
                    <div class="rounded-[50px]  m-[5px_5px_5px_0] w-[60px] h-[auto]"
                        style="background-image: url('{{ asset($user->image) }}'); background-size: cover; background-position: center;">
                    </div>

                    <div
                        class="rounded-[40px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] relative m-[0_8px_0_0] p-[12.5px_15px_12.5px_15px] w-full box-sizing-border">
                        <input type="text" placeholder="Centenu de votre commentaire" id="text" name="text"
                            class="rounded-[8px] border-[1px_solid_#9EAFCE] bg-[#F1F1F1] m-[0_120px_0_0] inline-block break-words font-['Inter'] font-normal text-[12px] text-[#A2A2A2] box-sizing-border w-full" />
                        <input name="reclamation_id" value="{{ $data->id }}" type="hidden">

                    </div>
                    <button type="submit">
                        <div
                            class="rounded-[60px] border-[1px_solid_#9EAFCE] bg-[#3C4C7C] relative flex p-[12.5px_0_12.5px_0] w-full min-w-[160px] box-sizing-border justify-center">
                            <span class="break-words font-['Inter'] font-bold text-[12px] text-[#FFFFFF]">
                                Ajouter un commentaire
                            </span>
                        </div>
                    </button>
                </div>
            </form>
        @endrole


    </div>

</div>









