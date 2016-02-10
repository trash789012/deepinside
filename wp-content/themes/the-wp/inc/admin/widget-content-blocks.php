<?php
/**
 * Content Blocks Widget
 */

/**
* Class The_WP_Content_Blocks_Widget
*/
class The_WP_Content_Blocks_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-content-blocks-widget',

			//name
			__( '&bull; The WP &gt; Content Blocks', 'the-wp' ),

			//widget_options
			array(
				'description'	=> __('Display Styled Content Blocks.', 'the-wp'),
				'class'			=> 'the-wp-content-blocks-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Blocks Style', 'the-wp' ),
					'id'		=> 'style',
					'type'		=> 'images',
					'std'		=> 'style1',
					'options'	=> array(
						'style1'	=> trailingslashit( CEEWP_THEMEURI ) . 'inc/admin/images/content-block-style-1.png',
						'style2'	=> trailingslashit( CEEWP_THEMEURI ) . 'inc/admin/images/content-block-style-2.png',
						'style3'	=> trailingslashit( CEEWP_THEMEURI ) . 'inc/admin/images/content-block-style-3.png',
						'style4'	=> trailingslashit( CEEWP_THEMEURI ) . 'inc/admin/images/content-block-style-4.png',
					),
				),
				array(
					'name'		=> __( "Title", 'the-wp' ),
					'id'		=> 'title',
					'type'		=> 'text',
					'std'		=> __('Just write.', 'the-wp'),
				),
				array(
					'name'		=> __( "Description", 'the-wp' ),
					'id'		=> 'desc',
					'type'		=> 'text',
					'std'		=> __('Lorem ipsum dolor sit amet, consectetur adipiscing elit sit amet interdum vestibulum, aliquam non ante.', 'the-wp'),
				),
				array(
					'name'		=> __( 'Number of Columns:', 'the-wp' ),
					'id'		=> 'columns',
					'type'		=> 'select',
					'std'		=> '3',
					'options'	=> array(
						'1'	=> __( 'One Column', 'the-wp' ),
						'2'	=> __( 'Two Columns', 'the-wp' ),
						'3'	=> __( 'Three Columns', 'the-wp' ),
						'4'	=> __( 'Four Columns', 'the-wp' ),
						'5'	=> __( 'Five Columns', 'the-wp' ),
					),
				),
				array(
					'name'		=> __( 'Icon Style', 'the-wp' ),
					'desc'		=> __( "Not applicable if 'Featured Image' is seected below.", 'the-wp' ),
					'id'		=> 'icon_style',
					'type'		=> 'select',
					'std'		=> 'circle',
					'options'	=> array(
						'none'		=> __( 'None', 'the-wp' ),
						'circle'	=> __( 'Circle', 'the-wp' ),
						'square'	=> __( 'Square', 'the-wp' ),
					),
				),
				array(
					'name'		=> __( 'Border', 'the-wp' ),
					'desc'		=> __( 'Top and bottom borders.', 'the-wp' ),
					'id'		=> 'border',
					'type'		=> 'select',
					'std'		=> 'none none',
					'options'	=> array(
						'line line'	=> __( 'Top - Line || Bottom - Line', 'the-wp' ),
						'line shadow'	=> __( 'Top - Line || Bottom - DoubleLine', 'the-wp' ),
						'line none'	=> __( 'Top - Line || Bottom - None', 'the-wp' ),
						'shadow line'	=> __( 'Top - DoubleLine || Bottom - Line', 'the-wp' ),
						'shadow shadow'	=> __( 'Top - DoubleLine || Bottom - DoubleLine', 'the-wp' ),
						'shadow none'	=> __( 'Top - DoubleLine || Bottom - None', 'the-wp' ),
						'none line'	=> __( 'Top - None || Bottom - Line', 'the-wp' ),
						'none shadow'	=> __( 'Top - None || Bottom - DoubleLine', 'the-wp' ),
						'none none'	=> __( 'Top - None || Bottom - None', 'the-wp' ),
					),
				),
				array(
					'name'		=> __( "Use 'Featured Image' of page instead of icons.", 'the-wp' ),
					'id'		=> 'image',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __( "Display excerpt instead of full content (Read More link will be automatically used instead of Custom URLs below)", 'the-wp' ),
					'id'		=> 'excerpt',
					'type'		=> 'checkbox',
				),
				array(
					'name'		=> __( 'Content Boxes', 'the-wp' ),
					'id'		=> 'boxes',
					'type'		=> 'group',
					'options'	=> array(
						'item_name'	=> __( 'Content Box', 'the-wp' ),
					),
					'fields'	=> array(
						array(
							'name'		=> __('Icon', 'the-wp'),
							'desc'		=> __( "Not applicable if 'Featured Image' is selected above.", 'the-wp' ),
							'id'		=> 'icon',
							'type'		=> 'icon'),
						array(
							'name'		=> __( 'Page', 'the-wp' ),
							'id'		=> 'page',
							'type'		=> 'select',
							'options'	=> The_WP_WP_Widget::get_wp_list('page'),
						),
						array(
							'name'		=> __('Link Text (optional)', 'the-wp'),
							'id'		=> 'link',
							'type'		=> 'text'),
						array(
							'name'		=> __('Link URL', 'the-wp'),
							'id'		=> 'url',
							'std'		=> 'http://',
							'type'		=> 'text',
							'sanitize'	=> 'url'),
					),
				),
			)
		);
	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( the_wp_locate_widget( 'content-blocks' ) ); // Loads the widget/content-blocks or template-parts/widget-content-blocks.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_content_blocks_widget_register(){
	register_widget('The_WP_Content_Blocks_Widget');
}
add_action('widgets_init', 'the_wp_content_blocks_widget_register');