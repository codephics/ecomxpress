@extends('backend.skeleton.body') @section('content')
<main class="container p-3 py-5">
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Content -->
    <div class="row g-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col">
                    <h1>Dashboard</h1>
                </div>
            </div>
            <div class="col-lg-12">
                <hr class="col-12" />

                <div class="row g-5">
                    <div class="col-md-6">
                        <p>
                            Experience a seamless and efficient e-commerce platform tailored to meet all your online business needs. Our solution, built with cutting-edge technology and <b>optimized for search engines</b>, ensures you have everything you need to manage and grow your online store effortlessly.

                            <ul>
                                <li><b>Manage Products:</b> Easily add, update, and delete products.</li>
                                <li><b>Categories:</b> Organize your products into categories for better navigation.</li>
                                <li><b>Seller Management:</b> Handle multiple sellers efficiently.</li>
                                <li><b>Lead Management:</b> Track and convert potential customers.</li>
                                <li><b>Blog:</b> Share updates, news, and stories with your audience.</li>
                                <li><b>Blog Categories & Tags:</b> Categorize and tag your blog posts for better reach.</li>
                                <li><b>Slider:</b> Showcase featured products and promotions.</li>
                                <li><b>Pages:</b> Create and manage static pages like About Us, Contact Us, and more.</li>
                                <li><b>Contact Query:</b> Handle customer inquiries effectively.</li>
                                <li><b>Subscriber Lead:</b> Manage your email subscribers.</li>
                                <li><b>Settings:</b> Customize your store settings to fit your needs.</li>
                                <li><b>User Profile:</b> Allow users to manage their accounts and orders.</li>
                            </ul>
                        </p>
                        <ul class="icon-list ps-0">
                            <li class="text-muted d-flex align-items-start mb-1"><a href="https://codephics.com" target="_blank">Explore More!</a></li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <h2>Quick Links</h2>
                        <ul class="icon-list ps-0">
                            <li class="d-flex align-items-start mb-1"><a href="{{ route('blog.new') }}">Add Blog</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="{{ route('blog.manage') }}">Manage Blog</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="{{ route('blog.categories') }}">Manage Categories</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="{{ route('blog.subcategories') }}">Manage Subcategories</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="{{ route('blog.sub-subcategories') }}">Manage Sub Subcategories</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="{{ route('blog.tag') }}">Manage Tags</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="{{ route('page.manage-pages') }}">Manage Pages</a></li>
                            <li class="d-flex align-items-start mb-1"><a href="{{ route('setting.edit') }}">Manage Setting</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</main>
@endsection
