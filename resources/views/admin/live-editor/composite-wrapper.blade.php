<!-- /.composite-wrapper -->
<div class="olc-border-slate-700 olc-border-[1px]" data-block-id="{{$composite->block->id}}" data-composite-id="{{ $composite->id }}">
    <div tabindex="0" class="olc-composite-header olc-flex olc-gap-3 olc-bg-slate-700 olc-text-white olc-px-3 olc-py-2 olc-italic olc-items-center hover:olc-olc-cursor-move olc-transition-transform olc-duration-300 olc-transform hover:olc-olc-bg-gray-800 hover:olc-olc-bg-opacity-85">
        block_name: {{ $composite->block->name }}, composite_id: {{ $composite->id }},
        block_id: {{ $composite->block_id }}
        <div class="olc-ms-auto olc-flex olc-gap-3">
            <button
                data-block-action="move-up"
                class="olc-bg-gray-600 olc-p-2 olc-rounded-full olc-border-[1px] olc-border-gray-600 olc-border-opacity-30 olc-group">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 185.343 185.343" xml:space="preserve"
                     class="olc-group-hover:-olc-translate-y-1.5 olc-transition-transform olc-duration-700 olc-transform olc-w-4 olc-h-4 olc-fill-white olc-rotate-[-90deg]"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
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
                class="olc-bg-gray-600 olc-p-2 olc-rounded-full olc-border-[1px] olc-border-gray-600 olc-border-opacity-30 olc-group">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 185.343 185.343" xml:space="preserve"
                     class="olc-group-hover:olc-translate-y-1.5 olc-transition-transform olc-duration-700 olc-transform olc-w-4 olc-h-4 olc-fill-white olc-rotate-90"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
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
                class="olc-bg-red-700 olc-p-2 olc-rounded-full olc-border-[1px] olc-border-red-900 olc-border-opacity-30 hover:olc-olc-rotate-180 olc-transition-transform olc-duration-500 olc-transform">
                <svg class="olc-w-4 olc-h-4 olc-text-white olc-rotate-45" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </button>
        </div>
    </div>
    {!! $content !!}
</div>
