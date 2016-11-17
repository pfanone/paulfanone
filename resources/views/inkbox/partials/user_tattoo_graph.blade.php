<div class="col-xs-12">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
			<div id="user_tattoo_graph" class="graph-div graph-div-full">
				<canvas id="user_tattoo_data_chart" width="400" height="300"></canvas>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4">
			<div class="graph-div graph-div-half">
				<h4>Tattoos Per User Average</h4>
				<h2 class="graph-numbers">{!! $tattoo_user !!}</h2>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var ctx = document.getElementById("user_tattoo_data_chart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: {!! json_encode($label_array) !!},
			datasets: [{
				label: "Tattoos Created By User",
				data: {!! json_encode($count_array) !!},
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				xAxes: [{
							gridLines: {
								display:false
							},
							scaleLabel: {
								display: true,
								labelString: '# of Designs Created'
							}
						}],
				yAxes: [{
							gridLines: {
								display:false
							},
							scaleLabel: {
								display: true,
								labelString: 'Users with that many'
							}
						}]
			}
		}
	});
</script>