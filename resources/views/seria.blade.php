@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($seria))
            <h2 class="text-center">{{$seria->title}}</h2>
            <div class="row">
                <div class="col-12 text-right mb-2 mt-2">
                    <a class="btn btn-success" href="{{route('season',$seria->season_id)}}" role="button">Назад</a>
                </div>
                <div class="col-12">
                    <video width="100%" height="auto" controls="controls" poster="/assets/img/{{$seria->img}}">
                        <source src="/assets/video/{{$seria->video}}">
                        Элемент video не поддерживается вашим браузером.
                    </video>
                </div>
                <div class="col-12">
                    <div class="alert alert-dark mt-2">
                        <h3>Описание:</h3>
                        {{$seria->short_desc}}
                    </div>
                    <div class="alert alert-dark mt-2">
                        <h3>Дата начала:</h3>
                        {{$seria->date_start}}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection