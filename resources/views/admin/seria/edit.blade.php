@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Редактирвание {{$serie->title}} для {{$season->title}}@endslot
        @endcomponent
        <div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-success" href="{{route('admin.season.edit',$season->id)}}" role="button">Назад</a>
            </div>
            <div class="col-12 mt-2">
                <form action="{{route('admin.serie.update',$serie->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    @csrf

                    @include('admin.seria.partrials.form')
                </form>
            </div>
        </div>
    </div>



@endsection