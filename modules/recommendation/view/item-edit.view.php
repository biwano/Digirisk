<?php namespace digi;

if ( !defined( 'ABSPATH' ) ) exit; ?>

<li class="wp-digi-list-item wp-digi-recommendation-item <?php echo empty ( $recommendation->id ) ? 'wp-digi-recommendation-item-new': ''; ?>" data-recommendation-id="<?php echo $recommendation->id; ?>">
	<input type="hidden" name="action" value="save_recommendation" />
	<input type="hidden" name="parent_id" value="<?php echo $society_id; ?>" />
	<input type="hidden" name="id" value="<?php echo $recommendation->id; ?>" />
	<?php do_shortcode( '[eo_upload_button id="' . $recommendation->id . '" type="recommendation"]' ); ?>
	<span class="wp-digi-recommendation-list-column-reference"><?php echo !empty( $recommendation->unique_identifier ) ? $recommendation->unique_identifier : 'RE0'; ?></span>
	<?php do_shortcode( '[dropdown_recommendation id="' . $recommendation->id . '" type="recommendation"]' ); ?>
	<span><?php echo $recommendation->title; ?></span>
	<?php do_shortcode( '[digi_comment id="' . $recommendation->id . '" type="recommendation"]'); ?>
	<span class="wp-digi-action">
		<a href="#" class="wp-digi-action-edit fa fa-floppy-o" aria-hidden="true"></a>
	</span>
</li>