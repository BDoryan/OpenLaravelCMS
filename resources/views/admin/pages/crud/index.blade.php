@extends('admin.layout')

@section('title', 'Gestionnaire de ' . $model)

@section('section-wrapper')
    <x-section-header>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>

        <x-slot name="actions">
            <a href="{{ route('admin.crud.create', ['model' => strtolower($model)]) }}" class="olc-btn olc-btn-primary">Ajouter</a>
        </x-slot>
    </x-section-header>

    <x-show-alerts />

    {{ $table->render() }}
@endsection
