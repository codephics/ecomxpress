@extends('backend.skeleton.body') @section('content')

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('manage.contacts') }}">Manage Contacts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>View Contact</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $contact->name }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $contact->email }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-3">
                        {!! $contact->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@section('custom-scripts') @include('backend.skeleton.summernote') @endsection @endsection