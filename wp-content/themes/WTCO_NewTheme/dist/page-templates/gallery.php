<?php
/**
 * Template Name: Gallery Page Template
 *
 * Template for displaying a Gallery page.
 *
 * @package understrap
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<!-- Required Core Stylesheet -->

	<div class="slider-container">
		<div class="slider-main">
			<?php 
			$pastsponsor = get_field( 'gallery', $post_id );
			foreach( $pastsponsor as $key=>$block ): ?>
				<div class="slide">
					<img class="img-fluid d-block mx-auto" src="<?php echo $block['sizes']['large']; ?>" alt="">
				</div>
			<?php endforeach; ?>
		</div>
		<div class="slider-nav">
			<?php 
			foreach( $pastsponsor as $key=>$block ): ?>
				<div class="slide">
					<img class="img-fluid d-block mx-auto" src="<?php echo $block['sizes']['thumbnail']; ?>" alt="">
				</div>
			<?php endforeach; ?>
		</div>
	</div>

<?php get_footer(); ?>