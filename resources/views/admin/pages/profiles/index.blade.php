@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>
        Perfis
        <a href="{{route('profiles.create')}}" class="btn btn-primary">ADD <i class="fas fa-plus-square"></i></a>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item active" href="{{route('profiles.index')}}">Perfis</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
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
                    <th width="270px" class="text-center">Ações</th>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name}}</td>
                            <td>{{ $profile->description }}</td>
                            <td class="text-right">
                                <a href="{{route('profiles.show', $profile->id)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-info">Editar</a>
                                <a href="{{route('profiles.permissions', $profile->id)}}" class="btn btn-success">Permissões <icon class="fas fa-lock"></icon></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
