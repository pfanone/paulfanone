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
	var graph_size = "col-xs-12 col-sm-4 col-md-3 col-lg-2";

	$.post("/inkbox/userdata", function(data) {
		$("#graph_container").append('<div class="' + graph_size + '"><div id="user_graph" class="graph-div graph-div-full"></div></div>');

		$("#user_graph").append('<canvas id="user_data_chart" width="400" height="400"></canvas>');

		var ctx = document.getElementById("user_data_chart");
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: data['interval_array'],
				datasets: [{
					data: data['count_array'],
					backgroundColor: [
						'rgba(54, 162, 235, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
						'rgba(54, 162, 235, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				legend: {
					display: false
				},
				tooltips: {
					enabled: false
				},
				scales: {
					xAxes: [{
								gridLines: {
									display:false
								}
							}],
					yAxes: [{
								gridLines: {
									display:false
								}
							}]
				}
			}
		});

		$("#graph_container").append('<div class="' + graph_size + '">\
			<div class="graph-div graph-div-half">\
				<h4>Users Today</h4>\
				<h2>' + data['user_data_array']['Day']['count'] + '</h2>\
			</div>\
		</div>');
		$("#graph_container").append('<div class="' + graph_size + '">\
			<div class="graph-div graph-div-half">\
				<h4>Users This Week</h4>\
				<h2>' + data['user_data_array']['Week']['count'] + '</h2>\
			</div>\
		</div>');
		$("#graph_container").append('<div class="' + graph_size + '">\
			<div class="graph-div graph-div-half">\
				<h4>Users This Month</h4>\
				<h2>' + data['user_data_array']['Month']['count'] + '</h2>\
			</div>\
		</div>');
	});

	$.post("/inkbox/tattoodata", function(data) {
		$("#graph_container").append('<div class="' + graph_size + '"><div id="tattoo_graph" class="graph-div graph-div-full"></div></div>');

		$("#tattoo_graph").append('<canvas id="tattoo_data_chart" width="400" height="400"></canvas>');

		var ctx = document.getElementById("tattoo_data_chart");
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: data['interval_array'],
				datasets: [{
					data: data['count_array'],
					backgroundColor: [
						'rgba(54, 162, 235, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
						'rgba(54, 162, 235, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				legend: {
					display: false
				},
				tooltips: {
					enabled: false
				},
				scales: {
					xAxes: [{
								gridLines: {
									display:false
								}
							}],
					yAxes: [{
								gridLines: {
									display:false
								}
							}]
				}
			}
		});

		$("#graph_container").append('<div class="' + graph_size + '">\
			<div class="graph-div graph-div-half">\
				<h4>Tattoos Today</h4>\
				<h2>' + data['tattoo_data_array']['Day']['count'] + '</h2>\
			</div>\
		</div>');
		$("#graph_container").append('<div class="' + graph_size + '">\
			<div class="graph-div graph-div-half">\
				<h4>Tattoos This Week</h4>\
				<h2>' + data['tattoo_data_array']['Week']['count'] + '</h2>\
			</div>\
		</div>');
		$("#graph_container").append('<div class="' + graph_size + '">\
			<div class="graph-div graph-div-half">\
				<h4>Tattoos This Month</h4>\
				<h2>' + data['tattoo_data_array']['Month']['count'] + '</h2>\
			</div>\
		</div>');
	});
</script>
@endsection