@extends('layouts.app')

@section('content')
<div class="container serial">
    <div class="row justify-content-center">
        @forelse($serials as $serial)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{route('serial',$serial->id)}}">
                    <div class="card">
                        <img class="card-img-top" src="/assets/img/{{$serial->img}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{$serial->short_desc}}</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="alert alert-warning" role="alert">
                Сериалов ещё нету
             </div>
        @endforelse
        <div class="col-12 mt-2">
            <ul class="pagination">
                {{$serials->links()}}
            </ul>
        </div>
    </div>
</div>
@endsection
