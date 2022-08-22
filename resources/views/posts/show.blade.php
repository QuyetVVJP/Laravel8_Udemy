@extends('layouts.app')

@section('title', $post['title'])

@section('content')
@if ($post['is_new'])
    <h1>A New Blog</h1>
@elseif (!$post['is_new'])
    <div>Old Blog</div>
@endif

@unless ($post['is_new'])
    <div>
        It is old blog..... using unless
    </div>
@endunless

    <h1>{{ $post['title']}}</h1>
    <p>{{$post['content']}} </p>

@isset($post['has_comment'])
    <div>The blog has comment</div>
@endisset

@endsection
