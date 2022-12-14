@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h1>{{ $post->title}}</h1>
<p>{{ $post->content}}</p>
<p>Added {{$post->created_at->diffForHumans() }}</p>

@if((new Carbon\Carbon())->diffInMinutes($post->created_at) < 5)
    @component('components.badge')
        brand new post!
    @endcomponent
@endif

    <h4>Comments</h4>

    @forelse ($post->comments as $comment)
        <p>
            {{$comment->content}}
        </p>
        <p class="text-muted">
            added {{$comment->created_at->diffForHumans()}}
        </p>
    @empty
        <p>No comment yet!</p>
    @endforelse
@endsection
