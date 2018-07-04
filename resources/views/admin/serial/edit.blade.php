@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Редактирование сериала "{{$serial->title}}"@endslot
        @endcomponent
        <div class="row">
            <div class="col-6">
                <a class="btn btn-success" href="{{route('admin.index')}}" role="button">Добавить сезон</a>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-success" href="{{route('admin.index')}}" role="button">К списку сериалов</a>
            </div>
            <div class="col-12 mt-2">
                <form action="{{route('admin.serial.update',$serial->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    @csrf

                    @include('admin.serial.partrials.form')
                </form>
            </div>
        </div>
    </div>



@endsection