@extends('pengelola.layouts.app')

@section('content')
    <h1>Dashboard Pengelola</h1>
    <p>Selamat datang, {{ auth()->user()->name }}!</p>
@endsection
