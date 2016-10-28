@extends('layout/main')
@section('title', 'Paul Fanone')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/parallax.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}" />

<div id="preload">
	<img src="{{ URL::asset('images/bcg_slide-1.jpg') }}">
	<img src="{{ URL::asset('images/bcg_slide-2.jpg') }}">
	<img src="{{ URL::asset('images/bcg_slide-3.jpg') }}">
	<img src="{{ URL::asset('images/bcg_slide-4.jpg') }}">
</div>
	
<main>
	 
	<section id="slide-1" class="homeSlide">
		<div class="bcg">
			<div class="hsContainer">
				<div class="hsContent">
					<h2>Simple parallax scrolling is...</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="slide-2" class="homeSlide">
		<div class="bcg">
			<div class="hsContainer">
				<div class="hsContent">
					<h2>great for story telling websites.</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="slide-3" class="homeSlide">
		<div class="bcg">
			<div class="hsContainer">
				<div class="hsContent">
					<h2>Now go and create your own story</h2>
				</div>
			</div>
			
		</div>
	</section>
	
	<section id="slide-4" class="homeSlide">
		<div class="bcg">
			<div class="hsContainer">
				<div class="hsContent">
					<h2>and share mine.</h2>
				</div>
			</div>
			
		</div>
	</section>
	
</main>


<script type="text/javascript" src="{{ URL::asset('js/skrollr.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/imagesloaded.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/_main.js') }}"></script>

<script type="text/javascript">
// Init Skrollr
var s = skrollr.init();
 
// Refresh Skrollr after resizing our sections
s.refresh($('.homeSlide'));
</script>

@endsection