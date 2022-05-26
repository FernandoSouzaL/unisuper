<?php
	include '../../../../../wp-load.php';

	switch ($_GET['acao']) {

		case 'busca_ofertas':

			$post_id = $_POST["valueId"]; ?>

      <?php 
        $pdf =  get_field('pdf', $post_id); 
        if(!empty($pdf)) {
          echo $pdf;
        } else {
          echo '<h2 class="o-ttl--center">Nenhum PDF encontrado!</h2>';
        }
      ?>

	<?php	break;

		}
?>
