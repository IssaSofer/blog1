@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <div class="row">
            @can('Admin-store', Auth::user())
                @foreach ($reqiuest as $reqiuests)
                    @if ($reqiuests->yes_no == 0)
                        @if($reqiuests !== null)
                           <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><span>Student:</span> {{ $reqiuests->student }}</div>

                                    <div class="panel-body">
                                        <p><span>Request:</span> {{$reqiuests->desc_request}}</p>
                                        <div class="pull-right btn-groub">

                                            {!! Form::open(['action' => ['ReqiuestadminController@destroy', $reqiuests->id], 'method' => 'POST']) !!}
                                               {{Form::hidden('_method', 'DELETE')}}
                                               {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                            {!! Form::close() !!}

                                            {!! Form::open(['action' => ['ReqiuestadminController@update', $reqiuests->id], 'method' => 'POST']) !!}
                                               {{Form::hidden('_method', 'PUT')}}
                                               {{Form::submit('Apply', ['class'=>'btn btn-primray'])}}
                                            {!! Form::close() !!}
                                        </div>
                                        <p class="date"><span>Date:</span> {{$reqiuests->created_at}} | <span>Room:</span> {{$reqiuests->room}}</p>
                                        
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>No Request</p>
                        @endif
                    @endif
                @endforeach
            @endcan

<!--************************************************-->
            <!-- store -->

            @cannot('Admin-store', Auth::user())
                @foreach ($reqiuest as $reqiuests)
                    @if ($reqiuests->yes_no == 1)
                        @if($reqiuests !== null)
                           <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><span>Student:</span> {{ $reqiuests->student }}</div>

                                    <div class="panel-body">
                                        <p><span>Request:</span> {{$reqiuests->desc_request}}</p>
                                        <div class="pull-right btn-groub">

                                            {!! Form::open(['action' => ['ReqiuestadminController@destroy', $reqiuests->id], 'method' => 'POST']) !!}
                                               {{Form::hidden('_method', 'DELETE')}}
                                               {{Form::submit('End', ['class'=>'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </div>
                                        <p class="date"><span>Date:</span> {{$reqiuests->created_at}} | <span>Room:</span> {{$reqiuests->room}}</p>
                                        
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>No Request</p>
                        @endif
                    @endif
                @endforeach
            @endcannot

        </div>
    </div>
@endsection