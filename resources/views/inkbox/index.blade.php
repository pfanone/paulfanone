@extends('layout/main')
@section('title', 'Inkbox Analytics')

@section("content")

<div class="row">
	<div class="col-xs-12"><h1>test</h1></div>
	<div class="col-xs-12">
		{{ json_encode($designs) }}
	</div>
</div>

@endsection