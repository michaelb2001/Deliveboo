@extends('layouts.navbar_admin')

@section('content')
<div class="statistics">
    <canvas id="myChart"></canvas>
</div>
@endsection

<style>
    .statistics{
        width: 60%;
        margin: 0 auto;
    }
</style>