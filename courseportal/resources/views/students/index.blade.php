@extends('layouts.app')

@section('content')

	<h1 style="display:inline">Student List</h1>

	<div class="float-right">
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addstudents">Add New Student</button>
	</div>

	<div>{{session('Pesan')}}</div>

	<!--Modal for adding new students-->
	<form method="post" action="/students/add">
		<div class="modal fade" id="addstudents" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addstudents">Add New Student</h5>
						<button type="button" class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
							@csrf
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
								@error('name')
								{{ $message }}
								@enderror
							</div>
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
								@error('email')
								{{ $message }}
								@enderror
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
								@error('password')
								{{ $message }}
								@enderror
							</div>
							<div class="form-group">
								<label for="birthdate">Birth Date</label>
								<input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}">
								@error('birthdate')
								{{ $message }}
								@enderror
							</div>
							<div class="form-group">
								<label for="short_desc">Short Description</label>
								<input type="text" class="form-control" id="short_desc" name="short_desc" placeholder="Enter something about you" value="{{ old('short_desc') }}">
								@error('short_desc')
								{{ $message }}
								@enderror
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Add New Student</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<div><br></div>

	<table class="table table-hover">
		<thead class="table-dark">
			<td>#</td>
			<td>Name</td>
			<td>Email</td>
			<td>Tools</td>
		</thead>
		@foreach($students as $s)
			<tr>
				<td>{{$s->id}}</td>
				<td>
					<a href="/class/{{$s->id}}">{{$s->name}}</a>
				</td>
				<td>{{$s->email}}</td>
				<td>
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit-{{$s->id}}">Edit</button>
					
					<!--Modal for Edit Data-->
					<div class="modal fade" id="edit-{{$s->id}}" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered"  role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="edit-{{$s->id}}">Edit Data</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="/students/edit/{{ $s->id }}" method="POST">
										@method('patch')
										@csrf
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" name="name" value="{{ $s->name }}" class="form-control">
											@error('name')
											{{ $message }}
											@enderror
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" name="email" value="{{ $s->email }}" class="form-control">
											@error('email')
											{{ $message }}
											@enderror
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" name="password" class="form-control">
											@error('password')
											{{ $message }}
											@enderror
										</div>
										<div class="form-group">
											<label for="birthdate">Birth Date</label>
											<input type="date" name="birthdate" value="{{ $s->birthdate }}" class="form-control">
											@error('birthdate')
											{{ $message }}
											@enderror
										</div>
										<div class="form-group">
											<label for="short_desc">Short Description</label>
											<input type="text" name="short_desc" value="{{ $s->short_description }}" class="form-control"> <br>
											@error('short_desc')
											{{ $message }} <br>
											@enderror
										</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Save Changes</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<br>

					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-toggle="modal" data-target="#delete-{{$s->id}}">Delete</button>

					<!--Modal for Delete Data-->

					<div class="modal fade" id="delete-{{$s->id}}" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="delete-{{$s->id}}">Delete Data</h5>
									<button type="button" class="close" data-dismiss="modal">
										<span>&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Are you sure you want to delete this data?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									<form action="/students/delete/{{$s->id}}" method="POST">
										@method('delete')
										@csrf
										<button type="submit" class="btn btn-primary">Delete</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!--<a href="/students/edit/{{ $s->id }}">Ubah</a>-->
					<!--<form action="/students/delete/{{ $s->id }}" method="post">
						@method('delete')
						@csrf
							<button type="submit">Delete</button>
					</form>-->
				</td>
			</tr>
		@endforeach
	</table>
	<div class="d-flex justify-content-center">{{ $students->links() }}</div>
@endsection