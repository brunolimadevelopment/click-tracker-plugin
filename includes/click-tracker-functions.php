<?php

	// Função de instalação do plugin
	function click_tracker_install() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'click_tracker';

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			click_time datetime NOT NULL,
			PRIMARY KEY (id)
		) $charset_collate;";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}

	// Função de desinstalação do plugin
	function click_tracker_uninstall() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'click_tracker';

		// Código para remover a tabela do banco de dados, se necessário
		$wpdb->query("DROP TABLE IF EXISTS $table_name");
	}

	// Função para registrar o clique no banco de dados
	add_action('wp_ajax_record_click', 'custom_record_click');

	function custom_record_click() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'click_tracker';

		$wpdb->insert(
			$table_name,
			array('click_time' => current_time('mysql', 1)),
			array('%s')
		);

		wp_die();
	}
