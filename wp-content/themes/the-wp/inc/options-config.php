<?php
// Slider Array
$the_wp_slider_array = array(
                            'enable_slider' => array(
                                'type' => 'checkbox',
                                'label' => __('Enable this section', 'the-wp'),
                                'default' => 0,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							'slider_quantity' => array(
                                'type' => 'disabled-select',
                                'label' => __('Quantity', 'the-wp'),
                                'default' => 4,
								'choices' => the_wp_qty_array(),
                                'sanitize_callback' => 'absint',
                            )
							);
for ($i=1;$i<=4;$i++) {
	$the_wp_slider_item = array();
	$the_wp_slider_item = array(							
							'sep'.$i => array(
								'label' => __("Slider", 'the-wp') . "#$i",
                                'type' => 'sep-title',
                            ),
                            'slider_title'.$i => array(
                                'type' => 'disabled-text',
                                'label' => __('Title', 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
                            ),
							'slider_desc'.$i => array(
                                'type' => 'disabled-text',
                                'label' => __('Description', 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
                            ),
							'slider_link'.$i => array(
                                'type' => 'text',
                                'label' => __('Link', 'the-wp'),
                                'sanitize_callback' => 'esc_url',
                            ),
							'slider_image'.$i => array(
								'default' => get_template_directory_uri() . "/images/slider/slider$i.jpg",
                                'type' => 'image',
                                'label' => __('Image', 'the-wp'),
                                'sanitize_callback' => 'esc_url_raw',
                            )
							);
	$the_wp_slider_array = array_merge($the_wp_slider_array, $the_wp_slider_item);
}


// Social Media Section Array
$the_wp_social_array = array(
							'sep_social'.$i => array(
								'label' => __("Show", 'the-wp'),
                                'type' => 'sep-title',
                            ),
                            'social_header' => array(
                                'type' => 'checkbox',
                                'label' => __('Top', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
                            'social_footer' => array(
                                'type' => 'checkbox',
                                'label' => __('Bottom', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							'social_quantity' => array(
                                'type' => 'disabled-select',
                                'label' => __('Number of links to show:', 'the-wp'),
                                'default' => 4,
								'choices' => the_wp_qty_array(),
                                'sanitize_callback' => 'absint',
                            ));
// FA Icons to choices array
$fa_choices = array();
foreach ( the_wp_fa_array () as $fa ) {
	$fa_choices = array_merge($fa_choices, array( "fa-$fa" => "$fa" ) );
}

//
for ( $i=1; $i<=5; $i++ ) {
	$the_wp_social_item = array();
	$the_wp_social_item = array(							
							'sep_services'.$i => array(
								'label' => sprintf("%s #$i",__("Icon", 'the-wp')),
                                'type' => 'sep-title',
                            ),
							'enable_social'.$i => array(
                                'type' => 'checkbox',
                                'label' => __('Activate', 'the-wp'),
                                'default' => 0,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
                            'social_title'.$i => array(
								'default' => "Lorem ipsum",
                                'type' => 'text',
                                'label' => __('Title', 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
                            ),
							'social_link'.$i => array(
								'default' => esc_url( home_url( '/' ) ),
                                'type' => 'text',
                                'label' => __('Web Address', 'the-wp'),
                                'sanitize_callback' => 'esc_url',
                            ),
							'social_target'.$i => array(
                                'type' => 'checkbox',
                                'label' => __('Open link in a new window/tab', 'the-wp'),
                                'default' => 1,
                                'sanitize_callback' => 'the_wp_boolean',
                            ),
							'social_icon'.$i => array(
								'default' => "fa-facebook",
                                'type' => 'select',
                                'label' => __("Icon", 'the-wp'),
                                'sanitize_callback' => 'esc_attr',
								'choices' => $fa_choices
                            ),
							'social_icon_size'.$i => array(
                            	'type' => 'select',
                            	'label' => __('Size', 'the-wp'),
                            	'choices' => array(
									'1' => __('1x', 'the-wp'),
									'2' => __('2x', 'the-wp'),
									'3' => __('3x', 'the-wp'),
									'4' => __('4x', 'the-wp'),
									'5' => __('5x', 'the-wp'),
                            	),
                            	'default' => 1,
                            
                        	),
							'social_color'.$i => array(
								'default' => "#06F",
                                'type' => 'color',
                                'label' => __('Color', 'the-wp'),
                                'sanitize_callback' => 'sanitize_hex_color',
                            )
							);
	$the_wp_social_array = array_merge($the_wp_social_array, $the_wp_social_item);
}

// options array
$options = array(
	'capability' => 10,
	'type' => 'theme_mod',
	/*'root' => array(
		'sections' => array(
			'pro' => array(
					'title' => __('Upgrade to Pro', 'the-wp'),
					'fields' => array(
							'primary_colors' => array(
							'type' => 'info',
							'label' => sprintf( __( 'More options available in Pro version. <a href="%1$s">%2$s</a>.', 'the-wp' ), esc_url('http://ceewp.com/our-themes/wp-wordpress-theme#pro'), __( 'Upgrade Now', 'the-wp' ) ),
							'default' => '#ff8800',
							'sanitize_callback' => 'sanitize_hex_color',
							),
						),
				)
		),
	),*/
	'panels' => array(
		'the-wp' => array(
			'priority'       => 9,
			'title'          => __('The WP Options', 'the-wp'),
			'description'    => '',
			'sections' => array(
				'header' => array(
					'title' => __('Header', 'the-wp'),
					'description' => __('Header options', 'the-wp'),
					'fields' => array(
						'logo' => array(
							'default' => get_template_directory_uri() . '/images/logo.png',
							'type' => 'image',
							'label' => __('Logo Upload', 'the-wp'),
							'sanitize_callback' => 'esc_url_raw',
						),
						'sep_contact_info' => array(
							'label' => __("Contact Info", 'the-wp'),
							'type' => 'sep-title',
						),
						'address' => array(
							'type' => 'text',
							'label' => __('Address', 'the-wp'),
							'default' => '77 Massachusetts Ave, Cambridge, MA, USA',
							'sanitize_callback' => 'esc_attr',
						),
						'address_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Address', 'the-wp'), __('Color', 'the-wp') ),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'address_url' => array(
							'type' => 'disabled-text',
							'label' => sprintf( "%1s &rarr; %2s", __('Address', 'the-wp'), __('Custom Link', 'the-wp') ),
							'default' => 'http://',
							'sanitize_callback' => 'esc_url',
						),
						'mail' => array(
							'type' => 'text',
							'label' => __('Email', 'the-wp'),
							'default' => 'info@example.com',
							'sanitize_callback' => 'esc_attr',
						),
						'mail_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Email', 'the-wp'), __('Color', 'the-wp') ),
							'label' => __('Color', 'the-wp'),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'mail_url' => array(
							'type' => 'disabled-text',
							'label' => sprintf( "%1s &rarr; %2s", __('Email', 'the-wp'), __('Custom Link', 'the-wp') ),
							'default' => 'http://',
							'sanitize_callback' => 'esc_url',
						),
						'phone' => array(
							'type' => 'text',
							'label' => __('Phone', 'the-wp'),
							'default' => '+1 617-253-1000',
							'sanitize_callback' => 'esc_attr',
						),
						'phone_color' => array(
							'type' => 'color',
							'label' => sprintf( "%1s &rarr; %2s", __('Phone', 'the-wp'), __('Color', 'the-wp') ),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'phone_url' => array(
							'type' => 'disabled-text',
							'label' => sprintf( "%1s &rarr; %2s", __('Phone', 'the-wp'), __('Custom Link', 'the-wp') ),
							'default' => 'http://',
							'sanitize_callback' => 'esc_url',
						),
					),
				),
				'general' => array(
					'title' => __('General', 'the-wp'),
					'fields' => array(
						'sep_colors' => array(
							'label' => __("Colors", 'the-wp'),
							'type' => 'sep-title',
						),
						'primary_color' => array(
							'type' => 'color',
							'label' => __('Primary Color', 'the-wp'),
							'default' => '#333333',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'title_color' => array(
							'type' => 'color',
							'label' => __('Site Title', 'the-wp'),
							'default' => '#ffffff',
							'sanitize_callback' => 'sanitize_hex_color',
						),
						'color_scheme' => array(
							'type' => 'disabled-select',
							'label' => __('Color Scheme', 'the-wp'),
							'choices' => array(
												'1' => __('Default', 'the-wp'),
												'2' => __('Light', 'the-wp'),
												'3' => __('Blue', 'the-wp'),
												'4' => __('Coffee', 'the-wp'),
												'5' => __('Ectoplasm', 'the-wp'),
												'6' => __('Midnight', 'the-wp'),
												'7' => __('Ocean', 'the-wp'),
												'8' => __('Sunrise', 'the-wp'),
							),
							'default' => 1,
						
						),
					),
				),
				'slider' => array(
					'title' => __('Slider', 'the-wp'),
					'fields' => $the_wp_slider_array,
				),
				'social' => array(
					'title' => __('Social', 'the-wp') . ' &amp; ' . __('Links', 'the-wp'),
					'fields' => $the_wp_social_array,
				),
				'display_settings' => array(
					'title' => __('Display Settings', 'the-wp'),
					'fields' => array(
						'show_postdate' => array(
							'type' => 'checkbox',
							'label' => __('Display post date?', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_author' => array(
							'type' => 'checkbox',
							'label' => __('Display item author if available?', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_thumb' => array(
							'type' => 'checkbox',
							'label' => __('Post Thumbnail', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_tags' => array(
							'type' => 'checkbox',
							'label' => sprintf( "%1s &rarr; %2s", __('Post', 'the-wp'), __('Tags', 'the-wp') ),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_cats' => array(
							'type' => 'checkbox',
							'label' => sprintf( "%1s &rarr; %2s", __('Post', 'the-wp'), __('Categories', 'the-wp') ),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						'show_post_nav' => array(
							'type' => 'checkbox',
							'label' => __('Post navigation', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
						
						'show_search' => array(
							'type' => 'checkbox',
							'label' => __('A search form for your site.', 'the-wp'),
							'default' => 1,
							'sanitize_callback' => 'the_wp_boolean',
						),
					),
				),
				'alternative_texts' => array(
					'title' => __('Alternative Text', 'the-wp'),
					'fields' => array(
						'text_readmore' => array(
							'type' => 'text',
							'label' => __('Read more...', 'the-wp'),
							'default' => __('Read more...', 'the-wp'),
							'sanitize_callback' => 'esc_attr',
						),						
					),
				),
				'advanced' => array(
					'title' => __('Advanced Options', 'the-wp'),
					'fields' => array(
						'reset' => array(
							'type' => 'checkbox',
							'label' => __('Reset all theme settings to default. Refresh the page after save to view full effects.', 'the-wp'),
							'default' => 0,
							'sanitize_callback' => 'the_wp_reset_all_settings',
						),
					),
				),
			)
		),
	)
);
	
/**
 * Reset all settings to default
 * @param  $input entered value
 * @return sanitized output
 *
 */
function the_wp_reset_all_settings( $input ) {
	if ( $input == 1 ) {
		//Remove all set values
		remove_theme_mods();
    } 
    else {
        return '';
    }
}

//
function the_wp_boolean($value) {
    if(is_bool($value)) {
        return $value;
    } else {
        return false;
    }
}

//
function the_wp_breadcrumb_char_choices($value='') {
    $choices = array('1','2','3');

    if( in_array($value, $choices)) {
        return $value;
    } else {
        return '1';
    }
}

//
function the_wp_fa_array () {
// FA Array
$fa_array = array("adjust", "adn", "align-center", "align-justify", "align-left", "align-right", "ambulance", "anchor", "android", "angellist", "angle-double-down", "angle-double-left", "angle-double-right", "angle-double-up", "angle-down", "angle-left", "angle-right", "angle-up", "apple", "archive", "area-chart", "arrow-circle-down", "arrow-circle-left", "arrow-circle-o-down", "arrow-circle-o-left", "arrow-circle-o-right", "arrow-circle-o-up", "arrow-circle-right", "arrow-circle-up", "arrow-down", "arrow-left", "arrow-right", "arrow-up", "arrows", "arrows-alt", "arrows-h", "arrows-v", "asterisk", "at", "automobile", "backward", "ban", "bank", "bar-chart", "bar-chart-o", "barcode", "bars", "bed", "beer", "behance", "behance-square", "bell", "bell-o", "bell-slash", "bell-slash-o", "bicycle", "binoculars", "birthday-cake", "bitbucket", "bitbucket-square", "bitcoin", "bold", "bolt", "bomb", "book", "bookmark", "bookmark-o", "briefcase", "btc", "bug", "building", "building-o", "bullhorn", "bullseye", "bus", "buysellads", "cab", "calculator", "calendar", "calendar-o", "camera", "camera-retro", "car", "caret-down", "caret-left", "caret-right", "caret-square-o-down", "caret-square-o-left", "caret-square-o-right", "caret-square-o-up", "caret-up", "cart-arrow-down", "cart-plus", "cc", "cc-amex", "cc-discover", "cc-mastercard", "cc-paypal", "cc-stripe", "cc-visa", "certificate", "chain", "chain-broken", "check", "check-circle", "check-circle-o", "check-square", "check-square-o", "chevron-circle-down", "chevron-circle-left", "chevron-circle-right", "chevron-circle-up", "chevron-down", "chevron-left", "chevron-right", "chevron-up", "child", "circle", "circle-o", "circle-o-notch", "circle-thin", "clipboard", "clock-o", "close", "cloud", "cloud-download", "cloud-upload", "cny", "code", "code-fork", "codepen", "coffee", "cog", "cogs", "columns", "comment", "comment-o", "comments", "comments-o", "compass", "compress", "connectdevelop", "copy", "copyright", "credit-card", "crop", "crosshairs", "css3", "cube", "cubes", "cut", "cutlery", "dashboard", "dashcube", "database", "dedent", "delicious", "desktop", "deviantart", "diamond", "digg", "dollar", "dot-circle-o", "download", "dribbble", "dropbox", "drupal", "edit", "eject", "ellipsis-h", "ellipsis-v", "empire", "envelope", "envelope-o", "envelope-square", "eraser", "eur", "euro", "exchange", "exclamation", "exclamation-circle", "exclamation-triangle", "expand", "external-link", "external-link-square", "eye", "eye-slash", "eyedropper", "facebook", "facebook-f", "facebook-official", "facebook-square", "fast-backward", "fast-forward", "fax", "female", "fighter-jet", "file", "file-archive-o", "file-audio-o", "file-code-o", "file-excel-o", "file-image-o", "file-movie-o", "file-o", "file-pdf-o", "file-photo-o", "file-picture-o", "file-powerpoint-o", "file-sound-o", "file-text", "file-text-o", "file-video-o", "file-word-o", "file-zip-o", "files-o", "film", "filter", "fire", "fire-extinguisher", "flag", "flag-checkered", "flag-o", "flash", "flask", "flickr", "floppy-o", "folder", "folder-o", "folder-open", "folder-open-o", "font", "forumbee", "forward", "foursquare", "frown-o", "futbol-o", "gamepad", "gavel", "gbp", "ge", "gear", "gears", "genderless", "gift", "git", "git-square", "github", "github-alt", "github-square", "gittip", "glass", "globe", "google", "google-plus", "google-plus-square", "google-wallet", "graduation-cap", "gratipay", "group", "h-square", "hacker-news", "hand-o-down", "hand-o-left", "hand-o-right", "hand-o-up", "hdd-o", "header", "headphones", "heart", "heart-o", "heartbeat", "history", "home", "hospital-o", "hotel", "html5", "ils", "image", "inbox", "indent", "info", "info-circle", "inr", "instagram", "institution", "ioxhost", "italic", "joomla", "jpy", "jsfiddle", "key", "keyboard-o", "krw", "language", "laptop", "lastfm", "lastfm-square", "leaf", "leanpub", "legal", "lemon-o", "level-down", "level-up", "life-bouy", "life-buoy", "life-ring", "life-saver", "lightbulb-o", "line-chart", "link", "linkedin", "linkedin-square", "linux", "list", "list-alt", "list-ol", "list-ul", "location-arrow", "lock", "long-arrow-down", "long-arrow-left", "long-arrow-right", "long-arrow-up", "magic", "magnet", "mail-forward", "mail-reply", "mail-reply-all", "male", "map-marker", "mars", "mars-double", "mars-stroke", "mars-stroke-h", "mars-stroke-v", "maxcdn", "meanpath", "medium", "medkit", "meh-o", "mercury", "microphone", "microphone-slash", "minus", "minus-circle", "minus-square", "minus-square-o", "mobile", "mobile-phone", "money", "moon-o", "mortar-board", "motorcycle", "music", "navicon", "neuter", "newspaper-o", "openid", "outdent", "pagelines", "paint-brush", "paper-plane", "paper-plane-o", "paperclip", "paragraph", "paste", "pause", "paw", "paypal", "pencil", "pencil-square", "pencil-square-o", "phone", "phone-square", "photo", "picture-o", "pie-chart", "pied-piper", "pied-piper-alt", "pinterest", "pinterest-p", "pinterest-square", "plane", "play", "play-circle", "play-circle-o", "plug", "plus", "plus-circle", "plus-square", "plus-square-o", "power-off", "print", "puzzle-piece", "qq", "qrcode", "question", "question-circle", "quote-left", "quote-right", "ra", "random", "rebel", "recycle", "reddit", "reddit-square", "refresh", "remove", "renren", "reorder", "repeat", "reply", "reply-all", "retweet", "rmb", "road", "rocket", "rotate-left", "rotate-right", "rouble", "rss", "rss-square", "rub", "ruble", "rupee", "save", "scissors", "search", "search-minus", "search-plus", "sellsy", "send", "send-o", "server", "share", "share-alt", "share-alt-square", "share-square", "share-square-o", "shekel", "sheqel", "shield", "ship", "shirtsinbulk", "shopping-cart", "sign-in", "sign-out", "signal", "simplybuilt", "sitemap", "skyatlas", "skype", "slack", "sliders", "slideshare", "smile-o", "soccer-ball-o", "sort", "sort-alpha-asc", "sort-alpha-desc", "sort-amount-asc", "sort-amount-desc", "sort-asc", "sort-desc", "sort-down", "sort-numeric-asc", "sort-numeric-desc", "sort-up", "soundcloud", "space-shuttle", "spinner", "spoon", "spotify", "square", "square-o", "stack-exchange", "stack-overflow", "star", "star-half", "star-half-empty", "star-half-full", "star-half-o", "star-o", "steam", "steam-square", "step-backward", "step-forward", "stethoscope", "stop", "street-view", "strikethrough", "stumbleupon", "stumbleupon-circle", "subscript", "subway", "suitcase", "sun-o", "superscript", "support", "table", "tablet", "tachometer", "tag", "tags", "tasks", "taxi", "tencent-weibo", "terminal", "text-height", "text-width", "th", "th-large", "th-list", "thumb-tack", "thumbs-down", "thumbs-o-down", "thumbs-o-up", "thumbs-up", "ticket", "times", "times-circle", "times-circle-o", "tint", "toggle-down", "toggle-left", "toggle-off", "toggle-on", "toggle-right", "toggle-up", "train", "transgender", "transgender-alt", "trash", "trash-o", "tree", "trello", "trophy", "truck", "try", "tty", "tumblr", "tumblr-square", "turkish-lira", "twitch", "twitter", "twitter-square", "umbrella", "underline", "undo", "university", "unlink", "unlock", "unlock-alt", "unsorted", "upload", "usd", "user", "user-md", "user-plus", "user-secret", "user-times", "users", "venus", "venus-double", "venus-mars", "viacoin", "video-camera", "vimeo-square", "vine", "vk", "volume-down", "volume-off", "volume-up", "warning", "wechat", "weibo", "weixin", "whatsapp", "wheelchair", "wifi", "windows", "won", "wordpress", "wrench", "xing", "xing-square", "yahoo", "yelp", "yen", "youtube", "youtube-play", "youtube-square");
return $fa_array;
}
//
function the_wp_qty_array() {
	// Disabled-numbers Array
    return array( '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30',  );
}



?>