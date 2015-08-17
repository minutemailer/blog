<?php get_header(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>
			<div class="text-wrapper">
				<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="article__title"><?php the_title(); ?></h1>
				<div class="meta"><!--<?php echo get_the_date(); ?>-->In the category <?php the_category( ', ' ); ?></div>

				<?php TimeToMarket::featuredImage(); ?>

				<div class="articles__article__body">
					<?php the_content(); ?>
				</div>

				<figure class="author">
					<div class="author__photo">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 65, NULL, '', ['class' => 'author__img'] ); ?>
					</div>

					<div class="author__content">
						<strong class="author__name"><?php the_author(); ?></strong>
						<div class="author__bio">
							<?php echo apply_filters( 'the_content', get_the_author_meta( 'description' ) ); ?>
						</div>

						<figcaption class="author__caption">
							<a class="author__more" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo sprintf( __( 'View all posts by %s', 'timetomarket' ), get_the_author() ); ?></a>
						</figcaption>
					</div>
				</figure>
				<?php endwhile; ?>
			</div>
		</div>

<?php get_footer(); ?>