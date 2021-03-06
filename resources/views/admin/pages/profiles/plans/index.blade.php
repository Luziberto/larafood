@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('profiles.index')}}">Perfis</a>
            <a class="breadcrumb-item active" href="{{route('profiles.plans', $profile->id)}}">Planos de {{$profile->name}}</a>
        </li>
    </ol>

    <h1>Lista de planos {{ $profile->name }} <a href="{{route('profiles.plans.available', $profile->id)}}" class="btn btn-primary">Adicionar Nova Plano <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.plans.search', $profile->id) }}" method="POST" class="form form-inline">
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
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan->name}}</td>
                            <td>{{ $plan->description }}</td>
                            <td class="text-right">
{{--                                <a href="{{route('profiles.show', $plan->id)}}" class="btn btn-primary">Ver</a>--}}
{{--                                <a href="{{route('profiles.edit', $plan->id)}}" class="btn btn-info">Editar</a>--}}
                                <form action="{{ route('profiles.plans.detach', [ 'profile' => $profile->id, 'plan' => $plan->id ]) }}" method="POST">
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
{{--                {!! $plans->appends($filters)->links() !!}--}}
{{--            @else--}}
{{--                {!! $plans->links() !!}--}}
{{--            @endif--}}
        </div>
    </div>
@stop
