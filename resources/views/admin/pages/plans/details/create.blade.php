@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Cadastrar Novo Detalhe</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.store', $plan->id) }}" class="form" method="POST">
                @csrf
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@stop
