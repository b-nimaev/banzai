<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package banzai
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
	<div class="headertop">
		<div class="container d-flex justify-content-between">
			<div class="address">
				<a href="javascript:void(0)">г. Улан-Удэ, пр. 50 лет Октября, 8а</a>
			</div>
			<div class="socials">
				<ul>
					<li><a href="javascript:void(0)"><img src="<?php echo(get_template_directory_uri()) ?>/img/socials/vk.png" alt="vk"></a></li>
					<li><a href="javascript:void(0)"><img src="<?php echo(get_template_directory_uri()) ?>/img/socials/inst.png" alt="inst"></a></li>
					<li><a href="javascript:void(0)"><img src="<?php echo(get_template_directory_uri()) ?>/img/socials/ok.png" alt="ok"></a></li>
					<li><a href="javascript:void(0)"><img src="<?php echo(get_template_directory_uri()) ?>/img/socials/tg.png" alt="tg"></a></li>
					<li><a href="javascript:void(0)"><img src="<?php echo(get_template_directory_uri()) ?>/img/socials/viber.png" alt="viber"></a></li>
					<li><a href="javascript:void(0)"><img src="<?php echo(get_template_directory_uri()) ?>/img/socials/whatsap.png" alt="whatsap"></a></li>
				</ul>
			</div>
		</div>
	</div>

	<header>
		<nav>
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-4 col-sm-5 col-5 d-flex">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
							<?php get_template_part('icons/logotype') ?>
						</a>
						<!-- the_custom_logo(); -->
					</div>

					<div class="col menu">
						<div class="collapse">
							<?php
								wp_nav_menu( [
									'theme_location'  => 'menu',
									'container'       => false,
									'menu_class'      => 'navbar-nav',
									'menu_id'         => 'header_menu',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'walker'          => new My_Walker_Nav_Menu(),
								] );
							?>

							<div class="links">
								<a href="#">Вход</a> / <a href="#">Регистрация</a>
								<img src="<?php echo(get_template_directory_uri()) ?>/img/Union.png" alt="">
							</div>

							<a class="basket" href="javascript:void(0)">
								<img src="<?php echo(get_template_directory_uri()) ?>/img/basket.png" alt="">
								<span class="cart_counter">0</span>
							</a>

							<div class="mini-cart-wrapper">
								<?php woocommerce_mini_cart( [ 'list_class' => 'my-css-class' ] ); ?>
							</div>

							<a href="tel:+73012440741" class="call btn btn-primary">
								<?php get_template_part('icons/phone-call') ?>
								<span>8 (3012) 44-07-41</span>
							</a>
						</div>



						<button class="toggler">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
		</nav>

		<nav class="nav-hidden">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-4 col-sm-5 col-5 d-flex">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
							<?php get_template_part('icons/logotype') ?>
						</a>
						<!-- the_custom_logo(); -->
					</div>

					<div class="col menu">
						<div class="collapse">
							<?php
								wp_nav_menu( [
									'theme_location'  => 'menu',
									'container'       => false,
									'menu_class'      => 'navbar-nav',
									'menu_id'         => 'header_menu',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'walker'          => new My_Walker_Nav_Menu(),
								] );
							?>

							<div class="links">
								<a href="#">Вход</a> / <a href="#">Регистрация</a>
								<img src="<?php echo(get_template_directory_uri()) ?>/img/Union.png" alt="">
							</div>

							<a class="basket" href="javascript:void(0)">
								<img src="<?php echo(get_template_directory_uri()) ?>/img/basket.png" alt="">
								<span class="cart_counter">0</span>
							</a>
							<div class="mini-cart-wrapper">
								<?php woocommerce_mini_cart( [ 'list_class' => 'my-css-class' ] ); ?>
							</div>

							<a href="tel:+73012440741" class="call btn btn-primary">
								<?php get_template_part('icons/phone-call') ?>
								<span>8 (3012) 44-07-41</span>
							</a>
						</div>



						<button class="toggler">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
		</nav>

		<div class="container inner">
			<div class="row">
				<div class="col-xl-5">
					<h1>Вкус как искусство</h1>
					<p>Доставка китайской кухни от кафе Банзай, широкий выбор китайской еды.</p>

					<button class="btn btn-red">Посмотреть меню</button>
				</div>
			</div>
		</div>

	</header>
