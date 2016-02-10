<?php
require_once get_template_directory() . '/inc/options-config.php';
require_once get_template_directory() . '/inc/admin/class-customizer-api-wrapper.php';

$obj = new TheWP_Customizer_API_Wrapper($options);