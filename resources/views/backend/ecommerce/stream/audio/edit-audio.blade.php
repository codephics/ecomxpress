@extends('backend.skeleton.body') @section('content')

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('template.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('template.manage-audios') }}">Manage Audios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Audio</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Edit Audio</h1>
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

    <form class="needs-validation" method="POST" action="{{ route('template.audio.update', $audio->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title *</label>
                            <input type="text" class="form-control" name="title" value="{{ $audio->title }}" placeholder="Title" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="artist" class="form-label">Artist</label>
                            <input type="text" class="form-control" name="artist" value="{{ $audio->artist }}" placeholder="Artist" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" name="duration" value="{{ $audio->duration }}" placeholder="Select Duration">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="release_date" class="form-label">Release Date</label>
                            <input type="text" class="form-control" value="{{ $audio->release_date }}" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="release_date" class="form-label">Update</label>
                            <input type="date" class="form-control" name="release_date">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category</label>
                            <input class="form-control" list="datalistCategory" name="category_name" value="{{ $audio->category_name }}" placeholder="Category" />
                            <datalist id="datalistCategory">
                                @foreach($categories as $category)
                                <option value="{{ $category->category_name }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="subcategory_name" class="form-label">Sub Category</label>
                            <input class="form-control" list="datalistSubcategory" name="subcategory_name" value="{{ $audio->subcategory_name }}" placeholder="Sub Category" />
                            <datalist id="datalistSubcategory">
                                @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->subcategory_name }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="sub_subcategory_name" class="form-label">Sub Sub Category</label>
                            <input class="form-control" list="datalistSubSubcategory" name="sub_subcategory_name" value="{{ $audio->sub_subcategory_name }}" placeholder="Sub Sub Category" />
                            <datalist id="datalistSubSubcategory">
                                @foreach($sub_subcategories as $sub_subcategory)
                                <option value="{{ $sub_subcategory->sub_subcategory_name }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input class="form-control" list="datalistTemplate" name="genre" placeholder="{{ $audio->genre }}" />
                            <datalist id="datalistTemplate">
                                <option value="{{ $audio->genre }}"></option>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="album" class="form-label">Album</label>
                            <input class="form-control" list="datalistAuthor" name="album" placeholder="{{ $audio->album }}" />
                            <datalist id="datalistAuthor">
                                <option value="{{ $audio->album }}"></option>
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea class="form-control" name="short_description" id="customTextarea">{{ $audio->short_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="long_description" class="form-label">Long Description</label>
                            <textarea class="form-control" name="long_description" id="customTextarea">{{ $audio->long_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="youtube_iframe" class="form-label">Youtube Iframe</label>
                            <textarea class="form-control" rows="2" name="youtube_iframe">{{ $audio->youtube_iframe }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="header_content" class="form-label">Header Content</label>
                            <textarea class="form-control" rows="2" name="header_content">{{ $audio->header_content }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <textarea class="form-control" id="meta_title" rows="2" name="meta_title">{{ $audio->meta_title }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" id="meta_description" rows="2" name="meta_description">{{ $audio->meta_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" name="link" placeholder="Link" disabled />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featuredCheckDefault" @if($audio->is_featured == 1) checked @endif>
                                  <label class="form-check-label" for="featuredCheckDefault">Featured?</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <img src="{{ asset('template/stream/audio/image/cover-image/' . $audio->cover_image) }}" class="img-thumbnail" alt="...">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Cover Image</label>
                            <input class="form-control" type="file" name="cover_image" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <audio controls>
                                <label for="audio_file" class="form-label">{{ $audio->audio_file }}</label>
                                <source src="{{ asset('template/stream/audio/' . $audio->audio_file) }}" type="audio/mpeg">
                            </audio>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="audio_file" class="form-label">Audio File</label>
                            <input class="form-control" type="file" name="audio_file" multiple />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <img src="{{ asset('template/stream/audio/image/og/' . $audio->og) }}" class="img-thumbnail" alt="...">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="og" class="form-label">Upload OG</label>
                            <input class="form-control" type="file" name="og" multiple />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input class="form-control" list="datalistStatus" name="status" placeholder="@if($audio->status == 1) Published @else Draft @endif" />
                            <datalist id="datalistStatus">
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" name="comment">{{ $audio->comment }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Publish</button>
                <button type="submit" class="btn btn-primary">Draft</button>
                <button type="submit" class="btn btn-secondary">Publish & Add Another</button>
            </div>
        </div>
    </form>
</main>

@section('custom-scripts') @include('backend.skeleton.summernote') @endsection @endsection