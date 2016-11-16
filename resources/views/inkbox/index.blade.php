@extends('layout/main')
@section('title', 'Inkbox Analytics')

@section("content")

<link rel="stylesheet" href="{{ URL::asset('css/inkbox.css') }}" />

<div class="container-fluid">
	<div class="row main-bg">
		<div class="col-xs-12 main-header">
			<h1 class="padL15"><img src="{{ URL::asset('images/logo.png') }}"> Analytics</h1>
		</div>
	</div>

	<div class="row" id="graph_container"></div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script type="text/javascript">
	$.post("/inkbox/userdata", function(data) {
		$("#graph_container").append(data);
	});

	$.post("/inkbox/tattoodata", function(data) {
		$("#graph_container").append(data);
	});
</script>
@endsection