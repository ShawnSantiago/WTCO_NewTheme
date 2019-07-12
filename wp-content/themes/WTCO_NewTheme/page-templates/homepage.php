<?php
/**
 * Template Name: Homepage
 * 
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


<div id="full-width-page-wrapper">

    <div id="content">

        <!-- Header -->
        <?php 
            $post_id = $post->ID;
            $hero = get_field( 'hero', $post_id );
            $hero_banner_image = $hero['image'];
            $hero_banner_position = $hero['image_position'];
            $hero_banner_title = $hero['title'];
            $hero_banner_subtext = $hero['subtitle'];
            $hero_banner_button_link = $hero['button_link'];
            $hero_banner_button_text = $hero['button_text'];
        ?>
        <header class="masthead"
            style="background-image:url('<?php echo $hero_banner_image ?>');background-position: <?php echo $hero_banner_position ?>;">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in"><?php echo $hero_banner_title ?></div>
                    <div class="intro-heading text-uppercase"></div>
                    <li class="timeline-inverted" data-toggle="modal" href="#portfolioModal-timeline">
                 
                    <button class="btn btn-primary btn-xl text-uppercase" data-toggle="modal" href="#portfolioModal-timeline">
                    <?php echo $hero_banner_button_text ?>
                    </button>
                </div>
            </div>
        </header>

        <!-- Services -->
        <section class="page-section" id="services">
            <?php  
                
                    $site_services = get_field( 'services', $post_id );
                    $site_service_headline = $site_services['title'];
                    $site_service_subtitle = $site_services['subtitle'];
                    $site_service_cards = $site_services['service_cards'];
                    
                ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase"><?php echo $site_service_headline; ?></h2>
                        <h3 class="section-subheading text-muted"><?php echo $site_service_subtitle; ?></h3>
                    </div>
                </div>
                <div class="row text-center">
                    <?php
                        foreach ($site_service_cards as $cards){
                    ?>
                    <div class="col-md-<?php echo (12 /  count( $site_service_cards)) ?>">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas <?php echo $cards["icon"]; ?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading"></h4>
                        <p class="text-muted"><?php echo $cards["subtitle"]; ?></p>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>

        <!-- Portfolio Grid -->
        <section class="bg-light page-section" id="portfolio">
            <div class="container">
                <?php  
                    
                    $site_gallery = get_field( 'gallery_area', $post_id );
                    $site_gallery_blocks = $site_gallery['gallery'];
                ?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Our Sponsors</h2>
                        <h3 class="section-subheading text-muted"></h3>
                    </div>
                </div>

                <?php 
                    if( $site_gallery_blocks ): ?>
                <div class="row">
                    <?php foreach( $site_gallery_blocks as $key=>$block ): ?>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a href="http://<?php echo $block['alt']; ?>" class="portfolio-link">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="<?php echo $block['url']; ?>" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4><?php echo $block['title']; ?></h4>
                            <p class="text-muted"><?php echo $block['caption']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
    </div>
    </section>

    <!-- About -->
    <section class="page-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <?php  
                            $site_timeline = get_field( 'timeline_area', $post_id );
                            $site_timeline_blocks = $site_timeline['timeline'];
                        ?>
                        <?php foreach( $site_timeline_blocks as $key=>$block ): ?>
                        <li <?php if( $key % 2 ){ echo "class='timeline-inverted'";} ?>>
                            <div class="timeline-image">
                                <img class="rounded-circle img-fluid" src="<?php echo $block['url']; ?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4><?php echo $block['alt']; ?></h4>
                                    <h4 class="subheading"><?php echo $block['title']; ?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?php echo $block['caption']; ?></p>
                                    <a href="<?php echo $block['description']; ?>" target="_blank">Photos</a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <li class="timeline-inverted" data-toggle="modal" href="#portfolioModal-timeline">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                    <!-- Modal -->
                    <?php  
                        $site_timeline_current_e = $site_timeline['current_event'];
                        $timeline_title = $site_timeline_current_e['title'];
                        $timeline_subtitle = $site_timeline_current_e['subtitle'];
                        $timeline_image = $site_timeline_current_e['image'];
                        $timeline_date = $site_timeline_current_e['date'];
                    ?>
                    <div class="portfolio-modal modal fade" id="portfolioModal-timeline" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="modal-body">
                                                <!-- Project Details Go Here -->
                                                <h2 class="text-uppercase"><?php echo $timeline_title; ?></h2>
                                                <p class="item-intro text-muted"><?php echo $timeline_subtitle; ?></p>
                                                <img class="img-fluid d-block mx-auto"
                                                    src="<?php echo $timeline_image; ?>" alt="">
                                                <p><?php echo $description; ?></p>
                                                <ul class="list-inline">
                                                    <li>Date: <?php echo $timeline_date; ?></li>
                                                </ul>
                                                <div class="payment-area">
                                                    <div><span>Price :</span> $25</div>
                                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                        <input type="hidden" name="cmd" value="_s-xclick">
                                                        <input type="hidden" name="hosted_button_id" value="6EJSST92FRFXN">
                                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                    </form>
                                                </div>
                                               

                                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                    <i class="fas fa-times"></i>
                                                    Close </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="bg-light page-section" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                </div>
            </div>
            <div class="row">

                <?php 
                        $count = 1;
                        while( have_rows('team') ): the_row(); 
                        	
                        $image = get_sub_field('profile-baby');
                        $image2 = get_sub_field('profile-adult');
                        $position = get_sub_field('position');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                       

                    ?>
                <div class="col-sm-12 col-md-3">
                    <div class="team-member" data-toggle="modal" href="#portfolioModal-team-<?php echo $count ?> ">
                        <img class="mx-auto rounded-circle" src="<?php echo $image; ?>" alt="">
                        <img class="mx-auto rounded-circle profile-adult" src="<?php echo $image2; ?>" alt="">
                        <h4><?php echo $title; ?></h4>
                        <p class="text-muted"><?php echo $position; ?></p>
                    </div>
                </div>

                <!-- Modal -->
                <div class="portfolio-modal modal fade" id="portfolioModal-team-<?php echo $count ?>" tabindex="-1"
                    role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="modal-body">
                                            <!-- Project Details Go Here -->
                                            <h2 class="text-uppercase"><?php echo $title; ?></h2>
                                            <p class="item-intro text-muted"><?php echo $position; ?></p>
                                            <img class="img-fluid d-block mx-auto" src="<?php echo $image; ?>" alt="">
                                            <p><?php echo $description; ?></p>
                                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                                <i class="fas fa-times"></i>
                                                Close </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    $count++;
                    endwhile; ?>

            </div>
        </div>
    </section>

    <!-- Clients -->
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading text-uppercase">Past Sponsors</h2>
                    <h3 class="large text-muted section-subheading"></h3>
                </div>
            </div>
            <div class="owl-carousel">
                <?php 
                $pastsponsor = get_field( 'past_sponsor', $post_id );
                foreach( $pastsponsor as $key=>$block ): ?>
                <div class="owl-sliders">
                    <a href="<?php echo $block['description']; ?>">
                        <img class="img-fluid d-block mx-auto" src="<?php echo $block['sizes']['medium']; ?>" alt="">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="name" type="text" placeholder="Your Name *"
                                        required="required" data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" type="email" placeholder="Your Email *"
                                        required="required"
                                        data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"
                                        required="required"
                                        data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Your Message *"
                                        required="required"
                                        data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase"
                                    type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>