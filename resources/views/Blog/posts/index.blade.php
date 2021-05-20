@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row align-items-start">
        @foreach($items as $item)
        <div class="col-md-4">
            <div class="card" style="">
                <img src="http://placekitten.com/g/300/100" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->id }} {{ $item->title }}</h5>
                    <p class="card-text">{{ $item->excerpt }}</p>
                    <a href="#" class="btn btn-primary">Read more...</a>
                </div>

            </div>
            <br>
        </div>
        @endforeach
    </div>
</div>
{{--<table>--}}
{{--    @foreach($items as $item)--}}
{{--        <tr>--}}
{{--            <td>{{ $item->id }}</td>--}}
{{--            <td>{{ $item->title }}</td>--}}
{{--            <td>{{ $item->created_at }}</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--</table>--}}
@endsection
