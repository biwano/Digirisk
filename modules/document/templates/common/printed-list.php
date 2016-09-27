<?php if ( !defined( 'ABSPATH' ) ) exit;

if ( !empty( $list_document ) ):
	?>
	<ul class="wp-digi-list wp-digi-table wp-digi-list-document">
	<?php
  foreach ( $list_document as $element ):
		require( WPDIGI_DOC_TEMPLATES_MAIN_DIR . 'common/printed-list-item.php' );
  endforeach;
	?>
	</ul>
	<?php
else:
	_e( 'There is no document yet', 'digirisk' );
endif;
?>
