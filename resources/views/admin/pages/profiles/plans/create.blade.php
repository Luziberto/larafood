@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('profiles.index')}}">Perfis</a>
            <a class="breadcrumb-item" href="{{route('profiles.plans', $profile->id)}}">Planos de {{$profile->name}}</a>
            <a class="breadcrumb-item active" href="{{route('profiles.plans.available', $profile->id)}}">Cadastrar novo plano</a>
        </li>
    </ol>
    <h1>Cadastrar Novo Plano</h1>
@stop

@section('content')
@include('admin.includes.alerts')
<div class="card">
    <div class="card-header">
        <form action="{{ route('profiles.plans.available.search', $profile->id) }}" method="POST" class="form form-inline">
            @csrf
            <div class="row">
                <input type="text" name="filter" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-sm btn-primary">Filtrar</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condesed">
            <thead>
                <th>Ativo</th>
                <th>Nome</th>
                <th>Descrição</th>
                {{--        <th width="230px" class="text-center">Ações</th>--}}
            </thead>
            <tbody>
                <form action="{{ route('profiles.plans.attach', $profile->id) }}" class="form" method="POST">
                    @csrf
                    @foreach($plans as $plan)
                        <tr>
                            <td><input type="checkbox" name="plans[]" value="{{ $plan->id }}"/></td>
                            <td>{{ $plan->name}}</td>
                            <td>{{ $plan->description }}</td>
                        <tr>
                    @endforeach
                    <tr>
                        <td colspan="100%">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>

@stop
