@extends('admin.layouts.base')

@section('title', 'Dashboard')


@section('content')
    <h3>Welcome {{ Auth::user()->name }}</h3>
@endsection
