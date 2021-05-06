@extends('layouts.LayoutsAdmin')

@section('title', 'Administrador')

@section('dashboard')
<section id="graficas">
    <div class="contenedor grid-2">
        <div class="card-graficas">
            <div id="chartdiv"></div>
        </div>
        <div class="card-graficas">
            <div id="chartdiv2"></div>
        </div>
    </div>
</section>
@endsection
@section('amcharts')
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="{{ asset('js/graficas.js') }}"></script>
@endsection