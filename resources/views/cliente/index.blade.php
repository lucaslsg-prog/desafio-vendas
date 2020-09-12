@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    {!! $dataTable->table() !!}
@stop

@section('css')
    
@stop

@section('js')
    {!! $dataTable->scripts() !!}
@stop