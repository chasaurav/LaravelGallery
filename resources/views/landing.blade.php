@extends('layouts.app')

@section('menu')
<a class="dropdown-item" href="{{ url('/home') }}">Home</a>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Image Gallery</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="owl-carousel owl-theme mt-5">
                @if (count($posts))
                    @foreach ($posts as $post)
                        <div class="item">
                            <img src="{{ asset('images/'.$post->img_name) }}" alt="{{ $post->img_name }}" class="img-fluid sliderImg">
                            <h4 class="imgTitle">Uploaded by: {{ $post->user->name }}</h4>
                        </div>
                    @endforeach
                @else
                    <div class="item d-flex justify-content-center align-items-center" style="height: 70vh;"><h4>No Image Found!!!</h4></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
