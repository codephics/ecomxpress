@extends('backend.skeleton.body')
@section('content') @section('custom-head')
<script src="https://cdn.tiny.cloud/1/m9g2pjluv64jkrzcnksdf4ur6nd9lvyrbatcjua3iazeof63/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ecommerce.manage-item') }}">Manage Item</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Item</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Update Item</h1>
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

    <form class="needs-validation" method="POST" action="{{ route('ecommerce.item.update',$item->id) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $item->name }}" placeholder="Name" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ $item->slug }}" placeholder="Slug" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category</label>
                            <input class="form-control" list="datalistCategory" name="category_name" value="{{ $item->category_name }}" placeholder="Search Category" required />
                            <datalist id="datalistCategory">
                                @foreach($categories as $category)
                                <option value="{{ $category->category_name }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="subcategory_name" class="form-label">Subcategory</label>
                            <input class="form-control" list="datalistSubCategory" name="subcategory_name" value="{{ $item->subcategory_name }}" placeholder="Search Subcategory" />
                            <datalist id="datalistSubCategory">
                                @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->subcategory_name }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="sub_subcategory_name" class="form-label">Sub Subcategory</label>
                            <input class="form-control" list="datalistSubSubCategory" name="sub_subcategory_name" value="{{ $item->sub_subcategory_name }}" placeholder="Search Sub Subcategory" />
                            <datalist id="datalistSubSubCategory">
                                @foreach($sub_subcategories as $sub_subcategory)
                                <option value="{{ $sub_subcategory->sub_subcategory_name }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" class="form-control" name="sku" value="{{ $item->sku }}" placeholder="SKU" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="sale_price" class="form-label">Sale Price</label>
                            <input type="text" class="form-control" name="sale_price" value="{{ $item->sale_price }}" placeholder="0.00" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="regular_price" class="form-label">Regular Price</label>
                            <input type="text" class="form-control" name="regular_price" value="{{ $item->regular_price }}" placeholder="0.00" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="commission" class="form-label">Commission</label>
                            <input type="text" class="form-control" name="commission" value="{{ $item->commission }}" placeholder="0.00" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="bootstrap_v" class="form-label">Bootstrap Version</label>
                            <input type="text" class="form-control" name="bootstrap_v" value="{{ $item->bootstrap_v }}" placeholder="Bootstrap Version" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="released" class="form-label">Released</label>
                            <input type="text" class="form-control" name="released" value="{{ $item->datepicker1 }}" id="datepicker1" placeholder="DD/MM/YYYY" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="updated" class="form-label">Updated</label>
                            <input type="text" class="form-control" name="updated" value="{{ $item->time }}" placeholder="DD/MM/YYYY" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label for="version" class="form-label">Version</label>
                            <input type="text" class="form-control" name="version" value="{{ $item->version }}" placeholder="Version" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="seller_name" class="form-label">Seller Name</label>
                            <input class="form-control" list="datalistSellerName" name="seller_name" value="{{ $item->seller_name }}" placeholder="Search Seller Name" required />
                            <datalist id="datalistSellerName">
                                @foreach($sellers as $seller)
                                <option value="{{ $seller->name }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="seller_email" class="form-label">Seller Email</label>
                            <input class="form-control" list="datalistSellerEmail" name="seller_email" value="{{ $item->seller_email }}" placeholder="Search Seller Email" required />
                            <datalist id="datalistSellerEmail">
                                @foreach($sellers as $seller)
                                <option value="{{ $seller->email }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea id="custom-textarea" name="short_description">{{ $item->short_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="long_description" class="form-label">Long Description</label>
                            <textarea id="custom-textarea" name="long_description">{{ $item->long_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="change_log" class="form-label">Change Log</label>
                            <textarea id="custom-textarea" name="change_log">{{ $item->change_log }}</textarea>
                        </div>
                    </div>
                </div>

                <hr class="border border-secondery border-2 opacity-75">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/item/image/' . $item->image) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="image_alt_text" value="{{ $item->icon_alt_text }}" placeholder="Image Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" name="image" />
                        </div>
                    </div>
                </div>

                <hr class="border border-secondery border-2 opacity-75">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <a href="{{ asset('ecommerce/item/file/' . $item->file) }}" target="_blank">Open</a>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input class="form-control" type="file" name="file" multiple />
                        </div>
                    </div>
                </div>

                <hr class="border border-secondery border-2 opacity-75">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/item/image/icon/' . $item->icon) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="icon_alt_text" value="{{ $item->icon_alt_text }}" placeholder="Icon Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon</label>
                            <input class="form-control" type="file" name="icon" />
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/item/image/thumb/' . $item->thumb) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="thumb_alt_text" value="{{ $item->thumb_alt_text }}" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="thumb" class="form-label">Thumb</label>
                            <input class="form-control" type="file" name="thumb" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/item/image/cover/' . $item->cover) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="cover_alt_text" value="{{ $item->cover_alt_text }}" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input class="form-control" type="file" name="cover" />
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('ecommerce/item/image/og/' . $item->og_image) }}" class="img-thumbnail" alt="...">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="og_img_alt_text" value="{{ $item->og_img_alt_text }}" placeholder="Alt Text" />
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
                            <textarea class="form-control" name="meta_title" rows="5">{{ $item->meta_title }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="5">{{ $item->meta_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="facebook_meta_title" class="form-label">Facebook Meta Title</label>
                            <textarea class="form-control" name="facebook_meta_title" rows="5">{{ $item->facebook_meta_title }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="facebook_meta_description" class="form-label">Facebook Meta Description</label>
                            <textarea class="form-control" name="facebook_meta_description" rows="5">{{ $item->facebook_meta_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="twitter_meta_title" class="form-label">Twitter Meta Title</label>
                            <textarea class="form-control" name="twitter_meta_title" rows="5">{{ $item->twitter_meta_title }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="twitter_meta_description" class="form-label">Twitter Meta Description</label>
                            <textarea class="form-control" name="twitter_meta_description" rows="5">{{ $item->twitter_meta_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="live_preview_link" class="form-label">Live Preview Link</label>
                            <input type="text" class="form-control" name="live_preview_link" value="{{ $item->live_preview_link }}" placeholder="Live Preview Link" />
                        </div>
                        <div class="mb-3">
                            <label for="admin_link" class="form-label">Admin Link</label>
                            <input type="text" class="form-control" name="admin_link" value="{{ $item->admin_link }}" placeholder="Admin Link" />
                        </div>
                        <div class="mb-3">
                            <label for="downloadable_link" class="form-label">Downloadable Link</label>
                            <input type="text" class="form-control" name="downloadable_link" value="{{ $item->downloadable_link }}" placeholder="Downloadable Link" />
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupStatus">Order Type</label>
                                <select class="form-select" id="inputGroupStatus" name="order_type">
                                    @if($item->order_type == 1)
                                    <option value="1">Normal</option>
                                    <option value="2">Pre-Order</option>
                                    <option value="3">Virtual</option>
                                    @elseif($item->order_type == 2)
                                    <option value="2">Pre-Order</option>
                                    <option value="1">Normal</option>
                                    <option value="3">Virtual</option>
                                    @else($item->order_type == 3)
                                    <option value="3">Virtual</option>
                                    <option value="1">Normal</option>
                                    <option value="2">Pre-Order</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featuredCheckDefault" @if($item->is_featured == 1) checked @endif>
                                  <label class="form-check-label" for="featuredCheckDefault">Featured?</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="content">Content?</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="is_index" value="1" id="featuredCheckDefault" @if($item->is_index == 1) checked @endif>
                                <label class="form-check-label" for="featuredCheckDefault">Index?</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="is_follow" value="1" id="featuredCheckDefault" @if($item->is_follow == 1) checked @endif>
                                <label class="form-check-label" for="featuredCheckDefault">Follow?</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupStatus">Status</label>
                                <select class="form-select" id="inputGroupStatus" name="status">
                                    @if($item->status == 1)
                                    <option value="1">Published</option>
                                    <option value="0">Draft</option>
                                    @else
                                    <option value="0">Draft</option>
                                    <option value="1">Publish</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="custom-textarea" name="comment" rows="3">{{ $item->comment }}</textarea>
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

@section('custom-scripts')
<script>
    tinymce.init({
        selector: '#custom-textarea',
        plugins: 'link image code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code'
    });
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
</script>
@endsection @endsection