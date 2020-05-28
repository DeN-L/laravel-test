@extends('layouts.app')

@section('title', 'Current time')

@section('content')
    <h2><b>Current timestamp:</b> {{ \App\Facades\TimeService::getTime() }}</h2>
@endsection
