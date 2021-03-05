@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('plans.index')}}">Planos</a>
            <a class="breadcrumb-item active" href="{{route('details.plan.index', $plan->id)}}">Detalhes de {{$plan->name}}</a>
        </li>
    </ol>

    <h1>Detalhes do plano {{ $plan->name }} <a href="{{route('details.plan.create', $plan->id)}}" class="btn btn-primary">ADD <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">
            <table class="table table-condesed">
                <thead>
                <th>Nome</th>
                <th width="250">Ações</th>
                </thead>
                <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{ $detail->name}}</td>
                        <td>
                            <a href="{{route('details.plan.show', [ 'plan' => $plan->id, 'detail' => $detail->id ])}}" class="btn btn-success">Ver</a>
                            <a href="{{route('details.plan.edit', [ 'plan' => $plan->id, 'detail' => $detail->id ])}}" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
        </div>
    </div>
@stop
