@extends('layout/main')
@section('title', 'Paul Fanone')

@section('content')

<div class="container-fluid title-div">
	<div class="row title-container">
		<div class="col-xs-12 text-center">
			<div class="title">Paul Fanone</div>
		</div>
	</div>
</div>

<div class="container-fluid padT50 padB50">
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-sm-offset-1 col-lg-2 col-lg-offset-2 text-center">
			<h2 class="about">About Paul</h2>
		</div>
		<div class="col-xs-12 col-sm-7 col-lg-6">
			<p class="about">I'm an adaptable programmer that can create specialized solutions to meet any requirement.</p>
			<p class="about">Experienced in many languages including PHP, Javascript, MySQL, HTML, and CSS. I'm also open to learning new languages as needed.</p>
		</div>
	</div>
</div>

<div class="container-fluid blue-bg padT50 padB50">
	<div class="row">
		<div class="col-xs-12 col-sm-3 col-sm-offset-1 col-lg-2 col-lg-offset-2 text-center">
			<h2 class="about">Experience</h2>
		</div>
		<div class="col-xs-12 col-sm-7 col-lg-6">
			<div class="exp_container row">
				<div class="col-xs-6">
					<p class="header">WhoPlusYou.com</p>
				</div>
				<div class="col-xs-6">
					<p class="header">5 years</p>
				</div>
				<div class="col-xs-16">
					<p class="desc">Web Developer</p>
				</div>
			</div>
			<div class="exp_container">
				<p class="header">Ryerson University</p>
				<p class="desc">Computer Science</p>
			</div>
		</div>
	</div>
</div>

@endsection