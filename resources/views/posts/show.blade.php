@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')
    <!--個別の詳細表示画面-->
    @if (session('message'))
        {{ session('message') }}
    @endif
    
    {{ $post->title }}
    {{ $post->content }}
 @endsection   
<a href="/posts/{{ $post->id }}/edit">編集</a>
