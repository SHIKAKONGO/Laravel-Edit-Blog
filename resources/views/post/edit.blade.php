@extends('layout')

@section('content')

<form action="{{ route('post.update' , ['post' => $post->id]) }}" method="post">

    @csrf

    @method('PUT')

    @include('post._form')

    <button type="submit">create</button>
</form>
    
@endsection