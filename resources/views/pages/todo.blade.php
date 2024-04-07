@extends('layout.app')
@section('content')
    <h1>TO-DO App Assessment</h1>
    <div class="jumbotron text-center"> 
        <h1>Selected to do task</h1>

                <div class="well">
                    <h3> {{$todo->title}}</h3>
                    <small>{{$todo->description}}</small>
                    
                </div>
                

                <div class='parent'>
                    
                    <div class='child' style=" display: inline-block;padding: 1rem 1rem;vertical-align: middle;">
                        <a href="/todo/{{$todo->id}}/edit" class="btn btn-danger">Edit</a>
                    </div><div class='child' style=" display: inline-block;border: 1px;padding: 1rem 1rem;vertical-align: middle;">
                 {!!Form::open(['action'=>['App\Http\Controllers\ToDoController@destroy',$todo->id],'method'=>'POST'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!!Form::close()!!}   </div class='child'>  
                @can('update', $todo)  @endcan
            </div>
            
                                   
                </div>
            
                    &nbsp;
                    <div>
                         
                    </div>
               
            

    </div>
@endsection

