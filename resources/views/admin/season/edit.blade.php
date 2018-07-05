@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Редактирование {{$season->title}} для сериала {{$serial->title}}@endslot
        @endcomponent
        <div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-success" href="{{route('admin.serial.edit',$serial->id)}}" role="button">Назад</a>
            </div>
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-season-tab" data-toggle="tab" href="#nav-season" role="tab" aria-controls="nav-season" aria-selected="true">Данные сезона</a>
                        <a class="nav-item nav-link" id="nav-seria-tab" data-toggle="tab" href="#nav-seria" role="tab" aria-controls="nav-seria" aria-selected="false">Серии</a>
                    </div>
                </nav>
            </div>
            <div class="col-12 mt-2">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-season" role="tabpanel" aria-labelledby="nav-season-tab">
                        <form action="{{route('admin.season.update',$season->id)}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="put">
                            @csrf

                            @include('admin.season.partrials.form')
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-seria" role="tabpanel" aria-labelledby="nav-seria-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-right mt-2">
                                    <a class="btn btn-success" href="{{route('admin.serie.create')}}?season_id={{$season->id}}" role="button">Добавить серию</a>
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
                                        @forelse($serias as $seria)
                                            <tr>
                                                <th scope="row"><img style="width: 75px;" src="{{'/assets/img/'.$seria->img}}" alt=""></th>
                                                <td><h3>{{$seria->title}}</h3></td>
                                                <td>{{$seria->short_desc}}</td>
                                                <td>
                                                    <a class="btn btn-primary mb-2" href="{{route('admin.serie.edit',$seria->id)}}" role="button">Редактировать</a>
                                                    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                                                          action="{{route('admin.serie.destroy',$seria->id)}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input class="btn btn-danger" type="submit" value="Удалить">
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr scope="row">
                                                <th colspan="4"><h2 class="text-center">Серий ещё нету</h2></th>
                                            </tr>
                                        @endforelse
                                        <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <ul class="pagination">
                                                    {{$serias->links()}}
                                                </ul>
                                            </td>
                                        </tr>
                                        </tfoot>
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