@extends('layouts.main')

@section('content')
    @include('inc.message')
    <x-rooms.search :guests=$guests />
@endsection
