@extends('layout.app')
@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
@section('content')
    <h1>Create TO Do Item</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\ToDoController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title','required'=>true,'name'=>'title'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Description')}}
            {{Form::textarea('Description','',['class'=>'form-control','placeholder'=>'Description','required'=>true,'name'=>'description'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

