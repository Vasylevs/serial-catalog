@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')Добавление сериала@endslot
        @endcomponent
        <div class="row">
            <div class="col-12 mt-2">
                <form action="" method="post">

                </form>
            </div>
        </div>
    </div>



@endsection