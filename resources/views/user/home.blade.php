@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($reqs as $req)
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if ($req->yes_no == 1)
                            <span>Apply</span>
                        @elseif ($req->yes_no == 2)
                            <span>Waitting when avelupel things</span>
                        @else
                            <span>not watch</span>
                        @endif
                    </div>

                    <div class="panel-body">
                        <p><span>Request:</span> {{$req->desc_request}}</p>
                        <p class="date"><span>Date:</span> {{$req->created_at}} | <span>Room:</span> {{$req->room}}</p>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
