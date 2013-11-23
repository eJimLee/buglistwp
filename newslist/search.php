<?php get_header(); ?>

<?php //echo "is_search:", is_search(), " is_category:", is_category() ?>
<div class="content">
	<?php if ( have_posts() ) : ?>
		<?php get_template_part( 'loop', 'search' ); ?>
	<?php else : ?>
		<div class="post" >
			<?php _e( 'Sorry, but nothing matched your search criteria. '
				. 'Please try again with some different keywords.', 'newslist' ); ?>
		</div>
	<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
