@layout('layout/template')

@section('title')
Home
@endsection

@section('content')
@if ($notes)
	<div>
		{{ HTML::link('notes/create', 'Add New', array('class' => 'bttn'))}}
	</div>
	<table class="dataTable">
		<thead>
			<tr>
				<th class="date">Time</th>
				<th class="cat">Category</th>
				<th class="note">Note</th>
				<th class="edit">Edit</th>
				<th class="delete">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($notes as $note)
				<tr>
					<td class="date">{{ $note->created_at }}</td>
					<td class="cat">{{ $note->category->category }}</td>
					<td class="note">{{ $note->note }}</td>
					<td class="edit">{{ HTML::link('notes/update/'.$note->id, 'Edit')}}</td>
					<td class="delete">{{ HTML::link('notes/delete/'.$note->id, 'Delete')}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No record exists
@endif
@endsection

@section('script')
<script>
    var display_length = 5;
    var tableOption = {
        "sPaginationType": "full_numbers",
        "aaSorting": [[0, "desc"]],
        "iDisplayLength": display_length,
        "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "iDisplayStart": ( Math.abs({{ count($notes) }} - display_length) ) // Show most recent records
        // abs function is needed when # of logs are less than 10 (no negative number allowed)
    };
    
    $(".dataTable").dataTable(tableOption);

    SyntaxHighlighter.all();
</script>
@endsection