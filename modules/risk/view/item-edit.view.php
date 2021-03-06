<?php
/**
 * Edition d'un risque
 *
 * @author Jimmy Latour <jimmy@evarisk.com>
 * @since 6.2.1.0
 * @version 6.2.4.0
 * @copyright 2015-2017 Evarisk
 * @package risk
 * @subpackage view
 */

namespace digi;

if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<tr class="risk-row edit">

	<!-- Les champs obligatoires pour le formulaire -->
	<input type="hidden" name="action" value="edit_risk" />
	<input type="hidden" name="parent_id" value="<?php echo esc_attr( $society_id ); ?>" />
	<input type="hidden" name="risk[id]" value="<?php echo esc_attr( $risk->id ); ?>" />

	<td class="padding">
		<?php do_shortcode( '[digi_evaluation_method_evarisk risk_id=' . $risk->id . ' type="risk"]' ); ?>
		<span><strong><?php echo esc_html( $risk->unique_identifier . ' - ' . $risk->evaluation->unique_identifier ); ?></span></strong>
	</td>
	<td class="wm130 w150">
		<?php do_shortcode( '[dropdown_danger id="' . $risk->id . '" type="risk" display="' . ( ( $risk->id !== 0 ) ? "view" : "edit" ) . '"]' ); ?>
	</td>
	<td class="w50">
		<?php do_shortcode( '[digi_evaluation_method risk_id=' . $risk->id . ']' ); ?>
	</td>
	<td class="w50">
		<?php do_shortcode( '[eo_upload_button id="' . $risk->id . '" type="risk"]' ); ?>
	</td>
	<td class="padding">
		<?php do_shortcode( '[digi_comment id="' . $risk->id . '" namespace="digi" type="risk_evaluation_comment" display="edit"]' ); ?>
	</td>
	<td>
		<?php if ( 0 !== $risk->id ) : ?>
			<div class="action grid-layout w3">
				<div data-parent="risk-row" data-loader="table" class="button w50 green save action-input"><i class="icon fa fa-floppy-o"></i></div>
			</div>
		<?php else : ?>
			<div class="action grid-layout w3">
				<div data-module="risk" data-before-method="beforeSaveRisk" data-loader="table" data-parent="risk-row" class="button w50 disable add action-input progress"><i class="icon fa fa-plus"></i></div>
			</div>
		<?php endif; ?>
	</td>
</tr>
