@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>
        Permissões
        <a href="{{route('permissions.create')}}" class="btn btn-primary">ADD <i class="fas fa-plus-square"></i></a>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item active" href="{{route('permissions.index')}}">Permissões</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
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
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="230px" class="text-center">Ações</th>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name}}</td>
                            <td>{{ $permission->description }}</td>
                            <td class="text-right">
                                <a href="{{route('permissions.show', $permission->id)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
