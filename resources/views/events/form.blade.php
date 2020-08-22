@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Formulário Evento
                    <span>
                        <a class="btn btn-info" href="{{ route('events.index') }}">
                            Voltar
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    @if(isset($event))
                    <form action="{{ route('events.update', $event->id) }}" method="POST">
                        @method('put')
                    @else
                    <form action="{{ route('events.store') }}" method="POST">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="event-name">Nome Evento</label>
                                    <input type="text" name="name" value="{{ isset($event) ? $event->name : '' }}"  class="form-control" placeholder="Digite um nome para o evento">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="event-description">Descrição</label>
                                    <textarea name="description" class="form-control">{{ isset($event) ? $event->description : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="event-date">Data do evento</label>
                                    <input type="date" name="date" class="form-control" value="{{ isset($event) ? $event->date->format('Y-m-d') : '' }}"> 
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="event-recurrency">Recorrência</label>
                                    <select name="recurrency" class="form-control">
                                        @foreach($recurrencies as $recurrencyKey => $recurrencyName)
                                            <option value="{{$recurrencyKey}}" selected="{{ (isset($event)) && $recurrencyKey == $event->recurrency ? true : false }}">
                                                {{$recurrencyName}}
                                            </option>
                                        @endforeach()
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="event-active">Ativo</label>
                                    <select name="active" class="form-control">
                                        <option value="1" {{ (isset($event) && $event->active == 1) ? 'selected' : '' }}>Sim</option>
                                        <option value="0" {{ (isset($event) && $event->active == 0) ? 'selected' : '' }}>Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>                          
            </div>
        </div>
    </div>
</div>
@endsection
