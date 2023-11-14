<?php

	// Adiciona o shortcode [click_tracker_button]
	add_shortcode('click_tracker_button', 'click_tracker_button_shortcode');

	function click_tracker_button_shortcode() {
		ob_start();
		?>
		<button id="click_tracker_button">Clique Aqui</button>
		<script>
			document.getElementById('click_tracker_button').addEventListener('click', function() {
				// Requisição AJAX para registrar o clique
				var xhr = new XMLHttpRequest();
				xhr.open('GET', '<?php echo admin_url('admin-ajax.php'); ?>?action=record_click', true);
				xhr.send();
			});
		</script>
		<?php
		return ob_get_clean();
	}
