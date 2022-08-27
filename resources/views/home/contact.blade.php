@extends('layouts.app')

@section('title', 'Contact page')

@section('content')
    <h1>Contact Page</h1>

    @can('home.secret')
        <p>
            <a href="{{route('secret')}}">
                Go to special contact detail!
            </a>
        </p>
    @endcan
@endsection
