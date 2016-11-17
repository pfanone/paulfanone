<div class="row">
@foreach($tattoo_array as $key => $tattoo)
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="graph-div">
			{!! $tattoo['design_name'] !!}
		</div>
	</div>
@endforeach
</div>