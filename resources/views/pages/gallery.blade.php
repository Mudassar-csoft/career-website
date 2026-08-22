@extends('layouts.app')

@section('title', 'Gallery | Career Website')
@section('body_class', 'gallery-page')

@section('content')
    <h1 class="visually-hidden">Career Institute Gallery</h1>
    @include('partials.site-gallery', ['showMoreButton' => false])
@endsection
