<?php
/**
 * clisstore_theme Theme Customizer
 *
 * @package clisstore_theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function clisstore_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'clisstore_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'clisstore_theme_customize_partial_blogdescription',
			)
		);
	}

	// Añadir sección para el encabezado
    $wp_customize->add_section( 'header_background_section' , array(
        'title'      => __( 'Fondo del Encabezado', 'mytheme' ),
        'priority'   => 30,
    ) );

    // Añadir configuración para la imagen de fondo
    $wp_customize->add_setting( 'header_background_image' );

    // Control para subir la imagen
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_background_image', array(
        'label'    => __( 'Imagen de Fondo del Encabezado', 'mytheme' ),
        'section'  => 'header_background_section',
        'settings' => 'header_background_image',
    ) ) );

    // Añadir configuración para el título
    $wp_customize->add_setting( 'header_title', array(
        'default'   => __( 'Título del Encabezado', 'mytheme' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    // Control para el título
    $wp_customize->add_control( 'header_title', array(
        'label'    => __( 'Título del Encabezado', 'mytheme' ),
        'section'  => 'header_background_section',
        'type'     => 'text',
    ) );

    // Añadir configuración para el texto
    $wp_customize->add_setting( 'header_text', array(
        'default'   => __( 'Texto del Encabezado', 'mytheme' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    // Control para el texto
    $wp_customize->add_control( 'header_text', array(
        'label'    => __( 'Texto del Encabezado', 'mytheme' ),
        'section'  => 'header_background_section',
        'type'     => 'textarea',
    ) );

    // Añadir configuración para el primer botón
    $wp_customize->add_setting( 'cta_button_1_text', array(
        'default'   => __( 'Botón 1', 'mytheme' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

	// Control para el primer botón
    $wp_customize->add_control( 'cta_button_1_text', array(
        'label'    => __( 'Texto del Botón 1', 'mytheme' ),
        'section'  => 'header_background_section',
        'type'     => 'text',
    ) );

    // Añadir configuración para la URL del primer botón
    $wp_customize->add_setting( 'cta_button_1_url', array(
        'default'   => '#',
        'sanitize_callback' => esc_url_raw,
    ) );

    // Control para la URL del primer botón
    $wp_customize->add_control( 'cta_button_1_url', array(
        'label'    => __( 'URL del Botón 1', 'mytheme' ),
        'section'  => 'header_background_section',
        'type'     => 'url',
    ) );

    // Section 1: Banner Section
    $wp_customize->add_section('banner_section', array(
        'title' => __('Banner Settings', 'your-textdomain'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('banner_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner_image', array(
        'label' => __('Banner Image', 'your-textdomain'),
        'section' => 'banner_section',
        'settings' => 'banner_image',
    )));

    $wp_customize->add_setting('street_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('street_address', array(
        'label' => __('Street Address', 'your-textdomain'),
        'section' => 'banner_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('short_headline', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('short_headline', array(
        'label' => __('Short Headline', 'your-textdomain'),
        'section' => 'banner_section',
        'type' => 'text',
    ));

    // Section 2: Shipping Features
    $wp_customize->add_section('shipping_features_section', array(
        'title' => __('Shipping Features', 'your-textdomain'),
        'priority' => 31,
    ));

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("shipping_feature_$i", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control("shipping_feature_$i", array(
            'label' => __("Shipping Feature Box $i", 'your-textdomain'),
            'section' => 'shipping_features_section',
            'type' => 'text',
        ));
    }

    // Section 3: Call to Action Banner
    $wp_customize->add_section('cta_banner_section', array(
        'title' => __('Call to Action Banner', 'your-textdomain'),
        'priority' => 32,
    ));

    $wp_customize->add_setting('cta_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cta_title', array(
        'label' => __('CTA Title', 'your-textdomain'),
        'section' => 'cta_banner_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cta_button_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cta_button_text', array(
        'label' => __('CTA Button Text', 'your-textdomain'),
        'section' => 'cta_banner_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('cta_button_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('cta_button_url', array(
        'label' => __('CTA Button URL', 'your-textdomain'),
        'section' => 'cta_banner_section',
        'type' => 'url',
    ));

    // Add a section for Social Media
    $wp_customize->add_section('social_media_section', array(
        'title'    => __('Social Media', 'your_theme_textdomain'),
        'priority' => 30,
    ));

    // Add setting for Instagram URL
    $wp_customize->add_setting('instagram_url', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for Instagram URL
    $wp_customize->add_control('instagram_url', array(
        'label'      => __('Instagram URL', 'your_theme_textdomain'),
        'section'    => 'social_media_section',
        'type'       => 'url',
    ));

    // Add setting for WhatsApp phone number
    $wp_customize->add_setting('whatsapp_number', array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for WhatsApp phone number
    $wp_customize->add_control('whatsapp_number', array(
        'label'      => __('WhatsApp Phone Number', 'your_theme_textdomain'),
        'section'    => 'social_media_section',
        'type'       => 'text',
    ));

    // Pop-up section
    $wp_customize->add_section('popup_section', array(
        'title' => __('Pop-Up Section', 'your-textdomain'),
        'priority' => 60,
    ));

    // Añadir configuración para la imagen de fondo
    $wp_customize->add_setting( 'popup_background_image' );

    // Control para subir la imagen
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'popup_background_image', array(
        'label'    => __( 'Imagen de Fondo', 'mytheme' ),
        'section'  => 'popup_section',
        'settings' => 'popup_background_image',
    )));
}
add_action( 'customize_register', 'clisstore_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function clisstore_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function clisstore_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function clisstore_theme_customize_preview_js() {
	wp_enqueue_script( 'clisstore_theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'clisstore_theme_customize_preview_js' );
