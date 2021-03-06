@extends('adminlte::page')

@section('title', "Detalhes da permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('permissions.index')}}">Permissões</a>
            <a class="breadcrumb-item" href="{{route('permissions.show', $permission->id)}}">{{$permission->name}}</a>
        </li>
    </ol>
    <h1>Detalhes do plano <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $permission->description }}
                </li>
            </ul>
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar <i class="far fa-trash-alt"></i></button>
            </form>
{{--            <div class="form-group">--}}
{{--                <label for="name">Nome: </label>--}}
{{--                <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$permission->name}}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="price">Preço: </label>--}}
{{--                <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{$permission->price}}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="description">Descrição: </label>--}}
{{--                <input type="text" name="description" class="form-control" id="description" placeholder="Descrição:" value="{{$permission->description}}">--}}
{{--            </div>--}}
        </div>
    </div>
@stop
