<div class="col-xs-12">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
			<div id="user_tattoo_graph" class="graph-div graph-div-full">
				<canvas id="user_tattoo_data_chart" width="400" height="400"></canvas>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-lg-5">
			<div class="graph-div graph-div-half">
				<h4>Users All Time</h4>
				<h2>{!! $user_tattoo_data_array['All'] !!}</h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-lg-5">
			<div class="graph-div graph-div-half">
				<h4>Users Today</h4>
				<h2>{!! $user_tattoo_data_array['Day'] !!}</h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-lg-5">
			<div class="graph-div graph-div-half">
				<h4>Users This Week</h4>
				<h2>{!! $user_tattoo_data_array['Week'] !!}</h2>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-lg-5">
			<div class="graph-div graph-div-half">
				<h4>Users This Month</h4>
				<h2>{!! $user_tattoo_data_array['Month'] !!}</h2>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var ctx = document.getElementById("user_tattoo_data_chart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: {!! json_encode($interval_array) !!},
			datasets: [{
				label: "Tattoos Per User by Date",
				data: {!! json_encode($count_array) !!},
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
</script>