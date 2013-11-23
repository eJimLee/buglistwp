<?php get_header(); ?>

<?php
	if( is_home() {
		get_template_part('home');
	}else{
		get_template_part('loop');
	}
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
