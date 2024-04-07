@extends('layout.app')
@section('content')
    <h1>List of To Do Items</h1>
    <div class="jumbotron text-center">
        
        @if(count($toDos)>0)
            @foreach($toDos as $todo)
                <div class="well">
                    <h3> <a href="/todo/{{$todo->id}}">{{$todo->title}}
                    <small>{{$todo->description}}</small>
                    

                </div>
            @endforeach
            {{$toDos->links()}}
        @endif
        

    </div>
@endsection

