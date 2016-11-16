@extends('layout/main')
@section('title', 'Inkbox Analytics')

@section("content")

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12"><h1>test</h1></div>
		<div class="col-xs-12">
			<div class="well" id="user_graph"></div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/chart.js') }}"></script>

<script type="text/javascript">
	$.post("/inkbox/userdata", function(data) {
		$("#user_graph").html('<canvas id="user_data_chart" width="400" height="400"></canvas>');
		var ctx = document.getElementById("user_data_chart");
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: data['inverval_array'],
		        datasets: [{
		            label: '# of Votes',
		            data: data['count_array'],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255,99,132,1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
		console.log("user_data", data);
	});
</script>
@endsection