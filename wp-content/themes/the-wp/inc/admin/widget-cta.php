<?php
/**
 * Call To Action Widget
 */

/**
* Class The_WP_CTA_Widget
*/
class The_WP_CTA_Widget extends The_WP_WP_Widget {

	function __construct() {
		parent::__construct(

			//id
			'the-wp-cta-widget',

			//name
			__( '&bull; The WP &gt; Call To Action', 'the-wp' ),

			//widget_options
			array(
				'description'	=> __('Display Call To Action block.', 'the-wp'),
				'class'			=> 'the-wp-cta-widget', // CSS class applied to frontend widget container via 'before_widget' arg
			),

			//control_options
			array(),

			//form_options
			//'name' => can be empty or false to hide the name
			array(
				array(
					'name'		=> __( 'Headline', 'the-wp' ),
					'id'		=> 'headline',
					'type'		=> 'text',
				),
				array(
					'name'		=> __( 'Description', 'the-wp' ),
					'id'		=> 'description',
					'type'		=> 'textarea',
				),
				array(
					'name'		=> __( 'Button Text', 'the-wp' ),
					'desc'		=> __( 'Leave empty if you dont want to show button', 'the-wp' ),
					'id'		=> 'button_text',
					'type'		=> 'text',
					'std'		=> __( 'KNOW MORE', 'the-wp' ),
				),
				array(
					'name'		=> __( 'URL', 'the-wp' ),
					'desc'		=> __( 'Leave empty if you dont want to show button', 'the-wp' ),
					'id'		=> 'url',
					'type'		=> 'text',
					'sanitize'	=> 'url',
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
			)
		);
	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( the_wp_locate_widget( 'cta' ) ); // Loads the widget/cta or template-parts/widget-cta.php template.
	}

}

/**
 * Register Widget
 */
function the_wp_cta_widget_register(){
	register_widget('The_WP_CTA_Widget');
}
add_action('widgets_init', 'the_wp_cta_widget_register');