@extends('layout')
@section('title')
show
@endsection
@section('main')

<h4>{{$cat->name}}</h4>
<p>desc{{$cat->desc}}</p>
<h4>
    <ul>books:    </h4>


       @foreach ($cat->books as $book)

<li>  {{$book->name}}</li>
          @endforeach()

        </ul>
<a href="{{url('cats')}}">back</a>
@endsection
