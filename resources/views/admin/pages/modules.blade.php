@extends('admin.layout')

@section('title', 'Liste de tout les modules')

@section('section-wrapper')
    <x-section-header>
        <x-slot name="title">Liste de tout les modules</x-slot>
        <x-slot name="description">Gérer les différents modules du CMS</x-slot>
    </x-section-header>

    <livewire:modules />
@endsection

