@extends('layouts.app')

@section('content')

	<h1 style="display:inline">Subjects List</h1>

	<div class="float-right">
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addsubjects">Add New Subjects</button>
	</div>

	<div>{{session('Pesan')}}</div>

	<!--Modal for adding new subjects-->
	<form method="post" action="/subjects/add">
		<div class="modal fade" id="addsubjects" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addsubjects">Add New Subject</h5>
						<button type="button" class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
							@csrf
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Subject Name" value="{{ old('name') }}">
								@error('name')
								{{ $message }}
								@enderror
							</div>
							<div class="form-group">
								<label for="Duration">Duration</label>
								<input type="number" min="0" class="form-control" id="duration" name="duration" placeholder="Enter Duration" value="{{ old('duration') }}">
								@error('duration')
								{{ $message }}
								@enderror
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Add New Subject</button>
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
			<td>Duration</td>
			<td>Tools</td>
		</thead>
		@foreach($subjects as $s)
			<tr>
				<td>{{$s->id}}</td>
				<td>
					{{$s->name}}
				</td>
				<td>{{$s->duration}}</td>
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
									<form action="/subjects/edit/{{ $s->id }}" method="POST">
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
											<label for="email">Duration</label>
											<input type="number" min="0" name="duration" value="{{ $s->duration }}" class="form-control">
											@error('duration')
											{{ $message }}
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
									<form action="/subjects/delete/{{$s->id}}" method="POST">
										@method('delete')
										@csrf
										<button type="submit" class="btn btn-primary">Delete</button>
									</form>
								</div>
							</div>
						</div>
					</div>

				</td>
			</tr>
		@endforeach
	</table>
	<div class="d-flex justify-content-center">{{ $subjects->links() }}</div>
@endsection