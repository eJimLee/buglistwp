<?php get_header(); ?>

<div class="content">
	<div class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="title">
			The Latest
		</h1>
		<?php $myposts=get_posts('numberposts=20'); ?>
		<?php //foreach($myposts as $post): setup_postdata($post); ?>
		<?php foreach($myposts as $post): ?>
			<h3><a href="<?php the_permalink(); ?>"
				title="<?php printf( esc_attr__( 'Permalink to %s', 'newslist' ),
					the_title_attribute( 'echo=0' ) ); ?>"
				rel="bookmark">
				<?php if (trim(get_the_title()) != '') {
					newslist_short_title(80);
				} else {
					echo '&nbsp;';
				}; ?>
				<span style="float:right"><?php echo " (".get_the_modified_time('Y-m-d H:i:s').")" ?></span>
			</a></h3>
		<?php //endforeach; wp_reset_postdata(); ?>
		<?php endforeach; ?>
	</div>

	<?php $args=array('parent' => 0); ?>
	<?php $categories=get_categories($args); ?>
	<?php foreach($categories as $category): ?>
		<?php if($category->cat_ID != 1): ?>
			<div class="col" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><a href="<?php echo get_category_link($category->cat_ID) ?>"
					title="<?php printf( esc_attr__( 'Permalink to %s', 'newslist' ),
						$category->name); ?>"
					rel="bookmark">
					<?php echo $category->name; ?>
				</a></h1>
				<?php $args=array('numberposts' => 7, 'category' => $category->cat_ID, 'orderby' => 'ID'); ?>
				<?php $myposts=get_posts($args); ?>
				<?php //foreach($myposts as $post): setup_postdata($post); ?>
				<?php foreach($myposts as $post): ?>
					<h3><a href="<?php the_permalink(); ?>"
						title="<?php printf( esc_attr__( 'Permalink to %s', 'newslist' ),
							the_title_attribute( 'echo=0' ) ); ?>"
						rel="bookmark">
						<?php if (trim(get_the_title()) != '') {
							newslist_short_title(43);
						} else {
							echo '&nbsp;';
						}; ?>
					</a></h3>
				<?php //endforeach; wp_reset_postdata(); ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
