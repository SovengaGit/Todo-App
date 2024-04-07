@extends('layout.app')
@section('content')
    <h1>GITHUB Issues</h1>
    <div class="jumbotron text-center">
        
        <li><button class="btn btn-success"><a href="/github/create">Create Git Issue</a></button></li>
                @if ($issues->count() !== 0)
                    @foreach ($issues as $data)
                    <div class="well">
                    <h2>{{$data->title}}</h2>
                        <h6>{{$data->body}}</h6>
                        <p><label>Issue URL: </label><a href="{{$data->url}}">{{$data->url}}</a></p>
                        <p><label>Date Created: </label><small>{{$data->created_at}}</small></p>
                        <p><label>Date Updated: </label><small>{{$data->updated_at}}</small></p>
                        @foreach ($data->assignees as $assign)
                        <p><label>Assignees: </label><small>{{$assign->login}}</small></p>
                        @endforeach

                        <div class='parent'>
                            <div class='child' style=" display: inline-block;border: 1px;padding: 1rem 1rem;vertical-align: middle;">
                         {!!Form::open(['action'=>['App\Http\Controllers\GitHubController@destroy',$data->number],'method'=>'POST'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Close',['class'=>'btn btn-danger'])}}
                        {!!Form::close()!!}   </div class='child'>  
                        
                    </div>
                    </div>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">There are no open issues</td>
                    </tr>
                @endif
   
</div>
@endsection

