<?php //dd($transactions)?>
<?php
/*<table>
	<tr>
		<td>ID</td>
		<td>Student ID</td>
		<td>Student Name</td>
		<td>Teacher ID</td>
		<td>Teacher Name</td>
		<td>Subject ID</td>
		<td>Subject Name</td>
	</tr>
	@foreach($transactions as $s)
		<tr>
			<td>{{$s->id}}</td>
			<td>{{$s->student_id}}</td>
			<td>{{$s->students->name}}</td>
			<td>{{$s->teacher_id}}</td>
			<td>{{$s->teachers->name}}</td>
			<td>{{$s->subject_id}}</td>
			<td>{{$s->subjects->name}}</td>
		</tr>
	@endforeach
</table>*/
?>

<?php/*
<table>
	<tr>
		<td>ID</td>
		<td>Student ID</td>
		<td>Student Name</td>
		<td>Teacher ID</td>
		<td>Teacher Name</td>
		<td>Subject ID</td>
		<td>Subject Name</td>
	</tr>
	@foreach($transactions as $s)
		<tr>
			<td>{{$s->id}}</td>
			<td>{{$s->student_id}}</td>
			<?php //echo var_dump($s->students->name) ?>
			<td>
				@foreach($s->students as $siswa)
					{{$siswa->name}}
				@endforeach
			</td>
			<td>{{$s->teacher_id}}</td>
			<td>
				@foreach($s->teachers as $guru)
					{{$guru->name}}
				@endforeach
			</td>
			<td>{{$s->subject_id}}</td>
		</tr>
	@endforeach
</table>
*/?>

<table class="table table-hover">
		<thead class="table-dark">
			<td>#</td>
			<td>Student Name</td>
			<td>Teacher Name</td>
			<td>Subject Name</td>
			<td>Duration (Hours)</td>
		</thead>
		@foreach($transactions as $s)
			<tr>
				<td>{{$s->id}}</td>
				<td>
					@foreach($s->students as $t)
						{{$t->name}}
					@endforeach
				</td>
				<td>
					@foreach($s->teachers as $t)
						{{$t->name}}
					@endforeach
				</td>
				<td>
					@foreach($s->subjects as $t)
						{{$t->name}}
					@endforeach
				</td>
				<td>
					@foreach($s->subjects as $t)
						{{$t->duration}}
					@endforeach
				</td>
			</tr>
		@endforeach
	</table>