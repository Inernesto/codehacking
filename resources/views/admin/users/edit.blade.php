@extends('layouts.admin')


@section('content')

	<h1>Edit Users</h1>
	
<div class="row">
	
	
	<div class="col-sm-3">
		
		<img height="100" src="{{ $user->photo ? asset($user->photo->file) : 'http://place-hold.it/150x150' }}" alt="" class="img-responsive img-rounded">
		
	</div>
	
	
	
	<div class="col-sm-9">
	
	{!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true ]) !!}
	
	{{csrf_field()}}
	
	<div class="form-group">
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('email', 'Email:') !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}
	</div>	
	
	<div class="form-group">
		{!! Form::label('role_id', 'Role:') !!}
		{!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('is_active', 'Status:') !!}
		{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('photo_id', 'Photo') !!}
		{!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
	</div>				
	
	<div class="form-group">
		{!! Form::label('password', 'Password') !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>		
	
	<div class="form-group">
		{!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}
	
	</div>
	
</div>


	@include('includes.form_error')
	
@stop