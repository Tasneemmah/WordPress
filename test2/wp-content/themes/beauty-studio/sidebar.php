<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Beauty Studio
 */

if ( ! is_active_sidebar( 'beauty-studio-sidebar' ) ) {
	return;
}
$sidebar_layout = beauty_studio_sidebar_selection();
if( $sidebar_layout == 'both-sidebar' ) {
	echo '</div>';
}
if( $sidebar_layout == "right-sidebar" || $sidebar_layout == "both-sidebar" || empty( $sidebar_layout ) ) : ?>
    <div id="secondary-right" class="at-fixed-width widget-area sidebar secondary-sidebar" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
			<?php dynamic_sidebar( 'beauty-studio-sidebar' ); ?>
        </div>
    </div>
<?php endif;