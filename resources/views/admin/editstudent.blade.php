@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

				{!! Form::open(['action' => ['StudentsController@update', $students->id], 'method' => 'PUT']) !!}
	        		<div class="panel panel-warning">
	        			<div class="panel-heading">
	        				<h3>edit student</h3>
	        			</div>
	        			<div class="panel-body">
						    <div class="form-group">
					    		{{Form::label('name', 'Name Student')}}
					    		{{Form::text('name', $students->name, ['class'=>'form-control', 'placeholder'=>"write Name Student"])}}						   		
						   </div>
						    <div class="form-group">
					    		{{Form::label('email', 'Email')}}
					    		{{Form::email('email', $students->email, ['class'=>'form-control', 'placeholder'=>"write Email Student"])}}						   		
						   </div>
						    <div class="form-group">
						    	{{Form::label('password', 'Password')}}
						    	{{ Form::password('password', ['class' => 'form-control']) }}
								{{Form::hidden('password', $students->password)}}						   		
						   </div>
						   <div class="form-group">
					    		
					    		{{Form::label('room', 'Room')}}
					    		{{Form::number('room', $students->room, ['class'=>'form-control', 'placeholder'=> "write Room Student"])}}						   		
						   </div>
						   {{Form::submit('Update', ['class'=>'btn btn-primary btn-lg'])}}
	        			</div>
	        		</div>
				{!! Form::close() !!}





        </div>
    </div>
</div>
@endsection
