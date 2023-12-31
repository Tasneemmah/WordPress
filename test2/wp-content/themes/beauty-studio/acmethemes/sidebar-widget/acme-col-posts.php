<?php
/**
 * Custom columns of category with various options
 *
 * @package Acme Themes
 * @subpackage Beauty Studio
 * @since 1.0.0
 */
if ( ! class_exists( 'Beauty_Studio_Posts_Col' ) ) {
    /**
     * Class for adding widget
     *
     * @package Acme Themes
     * @subpackage Beauty_Studio_Posts_Col
     * @since 1.0.0
     */
    class Beauty_Studio_Posts_Col extends WP_Widget {

        /*defaults values for fields*/
        private $defaults = array(
	        'unique_id'                     => '',
	        'beauty_studio_widget_title'    => '',
	        'post_advanced_option'          => 'recent',
	        'beauty_studio_post_cat'        => -1,
	        'beauty_studio_post_tag'        => -1,
            'post_number'                   => 4,
	        'content_from'                  => 'excerpt',
	        'content_words'                 => 21,
            'column_number'                 => 4,
            'display_type'                  => 'column',
            'orderby'                       => 'date',
            'order'                         => 'DESC',
	        'enable_prev_next'              => 1,
	        'beauty_studio_img_size'        => 'large',
	        'background_options'            => 'default'
        );

        function __construct() {
            parent::__construct(
                    /*Base ID of your widget*/
                    'beauty_studio_posts_col',
                    /*Widget name will appear in UI*/
                    esc_html__('AT Posts Column', 'beauty-studio'),
                    /*Widget description*/
                    array(
                            'description' => esc_html__( 'Show posts from selected category with advanced options', 'beauty-studio' )
                    )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            $instance                   = wp_parse_args( (array) $instance, $this->defaults);
	        $unique_id                  = esc_attr( $instance['unique_id'] );
	        $title                      = esc_attr( $instance['beauty_studio_widget_title'] );
	        $post_advanced_option       = esc_attr( $instance['post_advanced_option'] );
	        $beauty_studio_post_cat     = esc_attr( $instance['beauty_studio_post_cat'] );
	        $beauty_studio_post_tag     = esc_attr( $instance['beauty_studio_post_tag'] );
	        $post_number                = absint( $instance['post_number'] );
	        $content_from               = esc_attr( $instance['content_from'] );
	        $content_words              = intval( $instance['content_words'] );
	        $column_number              = absint( $instance['column_number'] );
	        $display_type               = esc_attr( $instance['display_type'] );
	        $orderby                    = esc_attr( $instance['orderby'] );
	        $order                      = esc_attr( $instance['order'] );
	        $enable_prev_next           = esc_attr( $instance['enable_prev_next'] );
	        $beauty_studio_img_size     = esc_attr( $instance['beauty_studio_img_size'] );
	        $background_options         = esc_attr( $instance['background_options'] );
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>"><?php esc_html_e( 'Section ID', 'beauty-studio' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'unique_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'unique_id' ) ); ?>" type="text" value="<?php echo $unique_id; ?>" />
                <br />
                <small><?php esc_html_e('Enter a Unique Section ID. You can use this ID in Menu item for enabling One Page Menu.','beauty-studio')?></small>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'beauty_studio_widget_title' ) ); ?>">
                    <?php esc_html_e( 'Title', 'beauty-studio' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'beauty_studio_widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'beauty_studio_widget_title' ) ); ?>" type="text" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_advanced_option' ) ); ?>"><?php esc_html_e( 'Show', 'beauty-studio' ); ?></label>
                <select class="widefat at-post-advanced-option" id="<?php echo esc_attr( $this->get_field_id( 'post_advanced_option' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_advanced_option' ) ); ?>" >
			        <?php
			        $post_advanced_options = beauty_studio_post_advanced_options();
			        foreach ( $post_advanced_options as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $post_advanced_option ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p class="post-cat post-select">
                <label for="<?php echo esc_attr( $this->get_field_id('beauty_studio_post_cat') ); ?>">
                    <?php esc_html_e('Select Category', 'beauty-studio'); ?>
                </label>
                <?php
                $beauty_studio_dropown_cat = array(
	                'show_option_none'   => false,
	                'orderby'            => 'name',
                    'order'              => 'asc',
                    'show_count'         => 1,
                    'hide_empty'         => 1,
                    'echo'               => 1,
                    'selected'           => $beauty_studio_post_cat,
                    'hierarchical'       => 1,
                    'name'               => $this->get_field_name('beauty_studio_post_cat'),
                    'id'                 => $this->get_field_id('beauty_studio_post_cat'),
                    'class'              => 'widefat',
                    'taxonomy'           => 'category',
                    'hide_if_empty'      => false,
                );
                wp_dropdown_categories( $beauty_studio_dropown_cat );
                ?>
            </p>
            <p class="post-tag post-select">
                <label for="<?php echo esc_attr( $this->get_field_id('beauty_studio_post_tag') ); ?>">
			        <?php esc_html_e('Select Tag', 'beauty-studio'); ?>
                </label>
		        <?php
		        $beauty_studio_dropown_cat = array(
			        'show_option_none'   => false,
			        'orderby'            => 'name',
			        'order'              => 'asc',
			        'show_count'         => 1,
			        'hide_empty'         => 1,
			        'echo'               => 1,
			        'selected'           => $beauty_studio_post_tag,
			        'hierarchical'       => 1,
			        'name'               => $this->get_field_name('beauty_studio_post_tag'),
			        'id'                 => $this->get_field_name('beauty_studio_post_tag'),
			        'class'              => 'widefat',
			        'taxonomy'           => 'post_tag',
			        'hide_if_empty'      => false,
		        );
		        wp_dropdown_categories( $beauty_studio_dropown_cat );
		        ?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>">
			        <?php esc_html_e( 'Number of posts to show', 'beauty-studio' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" value="<?php echo $post_number; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'content_from' ) ); ?>"><?php esc_html_e( 'Content From', 'beauty-studio' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content_from' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_from' ) ); ?>">
			        <?php
			        $beauty_studio_about_content_from = beauty_studio_content_from();
			        foreach ( $beauty_studio_about_content_from as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $content_from ); ?>><?php echo esc_html( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'content_words' ) ); ?>">
			        <?php esc_html_e( 'Number of words on content', 'beauty-studio' ); ?>
                </label>
                <br/>
                <small>
		            <?php esc_html_e('Please enter -1 to show full content or 0 to show none','beauty-studio'); ?>
                </small>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'content_words' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_words' ) ); ?>" type="number" value="<?php echo $content_words; ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>"><?php esc_html_e( 'Column Number', 'beauty-studio' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'column_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'column_number' ) ); ?>" >
			        <?php
			        $beauty_studio_widget_column_numbers = beauty_studio_widget_column_number();
			        foreach ( $beauty_studio_widget_column_numbers as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $column_number ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>">
                    <?php esc_html_e( 'Display Type', 'beauty-studio' ); ?>
                </label>
                <select class="widefat at-display-select" id="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_type' ) ); ?>" >
			        <?php
			        $beauty_studio_widget_display_types = beauty_studio_widget_display_type();
			        foreach ( $beauty_studio_widget_display_types as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $display_type ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'beauty-studio' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" >
			        <?php
			        $beauty_studio_post_orderby = beauty_studio_post_orderby();
			        foreach ( $beauty_studio_post_orderby as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $orderby ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>">
			        <?php esc_html_e( 'Order by', 'beauty-studio' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'order' ) ); ?>" >
			        <?php
			        $beauty_studio_post_order = beauty_studio_post_order();
			        foreach ( $beauty_studio_post_order as $key => $value ){
				        ?>
                        <option value="<?php echo esc_attr( $key )?>" <?php selected( $key, $order ); ?>><?php echo esc_html( $value );?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <hr /><!--view all link separate-->
            <p class="at-enable-prev-next">
                <input id="<?php echo esc_attr( $this->get_field_id( 'enable_prev_next' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'enable_prev_next' ) ); ?>" type="checkbox" <?php checked( 1 == $enable_prev_next ? $instance['enable_prev_next'] : 0); ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'enable_prev_next' ) ); ?>"><?php esc_html_e( 'Enable Prev - Next on Carousel Column', 'beauty-studio' ); ?></label>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'beauty_studio_img_size' ) ); ?>">
			        <?php esc_html_e( 'Normal Featured Post Image', 'beauty-studio' ); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'beauty_studio_img_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'beauty_studio_img_size' ) ); ?>">
			        <?php
			        $beauty_studio_image_sizes = beauty_studio_get_image_sizes_options();
			        foreach( $beauty_studio_image_sizes as $key => $beauty_studio_column_array ){
				        echo ' <option value="'.esc_attr( $key ).'" '.selected( $beauty_studio_img_size, $key, 0). '>'.esc_html( $beauty_studio_column_array ).'</option>';
			        }
			        ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>"><?php esc_html_e( 'Background Options', 'beauty-studio' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'background_options' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_options' ) ); ?>">
			        <?php
			        $beauty_studio_background_options = beauty_studio_background_options();
			        foreach ( $beauty_studio_background_options as $key => $value ) {
				        ?>
                        <option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $background_options ); ?>><?php echo esc_html( $value ); ?></option>
				        <?php
			        }
			        ?>
                </select>
            </p>
            <hr />
            <p>
                <small><?php esc_html_e( 'Note: Some of the features only work in "Home main content area" due to minimum width in other areas.' ,'beauty-studio'); ?></small>
            </p>
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        public function update( $new_instance, $old_instance ) {
            $instance = array();
	        $instance['unique_id']                      = sanitize_key( $new_instance['unique_id'] );
	        $instance['beauty_studio_widget_title']     = ( isset( $new_instance['beauty_studio_widget_title'] ) ) ? sanitize_text_field( $new_instance['beauty_studio_widget_title'] ) : '';

	        $post_advanced_options                  = beauty_studio_post_advanced_options();
	        $instance['post_advanced_option']       = beauty_studio_sanitize_choice_options( $new_instance['post_advanced_option'], $post_advanced_options, 'recent' );
	        
	        $instance['beauty_studio_post_cat']     = ( isset( $new_instance['beauty_studio_post_cat'] ) ) ? esc_attr( $new_instance['beauty_studio_post_cat'] ) : '';
	        $instance['beauty_studio_post_tag']     = ( isset( $new_instance['beauty_studio_post_tag'] ) ) ? esc_attr( $new_instance['beauty_studio_post_tag'] ) : '';
	        $instance['post_number']                = absint( $new_instance['post_number'] );

	        $beauty_studio_about_content_from   = beauty_studio_content_from();
	        $instance['content_from']           = beauty_studio_sanitize_choice_options( $new_instance['content_from'], $beauty_studio_about_content_from, 'excerpt' );

	        $instance['content_words']              = intval( $new_instance['content_words'] );
	        $instance['column_number']              = absint( $new_instance['column_number'] );
	        
	        $beauty_studio_widget_display_types     = beauty_studio_widget_display_type();
	        $instance['display_type']               = beauty_studio_sanitize_choice_options( $new_instance['display_type'], $beauty_studio_widget_display_types, 'column' );

	        $beauty_studio_post_orderby             = beauty_studio_post_orderby();
	        $instance['orderby']                    = beauty_studio_sanitize_choice_options( $new_instance['orderby'], $beauty_studio_post_orderby, 'date' );

	        $beauty_studio_post_order               = beauty_studio_post_order();
	        $instance['order']                      = beauty_studio_sanitize_choice_options( $new_instance['order'], $beauty_studio_post_order, 'DESC' );

	        $instance['enable_prev_next']           = isset($new_instance['enable_prev_next'])? 1 : 0;

	        $beauty_studio_image_sizes             = beauty_studio_get_image_sizes_options();
	        $instance['beauty_studio_img_size']    = beauty_studio_sanitize_choice_options( $new_instance['beauty_studio_img_size'], $beauty_studio_image_sizes, 'post-thumbnail' );

	        $beauty_studio_widget_background_options    = beauty_studio_background_options();
	        $instance['background_options']             = beauty_studio_sanitize_choice_options( $new_instance['background_options'], $beauty_studio_widget_background_options, 'default' );

	        return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        public function widget($args, $instance) {
            $instance                       = wp_parse_args( (array) $instance, $this->defaults);
	        $unique_id                      = !empty( $instance['unique_id'] ) ? esc_attr( $instance['unique_id'] ) : esc_attr( $this->id );
	        $beauty_studio_post_cat         = esc_attr( $instance['beauty_studio_post_cat'] );
	        $beauty_studio_post_tag         = esc_attr( $instance['beauty_studio_post_tag'] );
	        $title                          = !empty( $instance['beauty_studio_widget_title'] ) ? esc_attr( $instance['beauty_studio_widget_title'] ) : get_cat_name($beauty_studio_post_cat);
	        $title                          = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	        $post_advanced_option       = esc_attr( $instance['post_advanced_option'] );
	        $post_number                = absint( $instance['post_number'] );
	        $content_from               = esc_attr( $instance['content_from'] );
	        $content_words              = intval( $instance['content_words'] );
	        $column_number              = absint( $instance['column_number'] );
	        $display_type               = esc_attr( $instance['display_type'] );
	        $orderby                    = esc_attr( $instance['orderby'] );
	        $order                      = esc_attr( $instance['order'] );
	        $enable_prev_next           = esc_attr( $instance['enable_prev_next'] );
	        $beauty_studio_img_size     = esc_attr( $instance['beauty_studio_img_size'] );

	        $background_options     = esc_attr( $instance['background_options'] );
	        $bg_gray_class          = $background_options == 'gray'?'at-gray-bg':'';

	        /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 1.0.0
             *
             * @see WP_Query
             *
             */
	        $sticky = get_option( 'sticky_posts' );
	        $query_args = array(
		        'posts_per_page'        => $post_number,
		        'post_status'           => 'publish',
		        'post_type'             => 'post',
		        'no_found_rows'         => 1,
		        'order'                 => $order,
		        'ignore_sticky_posts'   => true,
		        'post__not_in'          => $sticky
	        );
	        switch ( $post_advanced_option ) {

		        case 'cat' :
			        $query_args['cat'] = $beauty_studio_post_cat;
			        break;

		        case 'tag' :
			        $query_args['tag'] = $beauty_studio_post_tag;
			        break;
	        }

	        switch ( $orderby ) {

                case 'ID' :
		        case 'author' :
		        case 'title' :
		        case 'date' :
		        case 'modified' :
		        case 'rand' :
		        case 'comment_count' :
		        case 'menu_order' :
			        $query_args['orderby']  = $orderby;
			        break;

		        default :
			        $query_args['orderby']  = 'date';
	        }

            $beauty_studio_featured_query = new WP_Query( $query_args );

            if ($beauty_studio_featured_query->have_posts()) :
                echo $args['before_widget'];
	            $animation = "init-animate zoomIn";
            ?>
                <section id="<?php echo esc_attr( $unique_id ); ?>" class="at-widgets acme-col-posts <?php echo $bg_gray_class;?>">
                    <div class="container">
                        <?php
                        if( ! empty( $title )  ){
                        echo "<div class='at-widget-title-wrapper'>";
                        if ( ! empty( $title ) ) {
                              if( -1 != $beauty_studio_post_cat ){
                                echo "<div class='at-cat-color-wrap-".$beauty_studio_post_cat."'>";
                            }
                            echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                             if( -1 != $beauty_studio_post_cat ){
                                echo "</div>";
                            }
                        }
                        echo "</div>";
                    }
                 
                        $div_attr = 'class="featured-entries-col '.$display_type.'"';
                        if( 'carousel' == $display_type ){
                            $div_attr = 'class="featured-entries-col acme-slick-carausel" data-column="'.absint( $column_number ).'"';
                        }
                        if( 1 == $enable_prev_next && 'carousel' == $display_type ) {
	                        echo "<span class='at-action-wrapper'>";
	                        echo '<i class="prev fa fa-angle-left"></i><i class="next fa fa-angle-right"></i>';
	                        echo "</span>";/*.at-action-wrapper*/
                        }
                        ?>
                        <div <?php echo $div_attr;?>>
                            <?php
                            $beauty_studio_featured_index = 1;
                            while ( $beauty_studio_featured_query->have_posts() ) :$beauty_studio_featured_query->the_post();
                            $thumb = $beauty_studio_img_size;
                            $beauty_studio_list_classes = 'single-list';
                            $beauty_studio_words = $content_words;
                            if( 'carousel' != $display_type ){
                                if( 1 != $beauty_studio_featured_index && $beauty_studio_featured_index % $column_number == 1 ){
                                    echo "<div class='clearfix'></div>";
                                }
                                if( 1 == $column_number ){
                                    $beauty_studio_list_classes .= " col-sm-12";
                                } 
                                elseif( 2 == $column_number ){
                                    $beauty_studio_list_classes .= " col-sm-6";
                                } 
                                elseif( 3 == $column_number ){
                                    $beauty_studio_list_classes .= " col-sm-4 col-md-4";
                                } 
                                else{
                                    $beauty_studio_list_classes .= " col-sm-3 col-md-3";
                                }
                            } 
                            ?>
                                <div class="<?php echo esc_attr( $beauty_studio_list_classes ); ?>">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class( $animation ); ?>>
                                        <div class="content-wrapper">
                                            <div class="image-wrap">
                                                <?php
                                                $no_blog_image ='';
                                                if ( has_post_thumbnail() ) {
                                                    ?>
                                                    <!--post thumbnail options-->
                                                    <div class="post-thumb">
                                                        <?php
                                                        echo '<a href="'.esc_url(get_permalink()).'" class="all-link">';
                                                        the_post_thumbnail( $thumb );
                                                        echo '</a>';
                                                        ?>
                                                    </div><!-- .post-thumb-->
                                                    <?php
                                                } 
                                                else{
                                                    $no_blog_image = 'no-image';
                                                } 
                                                ?>
                                            </div>
                                            <div class="entry-content <?php echo $no_blog_image?>">
                                                <div class="entry-header-title">
                                                    <header class="entry-header">
                                                        <div class="entry-meta">
			                                                <?php
			                                                beauty_studio_cats_lists()
			                                                ?>
                                                        </div><!-- .entry-meta -->
                                                    </header><!-- .entry-header -->
                                                    <h3 class="entry-title">
	                                                    <?php
	                                                    echo '<a href="'.esc_url(get_permalink()).'" class="all-link">';
	                                                    the_title();
	                                                    echo '</a>';
	                                                    ?>
                                                    </h3>
                                                </div>
                                                <?php
                                                if( 0 != $beauty_studio_words ){
	                                                ?>
                                                    <div class="details">
		                                                <?php
		                                                beauty_studio_advanced_content( $beauty_studio_words, $content_from );
		                                                ?>
                                                    </div>
	                                                <?php
                                                }
                                                ?>
                                            </div><!-- .entry-content -->
                                        </div>
                                    </article><!-- #post-## -->
                                </div><!--dynamic css-->
                                <?php
                                $beauty_studio_featured_index++;
                                endwhile;
                                ?>
                        </div><!--featured entries-col-->
                    </div>
                </section>
                <?php
                echo $args['after_widget'];
                echo "<div class='clearfix'></div>";
                // Reset the global $the_post as this query will have stomped on it
            endif;
            wp_reset_postdata();
        }
    } // Class Beauty_Studio_Posts_Col ends here
}