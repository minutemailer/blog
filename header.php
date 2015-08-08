<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<script>document.documentElement.className = '';</script>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header class="main-header">
			<div class="wrapper">
				<h1 class="main-header__logo logo">
					<?php echo TimeToMarket::logo(); ?>
				</h1>
				
				<?php $items = TimeToMarket::menu_items( 'main-nav' ); if ( $items ): ?>
				<nav class="nav main-header__nav">
					<?php foreach ( $items as $item ): ?>
					<?php endforeach; ?>
				</nav>
				<?php endif; ?>
			</div>
		</header>