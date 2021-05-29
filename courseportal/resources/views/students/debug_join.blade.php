@extends('layouts.app')

@section('content')
	<table class="table">
		<tr>
			<td>User ID</td>
			<td>Email</td>
			<td>Actor ID</td>
			<td>Foreign ID</td>
			<td>Name</td>
		</tr>
		@foreach($users as $s)
			<tr>
				<td>{{$s->id}}</td>
				<td>{{$s->email}}</td>
				<td>{{$s->actor_id}}</td>
				<td>{{$s->foreign_id}}</td>
				<td>{{$s->students->name}}</td>
			</tr>
		@endforeach
	</table>
	<div class="d-flex justify-content-center">{{ $users->links() }}</div>
@endsection