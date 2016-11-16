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

	<div class="row" id="graphs_container"></div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script type="text/javascript">
	$.post("/inkbox/userdata", function(data) {
		$("#graphs_container").append('<div class="col-xs-12 col-sm-6 col-md-3 graph-div" id="user_graph"><canvas id="user_data_chart" width="400" height="400"></canvas></div>');
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
					callbacks: {
					label: function(tooltipItem) {
							return tooltipItem.yLabel;
						}
					}
				}
			}
		});
		console.log("user_data", data);
	});
</script>
@endsection