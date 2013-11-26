<div class="content">
<?php if (have_posts() ) : ?>
	<?php if (is_search()) {
		echo '<h1 style="font-style:oblique">';
		printf( __( 'Search Results for: %s', 'newslist' ),
			'<span>' . get_search_query() . '</span>' );
		echo '</h1>';
	};
	if (is_tag()) {
		echo '<h1 style="font-style:oblique">';
		printf( __( 'Tag Archives: %s', 'newslist' ),
			'<span>' . single_tag_title( '', false ) . '</span>' );
		echo '</h1>';
	}; ?>

	<?php if(is_archive() || is_search()): ?>
		<?php if (have_posts()): ?>
			<div class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php while ( have_posts() ) : the_post(); ?>
					<h3><a href="<?php the_permalink(); ?>"
						title="<?php printf( esc_attr__( 'Permalink to %s', 'newslist' ),
							the_title_attribute( 'echo=0' ) ); ?>"
						rel="bookmark">
						<?php if (trim(get_the_title()) != '') {
							newslist_short_title(50);
						} else {
							echo '&nbsp;';
						}; ?>
						<span style="float:right">
							<?php echo " (".get_the_modified_time('Y-m-d H:i:s').")" ?>
						</span>
					</a></h3>
				<?php endwhile; ?>
				&nbsp;&nbsp;&nbsp;
			</div>
		<?php endif; ?>
	<?php else: ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php if (!is_single() && !is_page()): ?>
				<div class="col" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php else: ?>
				<div class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php endif; ?>

			<?php if (!is_single() && !is_page()): ?>
				<h1><a href="<?php the_permalink(); ?>"
					title="<?php printf( esc_attr__( 'Permalink to %s', 'newslist' ),
						the_title_attribute( 'echo=0' ) ); ?>"
					rel="bookmark">
					<?php if (trim(get_the_title()) != '') {
						newslist_short_title(50);
					} else {
						echo '&nbsp;';
					}; ?>
				</a></h1>
			<?php  else:?>
				<h1><a href="<?php the_permalink(); ?>"
					title="<?php printf( esc_attr__( 'Permalink to %s', 'newslist' ),
						the_title_attribute( 'echo=0' ) ); ?>"
					rel="bookmark">
					<?php if (trim(get_the_title()) != '') {
						the_title();
					} else {
						echo '&nbsp;';
					}; ?>
				</a></h1>
			<?php endif; ?>

			<?php if (!is_single() && !is_page()): ?>
				<div class="meta-cat">
					<?php the_category(', '); ?>
				</div>
			<?php  else:?>
				<div class="meta-cat1">
					<?php the_category(', '); ?>
				</div>
			<?php endif; ?>

			<div class="meta">
				<div class="meta-by">
					<?php _e('By', 'newslist'); ?>: <?php the_author_link(); ?>
				</div>
				<div class="meta-date">
					<?php the_time('F j Y'); ?>
					<?php the_time('G:i:s'); ?>
				</div>
			</div>

			<div class="post-content">
				<?php if (!is_single() && !is_page()):
					the_excerpt();
				else:
					the_content(); ?>
					<?php if (get_the_tag_list()) : ?>
						<div class="tags1">
							<?php _e('Tags', 'newslist'); ?>: <?php echo get_the_tag_list('',', ',''); ?>
						</div>
					<?php endif; ?>
					<?php if (!is_page()): ?>
						&nbsp;&nbsp;&nbsp;
						<hr color="#004276" ></hr>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' 
							. __( 'Pages:', 'newslist' ), 'after' => '</div>' ) ); ?>
						<?php previous_post_link('%link', __('<span class="meta-nav">&larr;</span>Older post')) ?>
						&nbsp;&nbsp;&nbsp;
						<?php next_post_link('%link ',__('Newer post <span class="meta-nav">&rarr;</span>')) ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<?php if (!is_single() && !is_page()): ?>
				<div class="readmore">
					<a href="<?php the_permalink() ?>#more"class="more-link">
						<?php _e('Read more', 'newslist'); ?>
					</a>
				</div>
				<div class="addcomment">
					<?php comments_popup_link( __( 'Leave a comment', 'newslist' ),
						__( '1 Comment', 'newslist' ), __( '% Comments', 'newslist' ) ); ?>
				</div>
				<?php if (get_the_tag_list()) : ?>
					<div class="tags">
						<?php _e('Tags', 'newslist'); ?>: <?php echo get_the_tag_list('',', ',''); ?>
					</div>
				<?php endif; ?>
			<?php else: ?>
			<?php endif; ?>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<div class="clear"></div>
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div id="nav-below" class="navigation">
			<?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'newslist' ) ); ?>
			&nbsp;&nbsp;&nbsp;
			<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'newslist' ) ); ?>
		</div>
	<?php endif; ?>
	<?php comments_template( '', true ); ?>

<?php else: ?>

	<?php if (is_search()): ?>
		<div class="post">
			<?php _e( 'Sorry but nothing matched your search criteria. '
				. 'Please try again with some different keywords.', 'newslist' ); ?>
		</div>
	<?php endif; ?>

<?php endif; ?>
</div>
