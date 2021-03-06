@extends('adminlte::page')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('profiles.index')}}">Perfis</a>
            <a class="breadcrumb-item" href="{{route('profiles.show', $profile->id)}}">{{$profile->name}}</a>
        </li>
    </ol>
    <h1>Detalhes do plano <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $profile->description }}
                </li>
            </ul>
            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar <i class="far fa-trash-alt"></i></button>
            </form>
{{--            <div class="form-group">--}}
{{--                <label for="name">Nome: </label>--}}
{{--                <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$profile->name}}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="price">Preço: </label>--}}
{{--                <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{$profile->price}}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="description">Descrição: </label>--}}
{{--                <input type="text" name="description" class="form-control" id="description" placeholder="Descrição:" value="{{$profile->description}}">--}}
{{--            </div>--}}
        </div>
    </div>
@stop
