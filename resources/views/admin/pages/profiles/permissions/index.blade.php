@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('profiles.index')}}">Perfis</a>
            <a class="breadcrumb-item active" href="{{route('profiles.permissions', $profile->id)}}">Permissões de {{$profile->name}}</a>
        </li>
    </ol>

    <h1>Lista de permissões {{ $profile->name }} <a href="{{route('profiles.permissions.available', $profile->id)}}" class="btn btn-primary">Adicionar Nova Permissão <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.permissions.search', $profile->id) }}" method="POST" class="form form-inline">
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
{{--                                <a href="{{route('profiles.show', $permission->id)}}" class="btn btn-primary">Ver</a>--}}
{{--                                <a href="{{route('profiles.edit', $permission->id)}}" class="btn btn-info">Editar</a>--}}
                                <form action="{{ route('profiles.permissions.detach', [ 'profile' => $profile->id, 'permission' => $permission->id ]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Desvincular <i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
{{--            @if (isset($filters))--}}
{{--                {!! $permissions->appends($filters)->links() !!}--}}
{{--            @else--}}
{{--                {!! $permissions->links() !!}--}}
{{--            @endif--}}
        </div>
    </div>
@stop
