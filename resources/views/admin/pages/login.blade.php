@extends('admin.page')

@section('title', env('APP_NAME'). ' - Connexion')

@section('content')
    <!-- ====== Forms Section Start -->
    <section class="bg-gradient-to-br from-red-300 to-red-500 py-20 lg:py-[120px] min-h-[100vh]">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div
                        class="relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-neutral-200 text-black shadow-2xl py-16 px-10 text-center sm:px-12 md:px-[60px]"
                    >
                        <div class="mb-10 text-center md:mb-16">
                            <a
                                href="javascript:void(0)"
                                class="mx-auto inline-block max-w-[160px]"
                            >
                                <img
                                    src="{{ asset('imgs/logo-block.png') }}"
                                    alt="logo"
                                />
                            </a>
                            <h2 class="text-2xl pt-8 font-semibold text-gray-800">
                                Connexion à votre compte
                            </h2>
                            <p class="text-base text-body-color">
                                Veuillez vous connecter pour continuer
                            </p>
                        </div>
                        <livewire:admin-login-form/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Forms Section End -->
@endsection
