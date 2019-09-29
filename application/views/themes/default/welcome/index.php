<main role="main">

	<section class="jumbotron text-center" style="background:url('https://backgrounddownload.com/wp-content/uploads/2018/09/full-width-background-image-responsive-6.jpg')">
		<div class="container">
			<!--<h1 class="jumbotron-heading">Album example</h1>
			<p class="lead text-muted"> </p>
			<p>
				<a href="#" class="btn btn-primary my-2">Main call to action</a>
				<a href="#" class="btn btn-secondary my-2">Secondary action</a>
			</p>-->
		</div>
	</section>

	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
	<?php foreach($ads as $ad): ?>
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm">
						<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
							<title><?php echo $ad['title']; ?></title>
							<rect width="100%" height="100%" fill="#76BA1B" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
						</svg>
						<div class="card-body">
							<p class="card-text">
								This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
							</p>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
									<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
								</div>
								<small class="text-muted">9 mins</small>
							</div>
						</div>
					</div>
				</div>
<?php endforeach;?>
			</div>
		</div>
	</div>
</main>