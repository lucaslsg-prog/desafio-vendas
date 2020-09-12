@extends('adminlte::page')

@section('title', 'Fabricante')

@section('content_header')
    <h1>Fabricantes</h1>
@stop

@section('content')
    {!! $dataTable->table() !!}
@stop

@section('css')
    
@stop

@section('js')
    {!! $dataTable->scripts() !!}
@stop