<div id="comments">

<?php if ( post_password_required() ) : ?>
	<p class="nopassword">
		<?php _e( 'This post is password protected. '
		. 'Enter the password to view any comments.', 'newslist' ); ?>
	</p>
	<?php echo '</div>' ?>
<?php
	return;
	endif;
?>

<?php if ( have_comments() ) : ?>
	<h3 id="comments-title"><?php
		printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'newslist' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?>
	</h3>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="navigation">
			<div class="nav-previous">
				<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> '
					. 'Older Comments', 'newslist' ) ); ?>
			</div>
			<div class="nav-next">
				<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'newslist' ) ); ?>
			</div>
		</div>
		<?php endif; ?>
		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'newslist_comment' ) );
			?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			// Are there comments to navigate through? ?>
			<div class="navigation">
				<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'newslist' ) ); ?>
				&nbsp;&nbsp;&nbsp;
				<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'newslist' ) ); ?>
			</div>
		<?php endif; ?>

	<?php else : ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="nocomments">
				<?php _e( 'Comments are closed.', 'newslist' ); ?>
			</p>
		<?php endif;  ?>

	<?php endif; ?>

<?php comment_form(); ?>

</div>
