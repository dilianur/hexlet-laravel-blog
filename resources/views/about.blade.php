@extends('layouts.app')

@section('title', 'О блоге')

@section('content')
<h1>о блоге</h1>
<p>Эксперименты с Laravel на Хекслете</p>
@foreach ($team as $value)
{{ $value['name'] }}
{{ $value['position'] }}
@endforeach
@endsection
