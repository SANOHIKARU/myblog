@extends('layouts.default')

{{--
↑Bladeのコメントアウト↓

@section('title')
Blog Posts
@endsection

--}}

{{-- manageからextendsしてindexを作ったほうがいい可能性もある。でも今は似たようなデザインだけど将来的には変化するし、二種類のデザインを試せる可能性もありますね --}}

@section('title', 'manage -Sanolog(サノログ)-')

@section('content')
<div class="container">
  <h1>
    <a href="{{ url('/posts/create') }}" class="header-menu">New Post</a>
    <a href="{{ url('/') }}">Blog Posts</a>
  </h1>
  <ul style="list-style: none;">
    {{--
        @foreach ($posts as $post)
      <li><a href="">{{$post->title}}</a></li>
    @endforeach
    --}}


    @forelse ($posts as $post)
    <!-- <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li> -->
    <!-- <li><a href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a></li> -->
    <!-- <li><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></li> -->
    <li>
      {{ $post->good }}
      <a href="{{ action('PostsController@increaseGood', $post) }}" class="btn btn-primary btn-sm">👍</a>

      <a href="{{ action('PostsController@decreaseGood', $post) }}" class="btn btn-primary btn-sm">👎</a>


      <a href="{{ action('PostsController@manageShow', $post) }}">{{ $post->title }}</a>
      <a href="{{ action('PostsController@edit', $post) }}" class="edit">[Edit]</a>
      <a href="#" class="del" data-id="{{ $post->id }}">[x]</a>
      <form method="post" action="{{ url('/posts', $post->id) }}" id="form_{{ $post->id }}">
        {{ csrf_field() }}
        {{ method_field('delete') }}
      </form>
    </li>

    @empty
    <li>No posts yet</li>
    @endforelse

  </ul>
  <script src="/js/main.js"></script>

  @endsection