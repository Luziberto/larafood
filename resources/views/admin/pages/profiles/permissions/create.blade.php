@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('profiles.index')}}">Perfis</a>
            <a class="breadcrumb-item" href="{{route('profiles.permissions', $profile->id)}}">Permissões de {{$profile->name}}</a>
            <a class="breadcrumb-item active" href="{{route('profiles.permissions.available', $profile->id)}}">Cadastrar nova permissão</a>
        </li>
    </ol>
    <h1>Cadastrar Novo Permissão</h1>
@stop

@section('content')
@include('admin.includes.alerts')
<div class="card">
    <div class="card-header">
        <form action="{{ route('profiles.permissions.available.search', $profile->id) }}" method="POST" class="form form-inline">
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
                <form action="{{ route('profiles.permissions.attach', $profile->id) }}" class="form" method="POST">
                    @csrf
                    @foreach($permissions as $permission)
                        <tr>
                            <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"/></td>
                            <td>{{ $permission->name}}</td>
                            <td>{{ $permission->description }}</td>
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
