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
			<div class="exp_container">
				<p class="header">Web Developer - WhoPlusYou.com</p>
				<p class="desc">Worked to build the platform front-end and back-end, using PHP, MySQL and Javascript. Took part in designing and building many main features, as well as taking part in managing projects.</p>
			</div>
			<div class="exp_container">
				<p class="header">Computer Science - Ryerson University</p>
				<p class="desc">Studied Computer Science, learning the core aspects of computer programming, indlucing Object-Oriented, Artificial Intelligence, Computer Graphics, Robotics, and others.</p>
			</div>
		</div>
	</div>
</div>

@endsection