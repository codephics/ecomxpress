@extends('backend.skeleton.body') @section('content')

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ecommerce.manage-categories') }}">Manage Categories</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ecommerce.manage-subcategories') }}">Manage Subcategories</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ecommerce.manage-sub-subcategories') }}">Manage Sub Subcategories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Sub Subcategory</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Edit Sub Subcategory</h1>
        </div>
    </div>

    @if(session()->has('message'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        </div>
    </div>
    @endif

    <form class="needs-validation" method="POST" action="{{ route('ecommerce.sub-subcategory.update',$sub_subcategory->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="subcategory_name" class="form-label">Subcategory Name *</label>
                            <input class="form-control" list="datalistSubcategory" name="subcategory_name" id="subcategory_name" value="{{ $sub_subcategory->subcategory_name }}" placeholder="Subcategory" />
                            <datalist id="datalistSubcategory">
                                @foreach($subcategories as $category)
                                <option value="{{ $category->subcategory_name }}">{{ $category->subcategory_name }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="sub_subcategory_name" class="form-label">Sub SubCategory Name *</label>
                            <input type="text" class="form-control" name="sub_subcategory_name" value="{{ $sub_subcategory->sub_subcategory_name }}" placeholder="Sub Subcategory Name" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="slug" class="form-label">Category Slug *</label>
                            <input type="text" class="form-control" name="slug" value="{{ $sub_subcategory->slug }}" placeholder="Slug" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="custom-textarea" name="description" rows="3">{{ $sub_subcategory->description }}</textarea>
                        </div>
                    </div>
                </div>

                <hr class="border border-secondery border-2 opacity-75">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/category/subcategory/sub-subcategory/image/icon/' . $sub_subcategory->icon) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="icon_alt_text" value="{{ $sub_subcategory->icon_alt_text }}" placeholder="Icon Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <input class="form-control" type="file" name="icon" />
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/category/subcategory/sub-subcategory/image/thumb/' . $sub_subcategory->thumb) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="thumb_alt_text" value="{{ $sub_subcategory->thumb_alt_text }}" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="thumb" class="form-label">Thumb</label>
                            <input class="form-control" type="file" name="thumb" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/category/subcategory/sub-subcategory/image/cover/' . $sub_subcategory->cover) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="cover_alt_text" value="{{ $sub_subcategory->cover_alt_text }}" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input class="form-control" type="file" name="cover" />
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/category/subcategory/sub-subcategory/image/og/' . $sub_subcategory->og_image) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="og_img_alt_text" value="{{ $sub_subcategory->og_img_alt_text }}" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="og_image" class="form-label">Upload OG</label>
                            <input class="form-control" type="file" name="og_image" multiple />
                        </div>
                    </div>
                </div>

                <hr class="border border-secondery border-2 opacity-75">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <textarea class="form-control" name="meta_title" rows="5">{{ $sub_subcategory->meta_title }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="5">{{ $sub_subcategory->meta_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="facebook_meta_title" class="form-label">Facebook Meta Title</label>
                            <textarea class="form-control" name="facebook_meta_title" rows="5">{{ $sub_subcategory->facebook_meta_title }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="facebook_meta_description" class="form-label">Facebook Meta Description</label>
                            <textarea class="form-control" name="facebook_meta_description" rows="5">{{ $sub_subcategory->facebook_meta_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="twitter_meta_title" class="form-label">Twitter Meta Title</label>
                            <textarea class="form-control" name="twitter_meta_title" rows="5">{{ $sub_subcategory->twitter_meta_title }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="twitter_meta_description" class="form-label">Twitter Meta Description</label>
                            <textarea class="form-control" name="twitter_meta_description" rows="5">{{ $sub_subcategory->twitter_meta_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="content">Content?</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="is_index" value="1" id="featuredCheckDefault" @if($sub_subcategory->is_index == 1) checked @endif>
                                <label class="form-check-label" for="featuredCheckDefault">Index?</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="is_follow" value="1" id="featuredCheckDefault" @if($sub_subcategory->is_follow == 1) checked @endif>
                                <label class="form-check-label" for="featuredCheckDefault">Follow?</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featuredCheckDefault" @if($sub_subcategory->is_featured == 1) checked @endif>
                                <label class="form-check-label" for="featuredCheckDefault">Featured?</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupStatus">Status</label>
                                <select class="form-select" id="inputGroupStatus" name="status">
                                    @if($sub_subcategory->status == 1)
                                    <option value="1">Published</option>
                                    <option value="0">Draft</option>
                                    @else
                                    <option value="0">Draft</option>
                                    <option value="1">Publish</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="custom-textarea" name="comment" rows="3">{{ $sub_subcategory->comment }}</textarea>
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