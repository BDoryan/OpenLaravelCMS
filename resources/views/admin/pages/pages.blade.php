@extends('admin.layout')

@section('title', 'Tableau de bord')

@section('section-wrapper')
    <x-section-header>
        <x-slot name="title">Gestion des pages</x-slot>
        <x-slot name="description">Retrouver ici la liste de toutes les pages de votre site.</x-slot>
    </x-section-header>


@endsection
