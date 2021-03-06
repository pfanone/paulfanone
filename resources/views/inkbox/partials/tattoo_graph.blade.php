<div class="col-xs-12">
	<div class="row">
		<div class="col-xs-12">
			<h3 class="marginT0 marginB0">Tattoos Created</h3>
		</div>
		<div class="col-xs-12 col-sm-4">
			<div id="tattoo_graph" class="graph-div graph-div-full">
				<canvas id="tattoo_data_chart" width="400" height="400"></canvas>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="graph-div graph-div-half">
				<h4>Tattoos Created Today</h4>
				<h2 class="graph-numbers">{!! $tattoo_data_array['Day']['count'] !!}<span class="pull-right">{!! $count_difference['Day'] !!}</span></h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="graph-div graph-div-half">
				<h4>Tattoos Created This Week</h4>
				<h2 class="graph-numbers">{!! $tattoo_data_array['Week']['count'] !!}<span class="pull-right">{!! $count_difference['Week'] !!}</span></h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="graph-div graph-div-half">
				<h4>Tattoos Created This Month</h4>
				<h2 class="graph-numbers">{!! $tattoo_data_array['Month']['count'] !!}<span class="pull-right">{!! $count_difference['Month'] !!}</span></h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="graph-div graph-div-half">
				<h4>Tattoos Created All Time</h4>
				<h2 class="graph-numbers">{!! $tattoo_data_array['All']['count'] !!}</h2>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var ctx = document.getElementById("tattoo_data_chart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: {!! json_encode($interval_array) !!},
			datasets: [{
				data: {!! json_encode($count_array) !!},
				borderWidth: 1
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Tattoo Designs by Date'
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