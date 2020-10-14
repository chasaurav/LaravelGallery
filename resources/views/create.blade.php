@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1>Image Upload Form</h1>
        </div>
        <div class="col-2">
            <a href="{{ route('home') }}" class="btn btn-danger btn-block">Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="imgSelector" for="file">Click to select an image</label>
                            <input type="file" name="file" id="file" class="form-control d-none">
                            @error('file')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="submit" value="Upload" onclick="return confirm('Are you sure to upload this image ?');" class="btn btn-success btn-block">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="button" value="Clear" id="resetImg" class="btn btn-danger btn-block">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <img src="demo.png" alt="Image Preview" class="img-fluid imgPreview">
        </div>
    </div>
</div>
<script>
    const defaultImg = ["demo.png", "Click to select an image"];

    document.querySelector('#file').addEventListener('change', function() {
        const reader = new FileReader();
        reader.addEventListener('load', () => {
            document.querySelector('.imgPreview').setAttribute('src', reader.result);
            document.querySelector('.imgSelector').textContent = this.files[0].name;
        });
        reader.readAsDataURL(this.files[0]);
    });

    document.querySelector('#resetImg').addEventListener('click', function(){
        document.querySelector('.imgPreview').setAttribute('src', defaultImg[0]);
        document.querySelector('.imgSelector').textContent = defaultImg[1];
        document.querySelector('#file').value = '';
    });
</script>
@endsection
