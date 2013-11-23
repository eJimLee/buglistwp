<?php get_header(); ?>

<?php //echo "is_search:", is_search(), " is_category:", is_category() ?>
<?php echo "in archive" ?>
<div class="content">
	<?php if ( have_posts() ) the_post(); ?>
	<h1 class="title">
		<?php if ( is_day() ) : ?>
			<?php printf( __( 'Daily Archives: <span>%s</span>', 'newslist' ), get_the_date() ); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( __( 'Monthly Archives: <span>%s</span>', 'newslist' ), get_the_date( 'F Y' ) ); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( __( 'Yearly Archives: <span>%s</span>', 'newslist' ), get_the_date( 'Y' ) ); ?>
		<?php elseif ( is_category() ) : ?>
			<?php printf( __( 'Category Archives: <span>%s</span>', 'newslist' ), single_cat_title('', false) ); ?>
		<?php else : ?>
			<?php _e( 'Archives', 'newslist' ); ?>
		<?php endif; ?>
	</h1>

	<?php rewind_posts();
		 get_template_part( 'loop', 'archive' ); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
