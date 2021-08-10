<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page_title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
	/* logo ayarı */

	.header .navbar-brand {
		margin-right: 50px;
	}

	/* Menü */

	/* ============ desktop view ============ */
	@media all and (min-width: 992px) {

		.dropdown-menu li{
			position: relative;
		}
		.dropdown-menu .submenu{ 
			display: none;
			position: absolute;
			left:100%; top:-7px;
		}
		.dropdown-menu .submenu-left{ 
			right:100%; left:auto;
		}

		.dropdown-menu > li:hover{ background-color: #f1f1f1 }
		.dropdown-menu > li:hover > .submenu{
			display: block;
		}
	}	
	/* ============ desktop view .end// ============ */

	/* ============ small devices ============ */
	@media (max-width: 991px) {

		.dropdown-menu .dropdown-menu{
			margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
		}

	}	
	/* ============ small devices .end// ============ */

	/* Genel Boyutlar */

	section h2 {
		font-size: 1.6rem;
	}

	h3 {
		font-size: 1.3rem;
	}

	section:not(:first-child) {
		padding: 40px 0px;
	}

	/* Hakkımızda Bölümü */

	

	/* Anasayfa slider ayarları */

	.swiper-container {
		width: 100%;
		height: 500px;
	}

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

	.swiper-slide img {
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	/* Content Stilleri */

	.content {
		gap: 20px;
	}

	.content-img {
		width: 300px;
		height: 200px;
	}

	.content-img img {
		object-fit: cover;
		display: block;
		width: 100%;
		height: 100%;
	}

	/* Footer */
	footer.footer {
		height: 50px;
	}

</style>
</head>
<body>
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Logo</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="main_nav">
					<ul class="navbar-nav">
						<?php foreach ($menus as $menu): ?>
							<li class="nav-item <?php echo $menu->children ? "dropdown" : ""; ?>">
								<a class="nav-link <?php echo $menu->children ? "dropdown-toggle" : ""; ?>" <?php echo $menu->children ? "data-bs-toggle=\"dropdown\"" : ""; ?> href="#"><?php echo $menu->menu_title; ?></a>
								<?php if ($menu->children): ?>
									<ul class="dropdown-menu">
										<?php foreach ($menu->children as $child): ?>
											<li><a class="dropdown-item" href="#"><?php echo $child->menu_title; ?></a></li>
										<?php endforeach ?>
									</ul>
								<?php endif ?>
							</li>
						<?php endforeach ?>
					</ul>
				</div> <!-- navbar-collapse.// -->
			</div> <!-- container-fluid.// -->
		</nav>
	</header>
	<main>
		<section id="hero-area">
			<div class="swiper-container mySwiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img src="https://dummyimage.com/1920x700/000/fff" alt="">
					</div>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</section>
		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col">
						<h2>İzmir Hakkında</h2>
						<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat commodi, dicta! Placeat ab non quis quos veritatis, distinctio, assumenda aspernatur temporibus id odio ipsum esse repellendus error doloremque quo enim!</p>
						<a href="#" class="btn btn-info text-white">Devamı</a>
					</div>
				</div>
			</div>
		</section>
		<section id="contents">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="contents-title d-flex justify-content-between align-items-center">
							<h2>Haberler</h2>
							<a href="#" class="btn"><i class="fas fa-plus"></i></a>
						</div>
						<div class="contents-list">
							<div class="content d-flex">
								<div class="content-img flex-shrink-0">
									<img src="https://dummyimage.com/600x400/000/fff" alt="">
								</div>
								<div class="content-text py-2">
									<h3 class="content-title">Deneme Duyuru 1</h3>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Aliquid ea libero, quos eveniet sint iusto corrupti voluptatem perspiciatis debitis quod pariatur consequatur molestiae quaerat voluptatum optio, hic, sequi eum quisquam?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae pariatur fuga laudantium quisquam reprehenderit sapiente suscipit, est, maxime perferendis, ut atque. Vel accusantium, voluptates incidunt, totam ullam a pariatur eos?</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<footer class="footer py-2">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer-content d-flex justify-content-between align-items-center">
						<span>© Egegen</span>
						<span>Logo</span>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper(".mySwiper", {
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
	});
</script>
</html>