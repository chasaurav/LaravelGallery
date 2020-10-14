@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h3>List of all uploaded images</h3>
        </div>
        <div class="col-2">
            <a href="/create" class="btn btn-primary btn-block">Upload Image</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="owl-carousel owl-theme mt-5">
                @if (count($posts))
                    @foreach ($posts as $post)
                        <div class="item" data-id="{{ $post->id }}">
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

@section('script')
@if (count($posts))
<script>
    $(document).ready(function () {
        $(document).on('mouseleave', '.item', function() { $('.hoverMenu').remove(); });
        $(document).on('mouseenter', '.item', function() {
            let that = $(this);
            let id = that.data('id');
            let html = `<div class="hoverMenu">`;
            html += `<a href="/home" class="custButton" onclick="event.preventDefault(); document.getElementById('delete-post').submit();">Delete Image</a>`;
            html += `<form id="delete-post" action="/home/${id}" method="POST" style="display: none;">`;
            html += `@csrf @method('Delete')</form>`;
            html += `</div>`;
            that.append(html);
        });
    });
</script>
@endif
@endsection
