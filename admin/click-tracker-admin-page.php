<?php

// Função para criar a página de administração
function click_tracker_admin_page() {
    add_menu_page(
        'Click Tracker',
        'Click Tracker',
        'manage_options',
        'click_tracker_admin',
        'click_tracker_admin_page_content',
        'dashicons-chart-bar', // Ícone opcional
        30 // Posição no menu
    );
}

// Função para exibir o conteúdo da página de administração
function click_tracker_admin_page_content() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'click_tracker';

    $clicks = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");

    echo '<div class="wrap">';
	echo '<p>Utilize o shortcode <code>[click_tracker_button]</code> nas suas páginas</p>';
    echo '<h1>Click Tracker</h1>';
    echo '<p>Total de Cliques Registrados: ' . $clicks . '</p>';
    echo '</div>';
}

// Adiciona a ação para criar a página de administração
add_action('admin_menu', 'click_tracker_admin_page');
