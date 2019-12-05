@extends('layouts.default')

{{--
↑Bladeのコメントアウト↓

@section('title')
Blog Posts
@endsection

--}}

@section('title', 'Sanolog(サノログ)')

@section('content')
<div class="container">
  <h1>
    Blog Posts
  </h1>
  <ul style="list-style: none;">
  {{-- <ul> --}}


    @forelse ($posts as $post)
    <li>
      {{ $post->good }}
      {{-- ← --}}
      {{-- <button class="btn" type="button"> --}}
        <a href="{{ action('PostsController@increaseGood', $post) }}" class="btn btn-primary btn-sm">👍</a>
      {{-- </button> --}}

      <a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>

    </li>

    @empty
    <li>No posts yet</li>
    @endforelse

  </ul>
  <script src="/js/main.js"></script>

  @endsection