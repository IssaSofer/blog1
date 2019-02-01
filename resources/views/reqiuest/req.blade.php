@extends('layouts.app')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="request">
                <h3>Request</h3>
                @foreach($reqs as $req)

                    {!! Form::open(['action' => 'ReqiuestController@store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            <p><label>Name :</label> {{$req->name}}</p>                              
                       </div>
                        <div class="form-group">
                            <p><label>Room :</label> {{$req->room}}</p>                            
                       </div>
                        <div class="form-group">
                            {{Form::label('desc_request', 'Request')}}
                            {{Form::textarea('desc_request', '', ['class'=>'form-control', 'placeholder'=>"write your LastName"])}}                             
                            
                       </div>
                       {{Form::submit('Request', ['class'=>'btn btn-primary req_btn'])}}
                    {!! Form::close() !!}
                @endforeach
            </div>
        </div>
    </div>
</div>

<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="request">
                <h3>Request</h3>
                @foreach($reqs as $req)
                    <form class="form-horizontal" method="POST" action="{{ route('reqiuest.req') }}">
                        {{ csrf_field() }}

                        <div class="form-group"> 
                            <label for="student">Student Name</label>
                            <select name="student" class="form-control">
                                <option value="{{$req->name}}">{{$req->name}}</option>
                            </select>                               
                       </div>

                        <div class="form-group">
                            <label for="room">Your Room</label>
                            <select name="room" class="form-control">
                                <option value="{{$req->room}}">$req->room</option>
                            </select>                          
                       </div>

                        <div class="form-group">
                            <label for="desc_request">Request</label>
                            <textarea name="desc_request" class="form-control"></textarea>   
                       </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="Request" class="btn btn-primary btn-lg"></input>
                                
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

-->
@endsection

