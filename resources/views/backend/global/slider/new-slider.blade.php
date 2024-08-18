@extends('backend.skeleton.body') @section('content')

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('manage.sliders') }}">Manage Sliders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Slider</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Add Slider</h1>
        </div>
    </div>

    <form class="needs-validation" method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="heading" class="form-label">Heading</label>
                            <input type="text" class="form-control" name="heading" placeholder="Heading" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="subheading" class="form-label">Subheading</label>
                            <input type="text" class="form-control" name="subheading" placeholder="Subheading" />
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
                            <input type="text" class="form-control" name="button_text_1" placeholder="Button Text" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="button_link_1" class="form-label">Button Link 1</label>
                            <input type="text" class="form-control" name="button_link_1" placeholder="Button Link" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="button_text_2" class="form-label">Button Text 2</label>
                            <input type="text" class="form-control" name="button_text_2" placeholder="Button Text 2" />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="button_link_2" class="form-label">Button Link 2</label>
                            <input type="text" class="form-control" name="button_link_2" placeholder="Button Link 2" />
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
                            <textarea class="custom-textarea" name="detail"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image" />
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image Alt Text</label>
                            <input class="form-control" type="text" name="image_alt_text" placeholder="Image Alt Text" />
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupStatus">Status</label>
                            <select class="form-select" id="inputGroupStatus" name="status">
                                <option value="0">Choose...</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="custom-textarea" name="comment" rows="3"></textarea>
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