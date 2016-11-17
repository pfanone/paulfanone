@extends('layout/main')
@section('title', 'Inkbox Analytics')

@section("content")

<link rel="stylesheet" href="{{ URL::asset('css/inkbox.css') }}" />

<div class="container-fluid">
	<div class="row main-bg">
		<div class="col-xs-12 main-header">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<h1 class="padL15"><img src="{{ URL::asset('images/logo.png') }}"> Analytics</h1>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 marginB10">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<button id="graph_btn" class="btn-block graph-btn">Show Graphs</button>
						</div>
						<div class="col-xs-12 col-sm-6">
							<button id="tattoo_btn" class="btn-block graph-btn">Show Tattoos</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="loading_section" class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			<div class="progress marginT20">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
			</div>
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
		<div id="tattoo_container" class="col-xs-12"></div>
	</div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script type="text/javascript">
	loadGraphs();
	// loadTattoos();

	$("#graph_btn").on("click", function() {
		loadGraphs();
	});

	$("#tattoo_btn").on("click", function() {
		loadTattoos();
	});

	function loadGraphs() {
		$("#graph_btn").addClass("active");
		$("#tattoo_btn").removeClass("active");

		$("#loading_section").show();
		$("#graphs_section").hide();
		$("#tattoo_section").hide();

		$("#user_graph_container").empty();
		$("#tattoo_graph_container").empty();
		$("#user_tattoo_graph_container").empty();

		$.post("/inkbox/userdata", function(data) {
			$("#user_graph_container").html(data);
			$("#loading_section").hide();
			$("#graphs_section").show();
		});

		$.post("/inkbox/tattoodata", function(data) {
			$("#tattoo_graph_container").html(data);
			$("#loading_section").hide();
			$("#graphs_section").show();
		});

		$.post("/inkbox/usertattoodata", function(data) {
			$("#user_tattoo_graph_container").html(data);
			$("#loading_section").hide();
			$("#graphs_section").show();
		});
	}

	function loadTattoos() {
		$("#tattoo_btn").addClass("active");
		$("#graph_btn").removeClass("active");

		$("#loading_section").show();
		$("#graphs_section").hide();
		$("#tattoo_section").hide();

		$.post("/inkbox/tattoolist", function(data) {
			$("#tattoo_container").html(data);
			$("#loading_section").hide();
			$("#tattoo_section").show();
		});
	}
</script>
@endsection