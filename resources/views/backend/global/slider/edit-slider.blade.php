@extends('backend.skeleton.body') @section('content')

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('manage.sliders') }}">Manage Sliders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Edit Slider</h1>
        </div>
    </div>

    @if(session()->has('update'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{ session('update') }}
            </div>
        </div>
    </div>
    @endif

    <form class="needs-validation" method="POST" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="heading" class="form-label">Heading</label>
                            <input type="text" class="form-control" name="heading" value="{{ $slider->heading }}" placeholder="Heading" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="subheading" class="form-label">Subheading</label>
                            <input type="text" class="form-control" name="subheading" value="{{ $slider->subheading }}" placeholder="Subheading" />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="button_text_1" class="form-label">Button Text 1</label>
                            <input type="text" class="form-control" name="button_text_1" value="{{ $slider->button_text_1 }}" placeholder="Button Text" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="button_link_1" class="form-label">Button Link 1</label>
                            <input type="text" class="form-control" name="button_link_1" value="{{ $slider->button_link_1 }}" placeholder="Button Link" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="button_text_2" class="form-label">Button Text 2</label>
                            <input type="text" class="form-control" name="button_text_2" value="{{ $slider->button_text_2 }}" placeholder="Button Text 2" />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="button_link_2" class="form-label">Button Link 2</label>
                            <input type="text" class="form-control" name="button_link_2" value="{{ $slider->button_link_2 }}" placeholder="Button Link 2" />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail</label>
                            <textarea class="custom-textarea" name="detail">{{ $slider->detail }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <img src="{{ asset('global/slider/image/' . $slider->image) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image" />
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image Alt Text</label>
                            <input class="form-control" type="text" name="image_alt_text" value="{{ $slider->image_alt_text }}" placeholder="Image Alt Text" />
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupStatus">Status</label>
                            <select class="form-select" id="inputGroupStatus" name="status">
                                @if($slider->status == 1)
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                @else
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="custom-textarea" name="comment" rows="3">{{ $slider->comment }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </div>
    </form>
</main>

@section('custom-scripts') @include('backend.skeleton.summernote') @endsection @endsection