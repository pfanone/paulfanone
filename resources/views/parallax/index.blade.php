@extends('layout/main')
@section('title', 'Paul Fanone')

@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/parallax.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}" />

<div id="preload">
	<img src="{{ URL::asset('images/bcg_slide-1.jpg') }}">
</div>
	
<main>
	 
	<section id="slide-1" class="homeSlide">
		<div class="bcg">
			<div class="hsContainer">
				<div class="hsContent">
					<h2>Paul Fanone</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="slide-2" class="homeSlide">
		<div class="bcg">
			<div class="hsContainer">
				<div class="hsContent">
					<div class="row">
						<div class="col-xs-12 text-center">
							<h2 class="about">About Paul</h2>
						</div>
						<div class="col-xs-12">
							<p class="about">I'm an adaptable programmer that can create specialized solutions to meet any requirement.</p>
							<p class="about">Experienced in many languages including PHP, Javascript, MySQL, HTML, and CSS. I'm also open to learning new languages as needed.</p>
							<p class="about">I'm a nerd who likes sports just as much as I like Star Wars &amp; Dr. Who. Having fun with the people I work with is as important to me as building cool, interesting websites that are easy for people to use.</p>
						</div>
					</div>
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