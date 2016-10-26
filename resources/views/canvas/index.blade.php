@extends('layout/main')
@section('title', 'Canvas Test')

@section('content')

<div class="container-fluid title-div">
	<div class="row title-container">
		<div class="col-xs-12 text-center">
			<div class="title">Canvas</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<canvas id="canvas" width="300" height="300"></canvas>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/fabric.min.js') }}"></script>

<script>
    var canvas = new fabric.Canvas('canvas');

    var rect = new fabric.Rect({
        top : 100,
        left : 100,
        width : 60,
        height : 70,
        fill : 'red'
    });

    canvas.add(rect);
</script>

@endsection