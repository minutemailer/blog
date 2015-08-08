		</div>

		<div class="company">
			<h1 class="seo-only"><?php bloginfo( 'name' ); ?></h1>

			<header class="main-header">
				<div class="wrapper">
					<div class="main-header__logo logo">
						<?php echo TimeToMarket::logo(); ?>
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
		</div>

		<?php wp_footer(); ?>
	</body>

</html>