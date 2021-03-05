@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li>
            <a class="breadcrumb-item" href="{{route('admin.index')}}">Dashboard</a>
            <a class="breadcrumb-item" href="{{route('plans.index')}}">Planos</a>
            <a class="breadcrumb-item" href="{{route('plans.show', $plan->id)}}">{{$plan->name}}</a>
        </li>
    </ol>
    <h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plan->name }}
                </li>
                <li>
                    <strong>url: </strong> {{ $plan->url }}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plan->description }}
                </li>
            </ul>
            <form action="{{ route('plans.destroy', $plan->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar <i class="far fa-trash-alt"></i></button>
            </form>
{{--            <div class="form-group">--}}
{{--                <label for="name">Nome: </label>--}}
{{--                <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$plan->name}}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="price">Preço: </label>--}}
{{--                <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{$plan->price}}">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="description">Descrição: </label>--}}
{{--                <input type="text" name="description" class="form-control" id="description" placeholder="Descrição:" value="{{$plan->description}}">--}}
{{--            </div>--}}
        </div>
    </div>
@stop
