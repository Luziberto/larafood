@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>
        Planos
        <a href="{{route('plans.create')}}" class="btn btn-primary">ADD <i class="fas fa-plus-square"></i></a>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item active" href="{{route('admin.index')}}">Planos</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
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
                    <th>Preço</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan->name}}</td>
                            <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{route('details.plan.index', [ 'plan' => $plan->id ])}}" class="btn btn-success">Detalhes</a>
                                <a href="{{route('plans.show', $plan->id)}}" class="btn btn-warning">Ver</a>
                                <a href="{{route('plans.edit', $plan->id)}}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop
