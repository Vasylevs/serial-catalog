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
            <div class="col-12 mt-2">
                <form action="{{route('admin.season.update',$season->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    @csrf

                    @include('admin.season.partrials.form')
                </form>
            </div>
        </div>
    </div>



@endsection