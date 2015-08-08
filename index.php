<?php get_header(); ?>

		<?php $description = get_bloginfo( 'description' ); if ( $description && strlen( $description ) > 0 ): ?>
		<div class="wrapper">
			<h1 class="section-title"><?php echo $description; ?></h1>
		</div>
		<?php endif; ?>

		<div class="articles">
			<div class="text-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
				<article class="articles__article">
					<h1 class="articles__article__title"><?php the_title(); ?></h1>
					<div class="articles__article__meta"><?php echo get_the_date(); ?> <?php the_category( ', ' ); ?></div>

					<div class="featured-image"><img class="featured-image__img" src="http://placehold.it/700x250"></div>

					<div class="articles__article__body">
						<?php the_excerpt(); ?>
						<p><a href="/">Read more</a></p>
					</div>
				</article>
				<?php endwhile; ?>
			</div>
		</div>

<?php get_footer(); ?>