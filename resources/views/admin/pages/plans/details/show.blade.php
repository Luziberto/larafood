@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('plans.index')}}">Planos</a>
            <a class="breadcrumb-item" href="{{route('details.plan.index', $plan->id)}}">{{$plan->name}}</a>
            <a class="breadcrumb-item active" href="{{route('details.plan.show', [ 'plan' => $plan->id, 'detail' => $detail->id ])}}">Detalhes</a>
        </li>
    </ol>
    <h1>Exibição dos detalhes do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Descrição: </strong> {{ $detail->name }}
                </li>
            </ul>
            <form action="{{ route('details.plan.destroy', [ 'plan' => $plan->id, 'detail' => $detail->id ]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar detalhe {{ $detail->name }} do plano {{ $plan->name }} <i class="far fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
@stop
