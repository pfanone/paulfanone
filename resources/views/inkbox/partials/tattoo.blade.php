<div class="row">
@foreach($tattoo_array as $key => $tattoo)
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="tattoo-div">
			<div class="row">
				<div class="col-xs-12">
					<h3 class="tattoo-header">{!! $tattoo['design_name'] !!}</h3>
				</div>
				<div class="col-xs-12">
					<div class="tattoo-img-container" style="background-image:url({!! $tattoo['preview_image'] !!});background-size: contain;background-repeat: no-repeat;"></div>
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