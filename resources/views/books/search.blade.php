@extends('layout')

@section('main')
@foreach ($books as $book)

<h4>Title</h4>:{{$book->name}}
<p>desc{{$book->desc}}</p>
@endforeach

@endsection
