
	<main>
		<section id="breadcrumbs">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<nav aria-label="breadcrumb">
							<?php echo $breadcrumb ?>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<section id="content-area">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="content-image">
							<img src="<?php echo base_url($content->content_image); ?>" alt="<?php echo $content->content_title; ?>">
						</div>
						<h1><?php echo $content->content_title ?></h1>
						<?php echo $content->content_text; ?>
					</div>
				</div>
			</div>
		</section>
	</main>