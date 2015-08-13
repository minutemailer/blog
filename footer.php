		</div>

		<div class="company">
			<h1 class="seo-only"><?php echo get_option( 'ttm_company_name' ); ?></h1>

			<header class="main-header">
				<div class="wrapper">
					<div class="main-header__logo">
						<div class="logo">
							<?php echo TimeToMarket::logo(); ?>
						</div>
						<?php if ( ! TimeToMarket::is_startpage() ) echo TimeToMarket::blog_home_link(); ?>
					</div>
					
					<?php $items = TimeToMarket::menu_items( 'primary' ); if ( $items ): ?>
					<nav class="main-header__nav">
						<?php foreach ( $items as $item ): ?>
							<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>" class="main-header__nav__item btn <?php echo implode( ' ', $item->classes ); ?>"><?php echo $item->post_title; ?></a>
						<?php endforeach; ?>
					</nav>
					<?php endif; ?>
				</div>
			</header>

			<footer class="main-footer">
				<div class="wrapper">
					<div class="main-footer__columns">
						<div class="main-footer__columns__column">
							<?php $menu = TimeToMarket::get_menu( 'footer-1' ); if ( $menu ): ?>
							<strong class="main-footer__columns__column__title"><?php echo $menu->name; ?></strong>

							<ul class="main-footer__columns__column__links">
								<?php $items = wp_get_nav_menu_items( $menu ); foreach ( $items as $item ): ?>
								<li class="main-footer__columns__column__links__link"><a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"><?php echo $item->post_title; ?></a></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
						</div>
						<div class="main-footer__columns__column">
							<?php $menu = TimeToMarket::get_menu( 'footer-2' ); if ( $menu ): ?>
							<strong class="main-footer__columns__column__title"><?php echo $menu->name; ?></strong>

							<ul class="main-footer__columns__column__links">
								<?php $items = wp_get_nav_menu_items( $menu ); foreach ( $items as $item ): ?>
								<li class="main-footer__columns__column__links__link"><a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"><?php echo $item->post_title; ?></a></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
						</div>
						<div class="main-footer__columns__column">
							<?php $menu = TimeToMarket::get_menu( 'footer-3' ); if ( $menu ): ?>
							<strong class="main-footer__columns__column__title"><?php echo $menu->name; ?></strong>

							<ul class="main-footer__columns__column__links">
								<?php $items = wp_get_nav_menu_items( $menu ); foreach ( $items as $item ): ?>
								<li class="main-footer__columns__column__links__link"><a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"><?php echo $item->post_title; ?></a></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
						</div>
						<div class="main-footer__columns__column">
							<div class="logo">
								<?php echo TimeToMarket::logo(); ?>
							</div>
							<p class="main-footer__copyright">© <?php echo get_option( 'ttm_company_name' ); ?> <?php echo date( 'Y' ); ?>.<br> All rights reserved.</p>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<?php wp_footer(); ?>
	</body>

</html>