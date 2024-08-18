@extends('backend.skeleton.body') @section('content')

<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->

    <div class="row">
        <div class="col-md-12">
            <h1>Edit Profile</h1>
        </div>
    </div>

    <div class="row">
        @include('backend.profile.partials.update-profile-information-form')

        @include('backend.profile.partials.update-password-form')
    </div>
</main>

@section('custom-scripts') @include('backend.skeleton.summernote') @endsection @endsection