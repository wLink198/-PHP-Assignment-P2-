@extends('layout')
@section('title', 'List attendance slots')

@section('content')
    <div class="row">
    @foreach($list as $item)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$item->img_url}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <h6><strong>Address: </strong>{{$item->address}}</h6>
                    <h6><strong>Price: </strong>{{$item->price}}</h6>
                    <h6><strong>Information: </strong>{{$item->information}}</h6>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Detail information
                    </a>
                    <div class="collapse" id="collapseExample{{$item->id}}">
                        <div class="card card-body">
                            {{$item->information_detail}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="float-right">
        {{ $list->links() }}
    </div>
@endsection