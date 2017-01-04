<?php
/**
 * Affiches la liste des risques
 *
 * @author Jimmy Latour <jimmy@evarisk.com>
 * @since 6.2.1.0
 * @version 6.2.3.0
 * @copyright 2015-2017 Evarisk
 * @package risk
 * @subpackage view
 */

namespace digi;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<table class="table">
	<thead>
		<tr>
			<th class="padding"><?php esc_html_e( 'Ref', 'digirisk' ); ?>.</th>
			<th><?php esc_html_e( 'Risque', 'digirisk' ); ?></th>
			<th><?php esc_html_e( 'Quot', 'digirisk' ); ?>.</th>
			<th><?php esc_html_e( 'Photo', 'digirisk' ); ?></th>
			<th><?php esc_html_e( 'Commentaire', 'digirisk' ); ?></th>
			<th></th>
		</tr>
	</thead>

	<tbody>
	</tbody>

	<tfoot>
		<?php View_Util::exec( 'risk', 'item-edit', array( 'society_id' => $society_id, 'risk' => $risk_schema ) ); ?>
	</tfoot>
</table>
