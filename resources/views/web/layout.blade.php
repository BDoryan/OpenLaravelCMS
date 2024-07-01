@extends('web.page')

@section('title', $title)
@section('description', $description)

@include('web.partials.header')
{!! $content !!}
@include('web.partials.footer')
