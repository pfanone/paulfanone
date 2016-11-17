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
		<div class="col-xs-12 col-sm-3">
			<button id="graph_btn" class="btn-block graph-btn">Show Graphs</button>
		</div>
		<div class="col-xs-12 col-sm-3">
			<button id="tattoo_btn" class="btn-block graph-btn">Show Tattoos</button>
		</div>
	</div>

	<div id="graphs_section" class="row">
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

	<div id="tattoo_section" class="row" style="display:none;">
	</div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script type="text/javascript">
	loadGraphs();

	$("#graph_btn").on("click", function() {
		loadGraphs();
	});

	$("#tattoo_btn").on("click", function() {
		$("#tattoo_section").show();
		$("#graphs_section").hide();
	});

	function loadGraphs() {
		$("#user_graph_container").empty();
		$("#tattoo_graph_container").empty();
		$("#user_tattoo_graph_container").empty();

		$.post("/inkbox/userdata", function(data) {
			$("#user_graph_container").html(data);
		});

		$.post("/inkbox/tattoodata", function(data) {
			$("#tattoo_graph_container").html(data);
		});

		$.post("/inkbox/usertattoodata", function(data) {
			$("#user_tattoo_graph_container").html(data);
		});
		
		$("#graphs_section").show();
		$("#tattoo_section").hide();
	}
</script>
@endsection