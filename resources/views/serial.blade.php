@extends('layouts.app')

@section('content')
    <div class="container-fluid serial-page">
        <h1  class="text-center">{{$serial->title}}</h1>
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/assets/img/{{$serial->img}}" alt="Card image cap">
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="alert alert-dark">
                    <h3>Описание:</h3>
                    {{$serial->all_desc}}
                </div>
                <div class="alert alert-dark mt-2">
                    <h3>Режисеры:</h3>
                    {{$serial->director}}
                </div>
                <div class="alert alert-dark mt-2">
                    <h3>Актеры:</h3>
                    {{$serial->director}}
                </div>
                <div class="alert alert-dark mt-2">
                    <h3>Дата начала:</h3>
                    {{$serial->date_start}}
                </div>
            </div>
        </div>
        <hr>
        <h3 class="text-center mt-2">Сезоны</h3>
        <div class="row mt-4">
            @forelse($seasons as $season)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{route('season',$season->id)}}">
                        <div class="card">
                            <img class="card-img-top" src="/assets/img/{{$season->img}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{$season->title}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="alert alert-warning" role="alert">
                    Сезонов ещё нету
                </div>
            @endforelse
            <div class="col-12 mt-2">
                <ul class="pagination">
                    {{$seasons->links()}}
                </ul>
            </div>
        </div>
    </div>
@endsection