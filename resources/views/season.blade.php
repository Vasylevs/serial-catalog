@extends('layouts.app')

@section('content')
    <div class="container-fluid season-page">
        <h1 class="text-center">{{$season->title}} |--| сериал {{$serial->title}}</h1>
        <div class="row">
            <div class="col-12 text-right mb-2 mt-2">
                <a class="btn btn-success" href="{{route('serial',$serial->id)}}" role="button">Назад</a>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/assets/img/{{$season->img}}" alt="Card image cap">
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="alert alert-dark">
                    <h3>Описание:</h3>
                    {{$season->short_desc}}
                </div>
                <div class="alert alert-dark mt-2">
                    <h3>Дата начала:</h3>
                    {{$season->date_start}}
                </div>
            </div>
        </div>
        <hr>
        <h3 class="text-center mt-2">Серии</h3>
        <div class="row mt-4">
            @forelse($serias as $seria)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{route('seria',$seria->id)}}">
                        <div class="card">
                            <img class="card-img-top" src="/assets/img/{{$seria->img}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{$seria->title}}</p>
                                <p class="card-text">дата выхода: {{$seria->date_start}}</p>
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
                    {{$serias->links()}}
                </ul>
            </div>
        </div>
    </div>
@endsection