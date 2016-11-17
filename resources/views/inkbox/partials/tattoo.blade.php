<div class="row">
@foreach($tattoo_array as $key => $tattoo)
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
		<div class="tattoo-div">
			<div class="row">
				<div class="col-xs-12">
					<h3 class="tattoo-header" title="{!! $tattoo['design_name'] !!}">{!! $tattoo['design_name'] !!}</h3>
				</div>
				<div class="col-xs-12">
					<div class="tattoo-img-container" style="background-image:url({!! $tattoo['preview_image'] !!});background-size: contain;background-repeat: no-repeat;background-position: center;"></div>
				</div>
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">
							<dl class="marginT10">
								<dt>Size:</dt>
								<dd>{!! $tattoo['width'] !!}&nbsp;<i class="fa fa-times" aria-hidden="true"></i>&nbsp;{!! $tattoo['height'] !!}</dd>
								<dt>Date Created:</dt>
								<dd>{!! $tattoo['date_created'] !!}</dd>
								<dt>Last Updated:</dt>
								<dd>{!! $tattoo['date_updated'] !!}</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
</div>