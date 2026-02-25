<?php
/**
 * Tempestad functions and definitions
 */

function tempestad_enqueue_scripts() {
    // En desarrollo, podrías apuntar a tu servidor de Vite
    // En producción, cargamos los archivos compilados de la carpeta /dist
    
    $dist_path = get_template_directory() . '/dist/assets/';
    $dist_uri = get_template_directory_uri() . '/dist/assets/';

    if (file_exists($dist_path)) {
        $files = scandir($dist_path);
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'js') {
                wp_enqueue_script('tempestad-react', $dist_uri . $file, array(), null, true);
            }
            if (pathinfo($file, PATHINFO_EXTENSION) === 'css') {
                wp_enqueue_style('tempestad-styles', $dist_uri . $file, array(), null);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'tempestad_enqueue_scripts');

// Eliminar márgenes innecesarios de WP
add_theme_support('admin-bar', array('callback' => '__return_false'));

// Pasar datos de WordPress a React (opcional)
function tempestad_pass_wp_data() {
    wp_localize_script('tempestad-react', 'wpData', array(
        'apiUrl' => esc_url_raw(rest_url()),
        'nonce' => wp_create_nonce('wp_rest'),
        'siteName' => get_bloginfo('name'),
        'siteDescription' => get_bloginfo('description'),
    ));
}
add_action('wp_enqueue_scripts', 'tempestad_pass_wp_data', 20);
