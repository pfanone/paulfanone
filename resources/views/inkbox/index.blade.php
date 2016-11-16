@extends('layout/main')
@section('title', 'Inkbox Analytics')

@section("content")

<link rel="stylesheet" href="{{ URL::asset('css/inkbox.css') }}" />

<div class="container-fluid">
	<div class="row main-bg">
		<div class="col-xs-12 main-header">
			<h1 class="padL15">Inkbox Analytics</h1>
		</div>
	</div>

	<div class="row marginT10" id="user_graph_container"></div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script type="text/javascript">
	$.post("/inkbox/userdata", function(data) {
		$("#user_graph_container").append('<div class="col-xs-12 col-sm-4 col-md-3"><div id="user_graph" class="graph-div"></div></div>');

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

		$("#user_graph_container").append('<div class="col-xs-12 col-sm-2">\
			<div class="graph-div">\
				<h4>Users Today</h4>\
				<p>' + data['user_data_array']['Day']['count'] + '</p>\
			</div>\
		</div>');
		$("#user_graph_container").append('<div class="col-xs-12 col-sm-2">\
			<div class="graph-div">\
				<h4>Users Today</h4>\
				<p>' + data['user_data_array']['Week']['count'] + '</p>\
			</div>\
		</div>');
		$("#user_graph_container").append('<div class="col-xs-12 col-sm-2">\
			<div class="graph-div">\
				<h4>Users Today</h4>\
				<p>' + data['user_data_array']['Month']['count'] + '</p>\
			</div>\
		</div>');
	});
</script>
@endsection