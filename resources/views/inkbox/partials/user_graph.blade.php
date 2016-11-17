<div class="col-xs-12">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="graph-div graph-div-half">
				<h4>Users Today</h4>
				<h2 class="graph-numbers">{!! $user_data_array['Day']['count'] !!}<span class="pull-right">{!! $count_difference['Day'] !!}</span></h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6">
			<div class="graph-div graph-div-half">
				<h4>Users This Week</h4>
				<h2 class="graph-numbers">{!! $user_data_array['Week']['count'] !!}<span class="pull-right">{!! $count_difference['Week'] !!}</span></h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6">
			<div class="graph-div graph-div-half">
				<h4>Users This Month</h4>
				<h2 class="graph-numbers">{!! $user_data_array['Month']['count'] !!}<span class="pull-right">{!! $count_difference['Month'] !!}</span></h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6">
			<div class="graph-div graph-div-half">
				<h4>Users All Time</h4>
				<h2 class="graph-numbers">{!! $user_data_array['All']['count'] !!}</h2>
			</div>
		</div>

		<div class="col-xs-12">
			<div id="user_graph" class="graph-div graph-div-full">
				<canvas id="user_data_chart" width="300" height="400"></canvas>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var ctx = document.getElementById("user_data_chart");
	var myChart = new Chart(ctx, {
		type: 'horizontalBar',
		data: {
			labels: {!! json_encode($interval_array) !!},
			datasets: [{
				data: {!! json_encode($count_array) !!},
				borderWidth: 1
			}]
		},
		options: {
			title: {
				display: true,
				text: 'User Logins by Date'
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