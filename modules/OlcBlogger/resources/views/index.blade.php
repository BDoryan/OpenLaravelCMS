@extends('admin.layout')

@section('title', 'Tableau de bord')

@section('section-wrapper')
    <x-section-header>
        <x-slot name="title">Hello World !</x-slot>
        <x-slot name="description">Gérer les articles de votre blog</x-slot>
    </x-section-header>
@endsection
