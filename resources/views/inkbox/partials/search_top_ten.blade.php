<div class="col-xs-12">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<div id="search_graph" class="graph-div graph-div-full">
				<canvas id="search_data_chart" width="400" height="400"></canvas>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="graph-div graph-div-full">
				<h4>Top Ten Tattoo Searches</h4>
				<ol>
				@foreach($search_array as $key => $value)
					<li>{!! $value['query'] !!}<span class="badge">{!! $value['count'] !!}</span></li>
				@endforeach
				</ol>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var ctx = document.getElementById("search_data_chart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: {!! json_encode($query_array) !!},
			datasets: [{
				data: {!! json_encode($count_array) !!},
				borderWidth: 1
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Top Ten Tattoo Searches by Count'
			},
			legend: {
				display: false
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
							},
							ticks: {
								beginAtZero: true
							}
						}]
			}
		}
	});
</script>