<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page_title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
	/* logo ayarı */

	.header .navbar-brand {
		margin-right: 50px;
	}

	#hero-area {
		width: 100%;
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

	.carousel-item {
		height: 600px;
	}
	.carousel-item img {
		object-fit: cover;
		height: 100%;
		width: 100%;
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

	/* Content Alanı */
	
	section#breadcrumbs {
		padding: 0;
		background-color: #ddd;
	}

	section#breadcrumbs .breadcrumb {
		margin-top: 1rem;
	}

	section#content-area .content-image {
		width: 100%;
		height: 500px;
		margin-bottom: 40px;
	}

	section#content-area .content-image img {
		width: 100%;
		height: 100%;
		object-fit: cover;
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
				<a class="navbar-brand" href="<?php echo base_url(); ?>">Logo</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="main_nav">
					<ul class="navbar-nav">
						<?php foreach ($menus as $menu): ?>
							<li class="nav-item <?php echo $menu->children ? "dropdown" : ""; ?>">
								<a class="nav-link <?php echo $menu->children ? "dropdown-toggle" : ""; ?>" <?php echo $menu->children ? "data-bs-toggle=\"dropdown\"" : ""; ?> href="<?php echo base_url($menu->menu_href); ?>"><?php echo $menu->menu_title; ?></a>
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