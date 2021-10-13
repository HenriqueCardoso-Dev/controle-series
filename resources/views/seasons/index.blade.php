@extends('layout')

@section('header-title')
  Temporadas de {{$serie->name}}
@endsection

@section('content')

  @foreach($seasons as $season)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Temporada {{$season->season_number}} 
    </li>
  @endforeach
@endsection