@extends('backend.blog.skeleton.body')
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
                    <li class="breadcrumb-item"><a href="{{ route('blog.tag') }}">Manage Blog Tags</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Blog Tag</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Add Blog Tag</h1>
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

    <form class="needs-validation" method="POST" action="{{ route('blog.new-tag.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required />
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" required />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="custom-textarea" name="description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="youtube_iframe" class="form-label">Youtube Iframe</label>
                            <textarea class="form-control" id="youtube_iframe" rows="5" name="youtube_iframe"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="header_content" class="form-label">Header Content</label>
                            <textarea class="form-control" id="header_content" rows="5" name="header_content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <textarea class="form-control" name="meta_title" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="facebook_meta_title" class="form-label">Facebook Meta Title</label>
                            <textarea class="form-control" name="facebook_meta_title" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="facebook_meta_description" class="form-label">Facebook Meta Description</label>
                            <textarea class="form-control" name="facebook_meta_description" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="twitter_meta_title" class="form-label">Twitter Meta Title</label>
                            <textarea class="form-control" name="twitter_meta_title" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="twitter_meta_description" class="form-label">Twitter Meta Description</label>
                            <textarea class="form-control" name="twitter_meta_description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="icon" class="form-label">Category Icon</label>
                            <input class="form-control" type="file" name="icon" id="icon" />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="icon_alt_text" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="thumb" class="form-label">Category Thumb</label>
                            <input class="form-control" type="file" name="thumb" id="thumb" />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="thumb_alt_text" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="cover" class="form-label">Category Cover</label>
                            <input class="form-control" type="file" name="cover" id="cover" />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="cover_alt_text" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label for="og_image" class="form-label">Category OG</label>
                            <input class="form-control" type="file" name="og_image" id="og_image" />
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="og_img_alt_text" placeholder="Alt Text" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="content">Content?</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="is_index" value="1" id="featuredCheckDefault" />
                                <label class="form-check-label" for="featuredCheckDefault">Index?</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="is_follow" value="1" id="featuredCheckDefault" />
                                <label class="form-check-label" for="featuredCheckDefault">Follow?</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featuredCheckDefault" />
                                <label class="form-check-label" for="featuredCheckDefault">
                                    Featured?
                                </label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupStatus">Status</label>
                            <select class="form-select" id="inputGroupStatus" name="status">
                                <option value="0">Choose...</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="custom-textarea" name="comment" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" disabled>Publish</button>
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