<!-- /.composite-wrapper -->
<div class="border-slate-700 border-[1px]" data-block-id="{{$composite->block->id}}" data-composite-id="{{ $composite->id }}">
    <div tabindex="0" class="flex gap-3 bg-slate-700 text-white px-3 py-2 italic items-center hover:cursor-move transition-transform duration-300 transform hover:bg-opacity-90
    ">
        block_name: {{ $composite->block->name }}, composite_id: {{ $composite->id }},
        block_id: {{ $composite->block_id }}
        <div class="ms-auto flex gap-3">
            <button
                data-block-action="move-up"
                class="bg-gray-600 p-2 rounded-full border-[1px] border-gray-600 border-opacity-30 group">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 185.343 185.343" xml:space="preserve"
                     class="group-hover:-translate-y-1.5 transition-transform duration-700 transform w-4 h-4 fill-white rotate-[-90deg]" ><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <path d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175 l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934 c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z"></path>
                            </g>
                        </g>
                    </g></svg>
            </button>

            <button
                data-block-action="move-down"
                class="bg-gray-600 p-2 rounded-full border-[1px] border-gray-600 border-opacity-30 group">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 185.343 185.343" xml:space="preserve"
                     class="group-hover:translate-y-1.5 transition-transform duration-700 transform w-4 h-4 fill-white rotate-90" ><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <path d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175 l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934 c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z"></path>
                            </g>
                        </g>
                    </g></svg>
            </button>

            <button
                data-block-action="delete"
                class="bg-red-700 p-2 rounded-full border-[1px] border-red-900 border-opacity-30 hover:rotate-180 transition-transform duration-500 transform">
                <svg class="w-4 h-4 text-white rotate-45" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </button>
        </div>
    </div>
    {!! $content !!}
</div>
