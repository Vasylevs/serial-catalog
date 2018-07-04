@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Добавление сериала@endslot
        @endcomponent
        <div class="row">
            <div class="col-12 text-right">
                <a class="btn btn-success" href="{{route('admin.index')}}" role="button">К списку сериалов</a>
            </div>
            <div class="col-12 mt-2">
                <form action="{{route('admin.serial.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('admin.serial.partrials.form')
                </form>
            </div>
        </div>
    </div>



@endsection