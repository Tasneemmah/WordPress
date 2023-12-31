<?php
/**
 * Footer content
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'beauty_studio_footer' ) ) :

    function beauty_studio_footer() {

        global $beauty_studio_customizer_all_values;

        $beauty_studio_footer_bg_img = $beauty_studio_customizer_all_values['beauty-studio-footer-bg-img'];
	    $style = '';
        if( !empty( $beauty_studio_footer_bg_img ) ){
	        $style .= 'background-image:url(' . esc_url( $beauty_studio_footer_bg_img ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
        }
	    ?>
        <div class="clearfix"></div>
        <footer class="site-footer" style=" <?php echo $style; ?>">
            <?php
            $footer_column = 0;
            if(is_active_sidebar('footer-col-one') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-two') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-three') ){
	            $footer_column++;
            }
            if(is_active_sidebar('footer-col-four') ){
	            $footer_column++;
            }
            if( 0 !=$footer_column ) {
                ?>
                <div class="footer-columns at-fixed-width">
                    <div class="container">
                        <div class="row">
			                <?php
			                if ( 2 == $footer_column ){
				                $footer_top_col = 'col-sm-6 init-animate';
			                }
                            elseif ( 3 == $footer_column ){
				                $footer_top_col = 'col-sm-4 init-animate';
			                }
                            elseif ( 4 == $footer_column ){
				                $footer_top_col = 'col-sm-3 init-animate';
			                }
			                else{
				                $footer_top_col = 'col-sm-12 init-animate';
			                }
			                $footer_top_col .= ' zoomIn';
			                if (is_active_sidebar('footer-col-one')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-one'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-two')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-two'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-three')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-three'); ?>
                                </div>
			                <?php endif;
			                if (is_active_sidebar('footer-col-four')) : ?>
                                <div class="footer-sidebar <?php echo esc_attr($footer_top_col); ?>">
					                <?php dynamic_sidebar('footer-col-four'); ?>
                                </div>
			                <?php endif; ?>
                        </div>
                    </div><!-- bottom-->
                </div>
                <div class="clearfix"></div>
                <?php
            }
            ?>
            <div class="copy-right">
                <div class='container'>
                    <div class="row">
                        <div class="col-sm-6 init-animate">
                            <div class="footer-copyright text-left">
	                            <?php
	                            if( isset( $beauty_studio_customizer_all_values['beauty-studio-footer-copyright'] ) ): ?>
                                    <p class="at-display-inline-block">
			                            <?php echo wp_kses_post( $beauty_studio_customizer_all_values['beauty-studio-footer-copyright'] ); ?>
                                    </p>
	                            <?php endif;
	                            echo '<div class="site-info at-display-inline-block">';
	                            printf( esc_html__( '%1$s by %2$s', 'beauty-studio' ), 'Beauty Studio', '<a href="http://www.acmethemes.com/" rel="designer">Acme Themes</a>' );
	                            echo '</div><!-- .site-info -->';
	                            ?>
                            </div>
                        </div>
                        <div class="col-sm-6 init-animate">
                            <?php
                            $beauty_studio_footer_copyright_beside_option = $beauty_studio_customizer_all_values['beauty-studio-footer-copyright-beside-option'];
                            if( 'hide' != $beauty_studio_footer_copyright_beside_option ){
	                            if ( 'social' == $beauty_studio_footer_copyright_beside_option ) {
		                            /**
		                             * Social Sharing
		                             * beauty_studio_action_social_links
		                             * @since Beauty Studio 1.0.0
		                             *
		                             * @hooked beauty_studio_social_links -  10
		                             */
		                            echo "<div class='text-right'>";
		                            do_action('beauty_studio_action_social_links');
		                            echo "</div>";
	                            }
	                            else{
		                            echo "<div class='at-first-level-nav text-right'>";
		                            wp_nav_menu(
			                            array(
				                            'theme_location' => 'footer-menu',
				                            'container' => false,
				                            'depth' => 1
                                        )
		                            );
		                            echo "</div>";
	                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <a href="#page" class="sm-up-container"><i class="fa fa-angle-up sm-up"></i></a>
            </div>
        </footer>
    <?php
    }
endif;
add_action( 'beauty_studio_action_footer', 'beauty_studio_footer', 10 );

/**
 * Page end
 *
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'beauty_studio_page_end' ) ) :

    function beauty_studio_page_end() {
	    global $beauty_studio_customizer_all_values;
	    $beauty_studio_booking_form_title = $beauty_studio_customizer_all_values['beauty-studio-popup-widget-title'];
	    ?>
        <!-- Modal -->
        <div id="at-shortcode-bootstrap-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
					    <?php
					    if( !empty( $beauty_studio_booking_form_title ) ){
						    ?>
                            <h4 class="modal-title"><?php echo esc_html( $beauty_studio_booking_form_title ); ?></h4>
						    <?php
					    }
					    ?>
                    </div>
				    <?php
				    if( is_active_sidebar( 'popup-widget-area' ) ) :
					    echo "<div class='modal-body'>";
					    dynamic_sidebar( 'popup-widget-area' );
					    echo "</div>";
				    endif;
				    ?>
                </div><!--.modal-content-->
            </div>
        </div><!--#at-shortcode-bootstrap-modal-->

        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'beauty_studio_action_after', 'beauty_studio_page_end', 10 );