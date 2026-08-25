@extends('layouts.app')

@section('title', 'Unsupported HTTP Version | Career Institute')
@section('body_class', 'error-page')
@section('hide_breadcrumb', 'true')

@section('content')
    @include('errors._content', [
        'status' => '505',
        'heading' => 'Unsupported HTTP Version',
        'message' => 'Your browser or network sent an HTTP version this server cannot support. Please update your browser and try again.',
    ])
@endsection
