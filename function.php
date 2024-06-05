<?php

//SMTP Setup
// Function to configure SMTP settings
function configure_smtp( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = get_theme_mod( 'smtp_host' );
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Port       = get_theme_mod( 'smtp_port' );
    $phpmailer->Username   = get_theme_mod( 'smtp_username' );
    $phpmailer->Password   = get_theme_mod( 'smtp_password' );
    $phpmailer->SMTPSecure = get_theme_mod( 'smtp_encryption' );
    $phpmailer->From       = get_theme_mod( 'smtp_from' );
    $phpmailer->FromName   = get_theme_mod( 'smtp_from_name' );
}

add_action( 'phpmailer_init', 'configure_smtp' );

function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'smtp_settings', array(
        'title'    => __( 'SMTP Settings', 'mytheme' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'smtp_host', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'smtp_port', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'smtp_username', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'smtp_password', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'smtp_from', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'smtp_from_name', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'smtp_encryption', array(
        'default'   => 'tls',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'smtp_host', array(
        'label'    => __( 'SMTP Host', 'mytheme' ),
        'section'  => 'smtp_settings',
        'settings' => 'smtp_host',
        'type'     => 'text',
    ) );

    $wp_customize->add_control( 'smtp_port', array(
        'label'    => __( 'SMTP Port', 'mytheme' ),
        'section'  => 'smtp_settings',
        'settings' => 'smtp_port',
        'type'     => 'number',
    ) );

    $wp_customize->add_control( 'smtp_username', array(
        'label'    => __( 'SMTP Username', 'mytheme' ),
        'section'  => 'smtp_settings',
        'settings' => 'smtp_username',
        'type'     => 'text',
    ) );

    $wp_customize->add_control( 'smtp_password', array(
        'label'    => __( 'SMTP Password', 'mytheme' ),
        'section'  => 'smtp_settings',
        'settings' => 'smtp_password',
        'type'     => 'password',
    ) );

    $wp_customize->add_control( 'smtp_from', array(
        'label'    => __( 'From Email', 'mytheme' ),
        'section'  => 'smtp_settings',
        'settings' => 'smtp_from',
        'type'     => 'text',
    ) );

    $wp_customize->add_control( 'smtp_from_name', array(
        'label'    => __( 'From Name', 'mytheme' ),
        'section'  => 'smtp_settings',
        'settings' => 'smtp_from_name',
        'type'     => 'text',
    ) );

    $wp_customize->add_control( 'smtp_encryption', array(
        'label'    => __( 'SMTP Encryption', 'mytheme' ),
        'section'  => 'smtp_settings',
        'settings' => 'smtp_encryption',
        'type'     => 'select',
        'choices'  => array(
            ''    => 'None',
            'ssl' => 'SSL',
            'tls' => 'TLS',
        ),
    ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );
?>
