@extends('admin.layout')

@section('title', 'Tableau de bord')

@section('section-wrapper')
    <x-section-header>
        <x-slot name="title">Liste de tout les modules</x-slot>
        <x-slot name="description">Gérer les différents modules du CMS</x-slot>
    </x-section-header>
@endsection

