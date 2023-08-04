@extends('admin.layout.app')
@section('content')
    {{ Auth::user()->name }}
@endsection
