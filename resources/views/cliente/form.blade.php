@extends('adminlte::page')

@section('title', 'Formulário de Clientes')

@section('content_header')
    <h1>Formulário do Cliente</h1>
@stop

@section('content')
{{--
    Para trabalhar com formulário de maneira mais simples e orientado a objetos, 
    vamos utilizar um pacote chamado Laravel Collective, segue o link:
    https://laravelcollective.com/docs/6.0/html
    Para trabalhar com as mensagens de feedback (sucesso, erro etc), 
    vamos utilizar um pacote chamado Flash, segue o link:
    https://github.com/laracasts/flash
    (Obs: ambos os pacotes só precisa instalar, não necessita de configurações)
--}}

    @include('flash::message')

    <div class="card card-primary">
        @if (isset($cliente))
            {!! Form::model($cliente, ['url' => route('fabricantes.update', $fabricante), 'method' => 'put']) !!}
        @else
            {!! Form::open(['url' => route('fabricantes.store')]) !!}
        @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                    @error('nome')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('site', 'Site') !!}
                    {!! Form::text('site', null, ['class' => 'form-control']) !!}
                    @error('site')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop