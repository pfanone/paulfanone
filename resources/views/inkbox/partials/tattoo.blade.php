<div class="row">
@foreach($tattoo_array as $key => $tattoo)
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="tattoo-div">
			<div class="row">
				<div class="col-xs-12">
					<h2>{!! $tattoo['design_name'] !!}</h2>
				</div>
				<div class="col-xs-12 tattoo-img-container">
					<img class="tattoo-img" src="{!! $tattoo['preview_image'] !!}">
				</div>
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<p>{!! $tattoo['width'] !!}&nbsp;<i class="fa fa-times" aria-hidden="true"></i>&nbsp;{!! $tattoo['height'] !!}</p>
						</div>
						<div class="col-xs-12">
							<p>Status: @if ($tattoo['deleted'] == 1)
							Deleted
							@else
							Active
							@endif
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
</div>