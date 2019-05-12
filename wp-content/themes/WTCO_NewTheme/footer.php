<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
<!-- Footer -->
<footer class="footer">
    <?php 
            $post_id = $post->ID;
            
            $footer_copyright = get_field( 'copyright', $post_id );
            
            $footer_social = get_field( 'social', $post_id );

            $footer_facebook = $footer_social['facebook'];
            $footer_facebook_url = $footer_facebook['url'];
            $footer_facebook_icon = $footer_facebook['icon'];
            $footer_facebook_textarea = $footer_facebook['text_area'];

            $footer_instagram = $footer_social['instagram'];
            $footer_instagram_url = $footer_instagram['url'];
            $footer_instagram_icon = $footer_instagram['icon'];
            $footer_instagram_textarea = $footer_instagram['text_area'];


        ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright"><?php echo $footer_copyright ?></span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                        <a href="<?php echo $footer_instagram_url ?>">
                            <i class="fab <?php echo $footer_instagram_icon ?>"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo $footer_facebook_url ?>">
                            <i class="fab <?php echo $footer_facebook_icon ?>"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                    <li class="list-inline-item">
                        <a data-toggle="modal" href="#portfolioModal-privacy_policy">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a data-toggle="modal" href="#portfolioModal-timeline">Terms of Use</a>
                    </li>
                </ul>
            </div>
            <?php  
                $footer_privacy_policy= get_field( 'privacy_policy', $post_id );
                $footer_privacy_policy_text = $footer_privacy_policy['text'];
                $footer_privacy_policy_text_area = $footer_privacy_policy['text_area'];
            ?>
            <div class="portfolio-modal modal fade" id="portfolioModal-privacy_policy" tabindex="-1" role="dialog"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h2 class="text-uppercase"><?php echo $footer_privacy_policy_text; ?></h2>
                                        <p><?php echo $footer_privacy_policy_text_area; ?></p>
                                        <button class="btn btn-primary" data-dismiss="modal" type="button">
                                            <i class="fas fa-times"></i>
                                            Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>