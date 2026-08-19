@extends('layouts.app')

@section('title', 'Gallery | Career Website')
@section('body_class', 'gallery-page')

@section('content')
    @include('partials.site-gallery', ['showMoreButton' => false])
@endsection
