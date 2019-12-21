@extends('layout')

@section('content')

<form action="{{ route('post.store') }}" method="post">

    @csrf



    @include('post._form')

    <button type="submit" class="btn btn-primary">create</button>
</form>
    
@endsection