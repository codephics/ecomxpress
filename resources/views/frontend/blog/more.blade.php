@extends('frontend.skeleton.body')
@section('content')
	<!-- Breadcrumb -->
	<section>
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog</li>
					</ol>
				</nav>
			</div>
		</div>
	</section>
	<!-- End Breadcrumb -->

	<!-- All Blogs -->
	<section>
		<div class="row">
			<div class="col-md-9">
				<div class="album py-5">
		            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-3">
		                @foreach ($blogs as $blog)
				        <div class="col-lg-6">
				            <article>
				                <figure>
				                    <div class="card shadow mb-5 rounded-3 no-border-card">
				                        <a href="{{ route('blog',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
				                            <img src="{{ asset('global/blog/image/featured/' . $blog->featured_image) }}" class="card-img-top" alt="...">
				                        </a>
				                        <figcaption>
				                            <div class="card-body">
				                                <ul class="d-flex list-unstyled mt-auto">
				                                  <li class="me-auto">
				                                    <a href="{{ route('blog',$blog->slug) }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</a>
				                                    <small>{{ $blog->created_at->format('M d, Y') }}</small>
				                                  </li>
				                                  <li class="d-flex align-items-center">
				                                    <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
				                                  </li>
				                                </ul>
				                            </div>
				                        </figcaption>
				                    </div>
				                </figure>
				            </article>
				        </div>
				        @endforeach
		            </div>
		        </div>
			</div>

			<div class="col-md-3 py-5">
				<div class="position-sticky" style="top: 2rem;">

					<!-- <div class="p-4">
						<h5>Archives</h5>
						<ol class="list-unstyled mb-0">
							<li><a href="#">March 2021</a></li>
							<li><a href="#">February 2021</a></li>
							<li><a href="#">January 2021</a></li>
							<li><a href="#">December 2020</a></li>
							<li><a href="#">November 2020</a></li>
							<li><a href="#">October 2020</a></li>
							<li><a href="#">September 2020</a></li>
							<li><a href="#">August 2020</a></li>
							<li><a href="#">July 2020</a></li>
							<li><a href="#">June 2020</a></li>
							<li><a href="#">May 2020</a></li>
							<li><a href="#">April 2020</a></li>
						</ol>
					</div> -->
					@if ($setting)
					<div class="p-4">
						<h5>Elsewhere</h5>

						<ol class="list-unstyled">
							@if ($setting->facebook_url)
						    <li><a href="{{ $setting->facebook_url }}" target="_blank">Facebook</a></li>
						    @endif
						    @if ($setting->twitter_url)
						    <li><a href="{{ $setting->twitter_url }}" target="_blank">Twitter</a></li>
						    @endif
						    @if ($setting->instagram_url)
						    <li><a href="{{ $setting->instagram_url }}" target="_blank">Instagram</a></li>
						    @endif
						    @if ($setting->linkedIn_url)
						    <li><a href="{{ $setting->linkedIn_url }}" target="_blank">LinkedIn</a></li>
						    @endif
						    @if ($setting->pinterest_url)
						    <li><a href="{{ $setting->pinterest_url }}" target="_blank">Pinterest</a></li>
						    @endif
						    @if ($setting->reddit_url)
						    <li><a href="{{ $setting->reddit_url }}" target="_blank">Reddit</a></li>
						    @endif
						    @if ($setting->tiktok_url)
						    <li><a href="{{ $setting->tiktok_url }}" target="_blank">Tiktok</a></li>
						    @endif
						    @if ($setting->whatsapp_url)
						    <li><a href="{{ $setting->whatsapp_url }}" target="_blank">Whatsapp</a></li>
						    @endif
						    @if ($setting->youtube_url)
						    <li><a href="{{ $setting->youtube_url }}" target="_blank">Youtube</a></li>
						    @endif
						    @if ($setting->quora_url)
						    <li><a href="{{ $setting->quora_url }}" target="_blank">Quora</a></li>
						    @endif
						    @if ($setting->snapchat_url)
						    <li><a href="{{ $setting->snapchat_url }}" target="_blank">Snapchat</a></li>
						    @endif
						    @if ($setting->telegram_url)
						    <li><a href="{{ $setting->telegram_url }}" target="_blank">Telegram</a></li>
						    @endif
						    @if ($setting->tumblr_url)
						    <li><a href="{{ $setting->tumblr_url }}" target="_blank">Tumblr</a></li>
						    @endif
						    @if ($setting->wechat_url)
						    <li><a href="{{ $setting->wechat_url }}" target="_blank">Wechat</a></li>
						    @endif
						</ol>
					</div>
					@endif
				</div>
			</div>
		</div>
	</section>
	<!-- End Blogs -->

@endsection