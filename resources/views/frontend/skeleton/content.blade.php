@extends('frontend.skeleton.body') @section('custom-head')
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
</style>
@endsection @section('content')
<!-- Featured Header -->
<section>
    <div class="row align-items-center p-5 mb-4 bg-light rounded-3">
        <div class="col-md-4">
            <h1 class="display-5 fw-bold lh-1 mb-3">{{ \Illuminate\Support\Str::limit($setting->title, 100, '...') }}</h1>
            <p>{!! $setting->about_in_short !!}</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a class="btn btn-primary btn-lg px-4 me-md-2" href="{{ route('item.shop') }}">Explore Items</a>
                <a class="btn btn-outline-secondary btn-lg px-4" href="{{ route('blog.more') }}">Read Blogs</a>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach($items as $item)
                            <div class="col">
                                <div class="card">
                                  <img src="{{ asset('global/slider/image/2-500x300.png') }}" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                  </div>
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $item->category_name }}</li>
                                    <li class="list-group-item">
                                        @if($item->sale_price)

                                        <span class="fw-bold fs-5 text-success">৳ {{ $item->sale_price }}</span> | <span class="list-group-item fw-bold text-decoration-line-through text-muted">৳ {{ $item->regular_price }}</span>

                                        @elseif($item->regular_price)

                                        <span class="fw-bold fs-5 text-success">৳ {{ $item->regular_price }}</span>

                                        @else

                                        <span>Free</span>

                                        @endif
                                    </li>
                                  </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- HR -->
<div class="mt-3 border-top border-start-0 border-bottom-0 border-end-0"></div>

<div class="mt-3"></div>
<!-- Categories -->
<section>
    <div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
        <div class="col-lg-10">
            <h4 class="display-6">Browse Categories</h4>

            <p>Embark on a journey through our blog, where valuable insights await your exploration. Uncover the foundational aspects of SEO, delving into a comprehensive beginner's guide that unveils essential strategies and tips. Elevate your online presence by mastering the art of optimizing your website for search engines with our expertly curated content.</p>
        </div>
        <div class="col-lg-2 align-self-center">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <a type="button" class="btn btn-secondary float-end" href="{{ route('item.shop') }}">All Categories</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3"></div>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <a class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-2.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <a class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-3.jpg');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <a class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</a>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-3"></div>

    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-outline-secondary btn-lg">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-outline-secondary btn-lg">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-outline-secondary btn-lg">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-3"></div>

    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-outline-secondary btn-lg">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-outline-secondary btn-lg">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-outline-secondary btn-lg">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- HR -->
<div class="mt-3 border-top border-start-0 border-bottom-0 border-end-0"></div>

<div class="mt-3"></div>

<section>
    <div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
        <div class="col-lg-10">
            <h4 class="display-6">Browse Items</h4>

            <p>Embark on a journey through our blog, where valuable insights await your exploration. Uncover the foundational aspects of SEO, delving into a comprehensive beginner's guide that unveils essential strategies and tips. Elevate your online presence by mastering the art of optimizing your website for search engines with our expertly curated content.</p>
        </div>
        <div class="col-lg-2 align-self-center">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <a type="button" class="btn btn-secondary float-end" href="{{ route('item.shop') }}">All Items</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3"></div>

    <div class="row">
        <div class="card" style="width: 18rem;">
          <img src="{{ asset('global/slider/image/2-500x300.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Category</li>
            <li class="list-group-item">
                <span> ৳ 0.00</span>
                <span> | ৳ 0.00</span>
            </li>
          </ul>
          <div class="card-body">
            <a href="#" class="card-link">Easy Buy</a>
          </div>
        </div>
    </div>
</section>

<!-- HR -->
<div class="mt-3 border-top border-start-0 border-bottom-0 border-end-0"></div>

<div class="mt-3"></div>

<!-- Blogs -->
<section>
    <div class="row border-top-0 border-start-0 border-bottom-0 border-end-0">
        <div class="col-lg-10">
            <h4 class="display-6">Unlocking Knowledge on our Blog</h4>

            <p>Embark on a journey through our blog, where valuable insights await your exploration. Uncover the foundational aspects of SEO, delving into a comprehensive beginner's guide that unveils essential strategies and tips. Elevate your online presence by mastering the art of optimizing your website for search engines with our expertly curated content.</p>
        </div>
        <div class="col-lg-2 align-self-center">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <a type="button" class="btn btn-secondary float-end" href="{{ route('blog.more') }}">Read Blogs</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3"></div>

    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-lg-6">
            <article>
                <figure>
                    <div class="card shadow mb-5 rounded-3 no-border-card">
                        <a href="{{ route('blog.detail',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                            <img src="{{ asset('blog/image/featured/' . $blog->featured_image) }}" class="card-img-top" alt="...">
                        </a>
                        <figcaption>
                            <div class="card-body">
                                <p class="card-title lead">
                                    <a href="{{ route('blog.detail',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                                        {{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}
                                    </a>
                                    <small>{{ $blog->created_at->format('M d, Y') }}</small>
                                    <p class="card-text">{!! \Illuminate\Support\Str::limit($blog->short_description, 100, '...') !!}</p>
                                    <p class="card-text">
                                        <small><i>by</i> {{ $blog->seller_name }}</small><br>
                                        <!-- <small><i>in</i> <a href="{{ url('/' . $blog->slug) }}" target="_blank" class="link-dark">{{ $blog->category_name }}</a></small> -->
                                    </p>
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('blog.detail',$blog->slug) }}" target="_self" type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Read Blog">Read</a>
                                </div>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </article>
        </div>
        @endforeach
    </div>
</section>
<!-- End Related Blogs -->

<section>
    <aside>
        <div class="row">
            <div class="col-12">
                <p class="text-center">Have questions or suggestions? <a href="{{ route('contact-us') }}">Contact Us</a></p>
            </div>
        </div>
    </aside>
</section>

@endsection
