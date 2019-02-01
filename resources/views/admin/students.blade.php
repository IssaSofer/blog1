@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<h4 class="text-center">Students</h4>
		@foreach($student as $students)
			<div class="col-md-3">
                <div class="student">
                    <p class="content"><span class="title">Name Student:</span> {{ $students->name }}</>
                    <p class="content"><span class="title">Email:</span> {{ $students->email }}</p>
                    <p class="content"><span class="title">Room:</span> {{ $students->room }}</p>
                    <p class="content"><span class="title">Created at:</span> {{ $students->created_at }}</p>
                    
                        {!! Form::open(['class' => 'bt', 'action' => ['StudentsController@destroy', $students->id], 'method' => 'POST']) !!}
                           {{Form::hidden('_method', 'DELETE')}}
                           {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                        {!! Form::close() !!}

                        <a href="/admin/students/{{$students->id}}/edit" class='btn btn-success'>Edit</a>
                    
                </div>
			</div>
		@endforeach
	</div>
</div>


@endsection