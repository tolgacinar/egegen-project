<main>
	<section id="hero-area">
		<div class="swiper-container mySwiper">
			<div class="swiper-wrapper">
				<?php foreach ($slides as $slide): ?>
					<div class="swiper-slide">
						<img src="<?php echo $slide->slide_image; ?>" alt="<?php echo $slide->slide_title; ?>">
					</div>
				<?php endforeach ?>
			</div>
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
	</section>
	<section id="about">
		<div class="container">
			<div class="row">
				<?php foreach ($contents as $content): ?>
					<div class="col">
						<h2><?php echo $content->content_title; ?></h2>
						<p><?php echo $content->content_text; ?></p>
						<a href="<?php echo base_url($content->s_url); ?>" class="btn btn-info text-white">Devamı</a>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	<section id="contents">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="contents-title d-flex justify-content-between align-items-center">
						<h2>Haberler</h2>
						<button class="btn more-btn" data-limit="3" data-offset="3"><i class="fas fa-plus"></i></button>
					</div>
					<div class="contents-list">
						<?php foreach ($news as $nws): ?>
							<div class="content d-flex mb-3">
								<div class="content-img flex-shrink-0">
									<img src="<?php echo $nws->news_image; ?>" alt="<?php echo $nws->news_title; ?>">
								</div>
								<div class="content-text py-2">
									<h3 class="content-title"><?php echo $nws->news_title; ?></h3>
									<p><?php echo $nws->news_content; ?></p>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
