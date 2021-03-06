@layout('layout/template')

@section('title')
New Note
@endsection

@section('content')
{{ Form::open() }}
	<div class='cat'>
		{{ Form::label('cat', "Choose Category")}}
		{{ Form::select('cat', $cats) }}
		or {{ Form::label('newcat', "New Category")}}
		{{ Form::text('newcat') }}
	</div>
	{{ Form::label('note', "Note")}}
	{{ Form::textarea('note') }}
	<input type='submit' class='is' name='create' value='Create' />
	<input type='submit' class='is' name='cancel' value='Cancel' />
{{ Form::close() }}
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function() {
		tinyMCE.init({
			theme : "advanced", mode : "exact", elements: "note", plugins : "codesyntax",
			theme_advanced_buttons1_add : "codeformat",
			theme_advanced_buttons3 : ""
		});
	});
</script>
@endsection