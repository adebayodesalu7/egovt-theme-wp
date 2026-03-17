<?php
/**
 * The template for displaying the footer
 *
 * @package EGovt
 */
?>
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="social-links">
                    <span><?php _e('Connect With Us', 'egovt'); ?></span>
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-about">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" rel="home">
                            <?php if (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <div class="logo-icon">
                                    <i class="fas fa-landmark"></i>
                                </div>
                                <span class="logo-text"><?php bloginfo('name'); ?></span>
                            <?php endif; ?>
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html(get_theme_mod('egovt_address', '95 FF3, App Street Avenue, NSW 96209, Canada')); ?></p>
                        <p><i class="far fa-clock"></i> <?php _e('Opening Hours:', 'egovt'); ?><br><?php echo esc_html(get_theme_mod('egovt_hours', 'Mon - Fri: 8:00 am - 6:00 pm')); ?></p>
                        <p><i class="fas fa-phone"></i> <?php _e('Phone:', 'egovt'); ?> <?php echo esc_html(get_theme_mod('egovt_phone', '1800 123 4567')); ?></p>
                        <p><i class="far fa-envelope"></i> <?php _e('Email:', 'egovt'); ?> <?php echo esc_html(get_theme_mod('egovt_email', 'demo@example.com')); ?></p>
                    </div>
                    
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <div class="footer-links">
                            <h4><?php _e('Service Request', 'egovt'); ?></h4>
                            <ul>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Apply for a City Job', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Request a 311 Service', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Get a Parking Permit', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Building Permits', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Online Birth Certificate', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Trade License', 'egovt'); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <div class="footer-links">
                            <h4><?php _e('Useful Links', 'egovt'); ?></h4>
                            <ul>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Our Blog', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Our History', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Documentation', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Environmental', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Town Gallery', 'egovt'); ?></a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> <?php _e('Department', 'egovt'); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <div class="footer-newsletter">
                            <h4><?php _e('City News & Updates', 'egovt'); ?></h4>
                            <p><?php _e('The latest Egovt news, articles, and resources, sent straight to your inbox every month.', 'egovt'); ?></p>
                            <form class="newsletter-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                                <input type="email" name="email" placeholder="<?php esc_attr_e('Your Email', 'egovt'); ?>" required>
                                <input type="hidden" name="action" value="egovt_newsletter">
                                <?php wp_nonce_field('egovt_newsletter_nonce', 'egovt_newsletter_nonce'); ?>
                                <button type="submit" class="btn btn-primary"><?php _e('SUBSCRIBE', 'egovt'); ?></button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p><?php printf(esc_html__('EGovt Theme &copy; %s. All Rights Reserved', 'egovt'), date('Y')); ?></p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="<?php esc_attr_e('Back to Top', 'egovt'); ?>">
        <i class="fas fa-chevron-up"></i>
    </button>

<?php wp_footer(); ?>

</body>
</html>
