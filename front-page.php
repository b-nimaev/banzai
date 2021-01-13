<?php get_header() ?>
	<main>
		<section id="categories">
			<div class="container">
				<h2 class="section-heading">Категории</h2>

				<button class="toggler">
					<span></span>
					<span></span>
					<span></span>
				</button>

				<ul class="category-list">
					<?php

						$terms = get_terms( array(
								'taxonomy' => array('product_cat')
							) );

						foreach ($terms as $key => $name) {
						?>
							<!-- <li><a class="active" href="javascript:void(0)">Салаты</a></li> -->
							<li><a class="<?php if ($key == 1) { echo "active"; } ?>" href="javascript:void(0)"><?php echo($name->name) ?></a></li>

						<?php
						}

					 ?>

				</ul>

				<div class="row mb-4 justify-content-center">

					<?php

						$args = array(
							'post_type' => 'product',
							'posts_per_page' => -1,
							'orderby' =>  'date',
							'order' =>  'ASC'
						);

						$query = new WP_Query( $args );

						while ( $query->have_posts() ) {
							$query->the_post();
							$post = $query->post;
							$id = $post->id;

						?>

					<div class="m-auto col-9 m-md-0 col-md-6 col-lg-3">
						<article id="post-<?php the_ID(); ?>">
							<img src="<?php echo(get_template_directory_uri())?>/icons/group.png" alt="">
							<a class="cats" href="javascript:void(0)">Салаты</a>
							<a href="javascript:void(0)"><h4 class="heading"><?php echo the_title(); ?></h4></a>
							<p class="description">Описание китайского салата максимум 2 строчки</p>

							<div class="price">
								<h5><?php print_r($product->get_price_html()) ?></h5>
							</div>
							<div class="row">
								<div class="col-6">
									<?php woocommerce_quantity_input(); ?>
								</div>
								<a href="javascript:void(0)" class="col update-basket">
									<img src="<?php echo(get_template_directory_uri()) ?>/img/add_to_cart.png" alt="">
								</a>
							</div>
							<a href="javascript:void(0)" class="btn btn-ordered">Купить</a>
						</article>
					</div>

						<?php

						}

						wp_reset_postdata();

					?>
				</div>
				<button class="btn btn-red">Посмотреть все салаты</button>
			</div>
		</section>

		<section id="advantages">
			<div class="container">
				<h2 class="section-heading">Преимущества</h2>
				<div class="row">
					<div class="col-md-6 col-lg-3"><article><img src="<?php echo(get_template_directory_uri())?>/icons/1i.png" alt=""><p>20 лет на рынке</p></article></div>
					<div class="col-md-6 col-lg-3"><article><img src="<?php echo(get_template_directory_uri())?>/icons/2i.png" alt=""><p>Банкетный зал</p></article></div>
					<div class="col-md-6 col-lg-3"><article><img src="<?php echo(get_template_directory_uri())?>/icons/3i.png" alt=""><p>Центр города</p></article></div>
					<div class="col-md-6 col-lg-3"><article><img src="<?php echo(get_template_directory_uri())?>/icons/4i.png" alt=""><p>Доставка/самовывоз</p></article></div>
				</div>
			</div>
		</section>

		<section id="stocks">
			<div class="container">
				<h2 class="section-heading">Акции</h2>
				<div class="slider">
					<article>
						<h2>Блюда на компанию</h2>
						<button class="btn btn-red">ПРИМЕНИТЬ АКЦИЮ</button>
					</article>
				</div>
			</div>
		</section>

		<section id="contacts">
			<div class="container">
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6">

						<div class="row mb-5">
							<div class="col-md-6"><?php get_template_part('icons/logotype') ?></div>
							<div class="col-md-6 d-flex">
								<div class="socials my-auto">
									<ul>
										<li><a href="javascript:void(0)"><?php get_template_part('icons/vk') ?></a></li>
										<li><a href="javascript:void(0)"><?php get_template_part('icons/inst') ?></a></li>
										<li><a href="javascript:void(0)"><?php get_template_part('icons/ok') ?></a></li>
										<li><a href="javascript:void(0)"><?php get_template_part('icons/tg') ?></a></li>
										<li><a href="javascript:void(0)"><?php get_template_part('icons/viber') ?></a></li>
										<li><a href="javascript:void(0)"><?php get_template_part('icons/whatsap') ?></a></li>
									</ul>
								</div>
							</div>
						</div>
						<!-- end header contacts -->

						<div class="row address">
							<div class="col-md-6">
								<h4>Наш адрес:</h4>
								<p>г. Улан-Удэ, пр. 50 лет Октября, 8а</p>
							</div>
							<div class="col-md-6">
								<h4>Клиентам</h4>
								<ul>
									<li><a href="javascript:void(0)">Политика сайта</a></li>
									<li><a href="javascript:void(0)">Доставка и оплата</a></li>
									<li><a href="javascript:void(0)">О нас</a></li>
								</ul>
							</div>
							<div class="col-md-12">
								<h4>Работаем для Вас:</h4>
								<ul>
									<li>вс-чт 11:00 - 24:00</li>
									<li>пт-сб 11:00 - 02:00</li>
								</ul>
							</div>
						</div>

						<a href="tel:83012440741" class="tel">
							<img src="<?php echo(get_template_directory_uri()) ?>/icons/phone.png" alt="">
							<span>44 07 41</span>
						</a>

					</div>
				</div>
			</div>
		</section>

	</main>

<?php get_footer() ?>
