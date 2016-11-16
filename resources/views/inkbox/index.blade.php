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

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-3" id="user_graph"></div>
	</div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script type="text/javascript">
	$.post("/inkbox/userdata", function(data) {
		$("#user_graph").append('<div class="row graph-div">');
		$("#user_graph").append('<div class="col-xs-12">');

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
		$("#user_graph").append('</div>');

		$("#user_graph").append('<div class="col-xs-12">\
			<h4>Users Today</h4>\
			<p>' + data['user_data_array']['Day']['count'] + '</p>\
		</div>');

		
		$("#user_graph").append('</div>');
	});
</script>
@endsection