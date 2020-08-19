@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Listagem de eventos
                    <span>
                        <a class="btn btn-primary" href="{{ route('events.create') }}">
                            Criar Evento
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Recorrência</th>
                                <th>Ativo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->date->format('d/m/Y') }}</td>
                                    <td>{{ $event->recurrencyName }}</td>
                                    <td>{{ $event->active ? 'Sim' : 'Não' }}</td>
                                    <td class="d-flex flex-direction-row justify-content-around">
                                        <a class="btn btn-sm btn-info" href="{{ route('events.edit', $event->id) }}">
                                            Editar
                                        </a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger">
                                                Deletar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
