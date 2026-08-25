@extends('layouts.app')

@section('title', 'Server Error | Career Institute')
@section('body_class', 'error-page')
@section('hide_breadcrumb', 'true')

@section('content')
    @include('errors._content', [
        'status' => '500',
        'heading' => 'Something Went Wrong',
        'message' => 'Our server encountered an unexpected problem. Please try again shortly, or contact Career Institute if the issue continues.',
    ])
@endsection
