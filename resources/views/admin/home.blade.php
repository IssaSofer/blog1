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
            <div class="col-md-3 col-sm-6 col-xs-6 block"> 
                <div class="count-req box text-center">
                    <h3><i class="fas fa-bullhorn"></i></h3>
                        <p class="num">Count Requests: <span>{{ count($req_count) }}</span></p>
                    <p><a href="/admin/request">Click here to show request</a></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-6 block">
                <div class="count-user box text-center">
                    <h3><i class="fas fa-graduation-cap"></i></h3>
                    <p class="num">Count Students: <span>{{ count($user) }}</span></p>
                    <p><a href="/admin/students">Click here to show Students</a></p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-6 block">

                <div class="box-some">
                    <h4 class="text-center">Some Requests</h4>
                    @foreach ($req_show as $reqiuests)
                        @if ($reqiuests->yes_no == 0)
                            <div class="item">
                                <h5 class="content"><span class="title">Name Student:</span> {{ $reqiuests->student }}</h5>
                                <p class="title">Description: </p>
                                <p class="content">{{ $reqiuests->desc_request }}</p>
                                <p class="content"><span class="title">Room:</span> {{ $reqiuests->room }} | <span class="title">Created at:</span> {{ $reqiuests->created_at }}</p>
                            </div>  
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-6 block">
                <div class="box-some">
                    <h4 class="text-center">Some Students</h4>
                    @foreach ($user_show as $users)
                        <div class="item">
                            <p class="content"><span class="title">Name Student:</span> {{ $users->name }}</>
                            <p class="content"><span class="title">Email:</span> {{ $users->email }}</p>
                            <p class="content"><span class="title">Room:</span> {{ $users->room }}</p>
                            <p class="content"><span class="title">Created at:</span> {{ $users->created_at }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
