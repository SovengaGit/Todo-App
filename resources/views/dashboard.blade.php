@extends('layout.app')

@section('content')
<div class="container">
    
        <div class="container">
            
            @yield('content')
        </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($toDos)>0)
                    @foreach($toDos as $todo)
                        <div class="well">
                            <h3> <a href="/todo/{{$todo->id}}">{{$todo->title}}
                            <small>{{$todo->description}}</small>
                            
        
                        </div>
                    @endforeach
                    
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
