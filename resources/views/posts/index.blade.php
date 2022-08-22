@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
@forelse ($posts as $post )
    @include('posts.partials.post')
@empty
    No post found!
@endforelse

@endsection
