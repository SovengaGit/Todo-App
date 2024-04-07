@extends('layout.app')

@section('content')
    @if (count($services)>0)
        @foreach ($services as $service)
        <ul>
            <li>{{$service}}</li>
        </ul>
        @endforeach
    @endif    
@endsection
<h1>Laravel TO-DO App Assessment</h1>
