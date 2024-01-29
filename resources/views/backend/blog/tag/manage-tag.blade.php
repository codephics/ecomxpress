@extends('backend.skeleton.body')

@section('custom-head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@vite(['resources/js/datatable-script.js'])
@endsection

@section('content')
<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Blog Tags</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-lg-8">
            <h1>Manage Blog Tags</h1>
        </div>
        <div class="col-lg-4 align-self-center">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <a type="button" class="btn btn-outline-secondary float-end" href="{{ route('blog.new-tag') }}">+ Add Blog Tag</a>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('delete'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-sm-12">

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->slug }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                              <a href="{{ route('blog.tag.edit',$tag->id) }}" class="btn btn-secondary">Edit</a>

                              <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#deleteCategories{{ $tag->id }}">Destroy</button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteCategories{{ $tag->id }}" tabindex="-1" aria-labelledby="deleteCategoriesLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <p>Do you really want to delete. This process cannot be undone.</p>
                                      </div>
                                      <form method="POST" action="{{ route('blog.tag.destroy',$tag->id) }}">
                                        @csrf
                                        @method('DELETE')
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                      </div>
                                    </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</main>

@endsection
