/**
 * Initialise l'objet "danger" ainsi que la méthode "init" obligatoire pour la bibliothèque EoxiaJS.
 *
 * @since 1.0
 * @version 6.2.6.0
 */
window.digirisk.danger = {};

window.digirisk.danger.init = function() {
	window.digirisk.danger.event();
};

window.digirisk.danger.event = function() {
	jQuery( document ).on( 'click', '.table.risk .categorie-container.danger .item', window.digirisk.danger.selectDanger );
};

/**
 * Lors du clic sur un danger, remplaces le contenu du toggle et met l'image du risque sélectionné.
 *
 * @param  {MouseEvent} event [description]
 * @return {void}
 *
 * @since 0.1
 * @version 6.2.6.0
 */
window.digirisk.danger.selectDanger = function( event ) {
	var element = jQuery( this );
	element.closest( '.content' ).removeClass( 'active' );
	element.closest( 'tr' ).find( 'input.input-hidden-danger' ).val( element.data( 'id' ) );
	element.closest( '.toggle' ).find( '.action span' ).hide();
	element.closest( '.toggle' ).find( '.action img' ).show();
	element.closest( '.toggle' ).find( '.action img' ).attr( 'src', element.find( 'img' ).attr( 'src' ) );
	element.closest( '.toggle' ).find( '.action img' ).attr( 'srcset', '' );
	element.closest( '.toggle' ).find( '.action img' ).attr( 'sizes', '' );
	element.closest( '.toggle' ).find( '.action img' ).attr( 'aria-label', element.closest( '.tooltip' ).attr( 'aria-label' ) );

	element.closest( '.risk-row' ).find( '.categorie-container.tooltip' ).removeClass( 'active' );
	event.stopPropagation();

	// Rend le bouton "active".
	if ( -1 != element.closest( 'tr' ).find( 'input[name="risk[evaluation][scale]"]' ).val() ) {
		element.closest( 'tr' ).find( '.action .button.disable' ).removeClass( 'disable' ).addClass( 'blue' );
	}
};
