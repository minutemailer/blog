<?php get_header(); ?>

		<article class="article">
			<div class="text-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="article__title"><?php the_title(); ?></h1>
				<div class="meta"><?php echo get_the_date(); ?> <?php the_category( ', ' ); ?></div>

				<?php TimeToMarket::featuredImage(); ?>

				<div class="articles__article__body">
					<?php the_content(); ?>
				</div>
				<?php endwhile; ?>
			</div>
		</article>

<?php get_footer(); ?>