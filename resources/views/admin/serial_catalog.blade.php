@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @if(isset($status))

            <div class="alert alert-success" role="alert">
                {{$status}}
            </div>

        @endif

        @component('admin.components.breadcrumb')
            @slot('title')Список сериалов@endslot
        @endcomponent

        <div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-success" href="{{route('admin.serial.create')}}" role="button">Добавить сериал</a>
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
                                <th scope="row"><img style="width: 75px;" src="{{'/assets/img/'.$serial->img}}" alt=""></th>
                                <td><h3>{{$serial->title}}</h3></td>
                                <td>{{$serial->short_desc}}</td>
                                <td>
                                    <a class="btn btn-primary mb-2" href="{{route('admin.serial.edit',$serial->id)}}" role="button">Редактировать</a>
                                    <form onsubmit="if(confirm('Удалить?')){return true}else{return false}"
                                          action="{{route('admin.serial.destroy',$serial->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input class="btn btn-danger" type="submit" value="Удалить">
                                    </form>
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
