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
<h1>Create GITHUB Issue</h1>
{!! Form::open(['action' => 'App\Http\Controllers\GitHubController@store', 'method'=>'POST']) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title','required'=>true,'name'=>'title'])}}
</div>
<div class="form-group">
    {{Form::label('title','Body')}}
    {{Form::textarea('Body','',['class'=>'form-control','placeholder'=>'Body','required'=>true,'name'=>'body'])}}
</div>
<div class="form-group">
    {{Form::label('title','assignees')}}
    {{Form::text('assignees','SovengaGit',['class'=>'form-control','placeholder'=>'assignees','name'=>'assignees'])}}
</div>
{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection