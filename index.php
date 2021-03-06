<?php get_header(); ?>

		<div class="wrapper">
			<?php echo TimeToMarket::title(); ?>
		</div>

		<div class="articles">
			<div class="text-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
				<article class="articles__article">
					<?php the_title( sprintf( '<h1 class="articles__article__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
					<div class="meta"><!--<?php echo get_the_date(); ?>-->In the category <?php the_category( ', ' ); ?></div>

					<?php TimeToMarket::featuredImage(); ?>

					<div class="articles__article__body">
						<?php the_excerpt(); ?>
						<p><a href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'timetomarket' ); ?></a></p>
					</div>
				</article>
				<?php endwhile; ?>
			</div>
		</div>

		<?php

			global $wp_query;
			$max_pages = $wp_query->max_num_pages;

			if ( $max_pages > 1 ):

		?>
		<div class="pagination">
			<?php next_posts_link( __( 'Older posts', 'timetomarket' ), $max_pages ); ?><?php previous_posts_link( __( 'Newer posts', 'timetomarket' ) ); ?>
		</div>
		<?php endif; ?>

<?php get_footer(); ?>