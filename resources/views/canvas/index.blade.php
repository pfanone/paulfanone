@extends('layout/main')
@section('title', 'Canvas Test')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 text-center">
			<h2>Canvas</h2>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<canvas id="canvas" width="100%" height="600"></canvas>
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