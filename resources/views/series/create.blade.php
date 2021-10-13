@extends('layout')

@section('header-title')
  Adicionar Série
@endsection

@section('content')
<form method="post">
    @csrf
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif
        
    <div class="row">
      <div class="col col-8">
        <label for="serieName" class="label">Nome da Série:</label>
        <input type="text" name="serieName" class="form-control">
      </div>

      <div class="col col-2">
        <label for="serieName" class="label">Temporadas:</label>
        <input type="text" name="qtdSeasons" class="form-control">
      </div>

      <div class="col col-2">
        <label for="serieName" class="label">Ep's por temporada:</label>
        <input type="text" name="qtdChapters" class="form-control">
      </div>
    </div>
  

    <button class="btn btn-success mt-3">Adicionar</button>
  </form>

@endsection
  