@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Редактирование сериала "{{$serial->title}}"@endslot
        @endcomponent
        <div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-success" href="{{route('admin.index')}}" role="button">К списку сериалов</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="serial" data-toggle="tab" href="#nav-serial" role="tab" aria-controls="nav-serial" aria-selected="true">Данные сериала</a>
                        <a class="nav-item nav-link" id="season" data-toggle="tab" href="#nav-season" role="tab" aria-controls="nav-season" aria-selected="false">Сезоны</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-serial" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <form action="{{route('admin.serial.update',$serial->id)}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="put">
                                        @csrf

                                        @include('admin.serial.partrials.form')
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-season" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-right mt-2">
                                    <a class="btn btn-success" href="{{route('admin.season.create')}}?serial_id={{$serial->id}}" role="button">Добавить сезон</a>
                                </div>
                                <div class="col-12 mt-2">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Лого</th>
                                            <th scope="col">Название</th>
                                            <th scope="col">Описание</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($seasons as $season)
                                            <tr>
                                                <th scope="row"><img style="width: 75px;" src="{{'/assets/img/'.$season->img}}" alt=""></th>
                                                <td><h3>{{$season->title}}</h3></td>
                                                <td>{{$season->short_desc}}</td>
                                                <td>
                                                    <a class="btn btn-primary mb-2" href="{{route('admin.season.edit',$season->id)}}" role="button">Редактировать</a>
                                                    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                                                          action="{{route('admin.season.destroy',$season->id)}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input class="btn btn-danger" type="submit" value="Удалить">
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr scope="row">
                                                <th colspan="4"><h2 class="text-center">Сезонов ещё нету</h2></th>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection