@extends('layout/main')
@section('title', 'Inkbox Analytics')

@section("content")

<div class="row">
	<div class="col-xs-12"><h1>test</h1></div>
	<div class="col-xs-12" id="user_graph"></div>
</div>

<script type="text/javascript">
	$.post("/inkbox/userdata", function(data) {
		console.log("user_data", data);
	});
</script>
@endsection