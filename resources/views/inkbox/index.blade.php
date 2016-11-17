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

	<div class="row">
		<div class="col-xs-12">
			<div class="row" id="user_graph_container"></div>
		</div>
		<div class="col-xs-12">
			<div class="row" id="tattoo_graph_container"></div>
		</div>
		<div class="col-xs-12">
			<div class="row" id="user_tattoo_graph_container"></div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script type="text/javascript">
	$.post("/inkbox/userdata", function(data) {
		$("#user_graph_container").html(data);
	});

	$.post("/inkbox/tattoodata", function(data) {
		$("#tattoo_graph_container").html(data);
	});

	$.post("/inkbox/usertattoodata", function(data) {
		$("#user_tattoo_graph_container").html(data);
	});
</script>
@endsection