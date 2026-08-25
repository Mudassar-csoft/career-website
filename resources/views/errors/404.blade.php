@extends('layouts.app')

@section('title', 'Page Not Found | Career Institute')
@section('body_class', 'error-page')
@section('hide_breadcrumb', 'true')

@section('content')
    @include('errors._content', [
        'status' => '404',
        'heading' => 'Page Not Found',
        'message' => 'The page you requested may have moved, been removed, or never existed. Use the links below to continue exploring Career Institute.',
    ])
@endsection
