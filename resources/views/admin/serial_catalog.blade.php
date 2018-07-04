@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title')Список сериалов@endslot
        @endcomponent

        <div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-success" href="{{route('create')}}" role="button">Добавить сериал</a>
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
                        @forelse($serials as $serial)
                            <tr>
                                <th scope="row"><img src="{{asset($serial->img)}}" alt=""></th>
                                <td>{{asset($serial->title)}}</td>
                                <td>{{asset($serial->short_desc)}}</td>
                                <td>
                                    <a class="btn btn-danger mb-2" href="{{route('update')}}" role="button">Редактировать</a>
                                    <a class="btn btn-primary" href="{{route('destroy')}}" role="button">Удалить</a>
                                </td>
                            </tr>
                        @empty
                            <tr scope="row">
                                <th colspan="4"><h2 class="text-center">Сериалов ещё нету</h2></th>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <ul class="pagination">
                                    {{$serials->links()}}
                                </ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>



@endsection
