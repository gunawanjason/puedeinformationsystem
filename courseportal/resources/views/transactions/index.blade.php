@extends('layouts.app')

@section('content')

	<h1 style="display:inline">Transactions List</h1>

	<div class="float-right">
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addtransactions">Add New Transaction</button>
	</div>

	<div>{{session('Pesan')}}</div>

	<!--Modal for adding new transactions-->
	<form method="post" action="/transactions/add">
		<div class="modal fade" id="addtransactions" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addtransactions">Add New Transaction</h5>
						<button type="button" class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
							@csrf
							<div class="form-group">
								<label for="snama">Student Name</label>
								<input name="snama" class="form-control" list="snama">
							</div>
							<div class="form-group">
								<label for="tnama">Teacher Name</label>
							</div>
							<div class="form-group">
								<label for="pnama">Subject Name</label>
							</div>
							<div class="form-group">
								<label for="plama">Subject Duration</label>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Add New Transaction</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<div><br></div>

	<table class="table table-hover">
		<thead class="table-dark">
			<td>#</td>
			<td>Student Name</td>
			<td>Teacher Name</td>
			<td>Subject Name</td>
			<td>Duration (Hours)</td>
			<td>Tools</td>
		</thead>
		@foreach($transactions as $s)
			<?php
				$snama = null;
				$tnama = null;
				$pnama = null;
				$plama = null;
			?>
			<tr>
				<td>{{$s->id}}</td>
				<td>
					@foreach($s->students as $t)
						<?php $snama = $t->name ?>
						{{$snama}}
					@endforeach
				</td>
				<td>
					@foreach($s->teachers as $t)
						<?php $tnama = $t->name ?>
						{{$tnama}}
					@endforeach
				</td>
				<td>
					@foreach($s->subjects as $t)
						<?php $pnama = $t->name ?>
						{{$pnama}}
					@endforeach
				</td>
				<td>
					@foreach($s->subjects as $t)
						<?php $plama = $t->duration ?>
						{{$plama}}
					@endforeach
				</td>
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
									<form action="/transactions/edit/{{ $s->id }}" method="POST">
										@method('patch')
										@csrf
										<div class="form-group">
											<label for="snama">Student Name</label>
											<input type="text" name="snama" value="{{ $snama }}" class="form-control">
										</div>
										<div class="form-group">
											<label for="tnama">Teacher Name</label>
											<input type="text" name="tnama" value="{{ $tnama }}" class="form-control">
										</div>
										<div class="form-group">
											<label for="pnama">Subject Name</label>
											<input type="text" name="pnama" class="form-control">
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
									<form action="/transactions/delete/{{$s->id}}" method="POST">
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
	<div class="d-flex justify-content-center">{{ $transactions->links() }}</div>



<?php
	$snama_list = \App\Student::all();
?>
<datalist id="snama">
	@foreach($snama_list as $n)
		<option value="{{$n->id}}">{{$n->name}}</option>
	@endforeach
</datalist>

@endsection