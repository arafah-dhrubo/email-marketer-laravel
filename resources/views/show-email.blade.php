@extends('layouts.app')

@section('content')
<h4>{{$email->title}}</h4>
<p>{!!$email->body!!}</p>
@endsection
