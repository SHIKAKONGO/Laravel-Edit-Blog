@extends('layout')

@section('content')

@foreach ($posts as $post)
    <p>
    <a href="{{ route('post.show' , ['post' => $post->id]) }}">{{ $post->title }}</a>
    </p>

    @if ($post->comments_count)

        <p>{{ $post->comments_count }} comments</p>

    @else
       <p> no comments yet! </p>       
    @endif

<a class="btn btn-primary" href="{{ route('post.edit' , ['post' => $post->id]) }}">Edit</a>


<form class="fm-inline" action="{{ route('post.destroy' , ['post' => $post->id]) }}" method="post">

@csrf

@method('DELETE')

<input type="submit" value="delete" class="btn btn-primary">
</form>
@endforeach
    
@endsection