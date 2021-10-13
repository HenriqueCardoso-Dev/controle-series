@extends('layout')

@section('header-title')
  Séries Recomendadas
@endsection

@section('content')

  @if (!empty($responses["successResponse"]))
    <div class="alert alert-success" role="alert">
      {{$responses["successResponse"]}}
    </div>
  @endif

  @if (!empty($responses["errorResponse"]))
    <div class="alert alert-success" role="alert">
      {{$responses["errorResponse"]}}
    </div>
  @endif

  <hr>
  
  <div class="d-flex justify-content-end align-items-center">
    <a href="{{route('series.create')}}" class="btn btn-dark mb-3">
      Adicionar Nova Série
    </a>
  </div>

  <ul class="list-group">
    @foreach($series as $serie)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        {{$serie->name}} 

        <div class="d-flex">
          <a href="{{route('serie.index', [$serie->id])}}" class="btn btn-info me-1">
            <i class="fas fa-external-link-alt"></i>
          </a>

          <form 
            action="{{route('series.delete', [$serie->id])}}" 
            method="post" 
            onsubmit="return confirm('Tem certeza que deseja excluir {{addslashes($serie->name)}} da sua lista de séries?')"
          >
            @csrf
            @method('DELETE')
            
            <button class="btn btn-danger">
              <i class="far fa-trash-alt"></i>
            </button>
          </form>
        </div>
      </li>
    @endforeach

    @if(count($series) == 0)
      <li class="list-group-item d-flex justify-content-center align-items-center py-5">
        <strong>Você ainda não possue séries cadastradas!</strong>
      </li>
    @endif
  </ul>

@endsection

