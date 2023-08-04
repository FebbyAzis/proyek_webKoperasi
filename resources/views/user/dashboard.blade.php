@extends('user.layout.app')
@section('content')
    {{ Auth::user()->name }}
@endsection