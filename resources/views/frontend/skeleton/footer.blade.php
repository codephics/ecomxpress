		<footer class="container">
			<!-- Subscription -->
			<div class="row py-3 border border-start-0 border-end-0">
				<div class="col-md-8">
					<h6 class="display-6">Stay Ahead, Stay Informed</h6>
					<p>Subscribe to our newsletter for the latest updates, new features, and exclusive insights. Elevate your web solutions with our continuous innovations.</p>
				</div>
				
				<div class="col-md-4 align-self-center">
					<form class="row g-3 float-end needs-validation" method="POST" action="{{ route('subscriber.new.front') }}" novalidate>
						@csrf
						<div class="col-auto">
							<label for="staticEmail2" class="visually-hidden"></label>
							<input type="email" class="form-control" name="email" placeholder="name@example.com" required />
						    <div class="valid-feedback">
						      Looks good!
						    </div>
						</div>
						<div class="col-auto">
							<button type="submit" class="btn btn-primary mb-3">Subscribe Now</button>
						</div>
					</form>
				</div>
			</div>
			<!-- Bottom Menu -->
			<div class="row py-3 border border-start-0 border-top border-end-0">
				<div class="col-12">
					<nav class="nav">
						<a class="nav-link" href="{{ route('privacy-policy') }}">Privacy Policy</a>
						<a class="nav-link" href="{{ route('terms-of-service') }}">Terms of Service</a>
						<a class="nav-link" href="{{ route('about.license') }}">Licenses</a>
						<a class="nav-link" href="{{ route('sitemap') }}">Sitemap</a>
					</nav>
				</div>
			</div>
			<div class="row py-3">
				<div class="col-8">
					<details class="mb-3">
						<summary>{{ now()->format('Y') }} © Codephics. All Rights Reserved.</summary>
						<p>All content and graphics on this web site are the property of Codephics.</p>
					</details>
					<nav class="nav">
						<a href="https://twitter.com/codephics" title="Twitter" target="_blank" rel="nofollow" class="link-dark"><i class="fa-brands fa-twitter ms-2"></i></a>
						<a href="https://facebook.com/codephics" title="Facebook" target="_blank" rel="nofollow" class="link-dark"><i class="fa-brands fa-facebook ms-2"></i></a>
						<a href="https://github.com/codephics" title="Github" target="_blank" rel="nofollow" class="link-dark"><i class="fa-brands fa-github ms-2"></i></a>
						<a href="https://stackoverflow.com/users/22997964/codephics" title="Stack Overflow" target="_blank" rel="nofollow" class="link-dark"><i class="fa-brands fa-stack-overflow ms-2"></i></a>
						<a href="https://instagram.com/codephics" title="Instagram" target="_blank" rel="nofollow" class="link-dark"><i class="fa-brands fa-instagram ms-2"></i></a>
					</nav>
				</div>
				<div class="col-4">
					<p class="float-end"><a href="#">Back to top</a></p>
				</div>
			</div>
		</footer>