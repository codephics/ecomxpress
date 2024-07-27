	<section>
	    <header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					<ul class="navbar-nav">
						<li class="nav-item"><a class="navbar-brand fw-bold fs-4" href="{{ route('front.home') }}">EcomXpress</a></li>
						<li class="nav-item"><small>by <a href="https://codephics.com">codephics.com</a></small></li>
					</ul>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
						<ul class="navbar-nav">
							<li class="nav-item"><a href="{{ route('front.home') }}" class="nav-link">Home</a></li>
							<li class="nav-item"><a href="{{ route('item.shop') }}" class="nav-link">Shop</a></li>
							<li class="nav-item"><a href="{{ route('blog.more') }}" class="nav-link">Blog</a></li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									About Us
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="{{ route('about.overview') }}">Overview</a></li>
									<li><a class="dropdown-item" href="{{ route('about.brand') }}">Brand</a></li>
									<li><a class="dropdown-item" href="{{ route('about.license') }}">License</a></li>
								</ul>
							</li>
							<li class="nav-item"><a href="{{ route('contact-us') }}" class="nav-link">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
	</section>
