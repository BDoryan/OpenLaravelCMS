@extends('admin.page')

@section('title', env('APP_NAME'). ' - Connexion')

@section('content')
    <!-- ====== Forms Section Start -->
    <section class="olc-bg-gradient-to-br olc-from-red-300 olc-to-red-500 olc-py-20 olc-lg:py-[120px] olc-min-h-[100vh]">
        <div class="olc-container olc-mx-auto">
            <div class="olc-flex olc-flex-wrap olc--mx-4">
                <div class="olc-w-full olc-px-4">
                    <div class="olc-relative olc-mx-auto olc-max-w-[525px] olc-overflow-hidden olc-rounded-lg olc-bg-neutral-200 olc-text-black olc-shadow-2xl olc-py-16 olc-px-10 olc-text-center olc-sm:px-12 md:olc-px-[60px]">
                        <div class="olc-mb-10 olc-text-center md:olc-mb-16">
                            <a href="javascript:void(0)" class="olc-mx-auto olc-inline-block olc-max-w-[160px]">
                                <img src="{{ asset('imgs/logo-block.png') }}" alt="logo" />
                            </a>
                            <h2 class="olc-text-2xl olc-pt-8 olc-font-semibold olc-text-gray-800">
                                Connexion à votre compte
                            </h2>
                            <p class="olc-text-base olc-text-body-color">
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
