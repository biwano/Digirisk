window.digirisk.user = {};

window.digirisk.user.init = function() {
	window.digirisk.user.event();
};

/**
 * Initialise l'évènement relatif à la pagination.
 *
 * @return {void}
 *
 * @since 1.0
 * @version 6.2.4.0
 */
window.digirisk.user.event = function() {
	jQuery( document ).on( 'click', '.form-edit-user-assign .wp-digi-pagination a', window.digirisk.user.pagination );
};

/**
 * Le callback en cas de réussite à la requête Ajax "edit_user_assign".
 * Appel la méthode render de l'objet user avec la réponse de la requête Ajax.
 *
 * @param  {HTMLDivElement} triggeredElement  L'élement HTML déclenchant la requête Ajax.
 * @param  {Object}         response          Les données renvoyées par la requête Ajax.
 * @return {void}
 *
 * @since 1.0
 * @version 6.2.4.0
 */
window.digirisk.user.editUserAssignSuccess = function( triggeredElement, response ) {
	window.digirisk.user.render( response );
};

/**
 * Le callback en cas de réussite à la requête Ajax "detach_user".
 * Appel la méthode render de l'objet user avec la réponse de la requête Ajax.
 *
 * @param  {HTMLDivElement} triggeredElement  L'élement HTML déclenchant la requête Ajax.
 * @param  {Object}         response          Les données renvoyées par la requête Ajax.
 * @return {void}
 *
 * @since 1.0
 * @version 6.2.4.0
 */
window.digirisk.user.detachUserSuccess = function( triggeredElement, response ) {
	window.digirisk.user.render( response );
};

/**
 * Remplaces le contenu de la section ".users" avec la réponse de la requête Ajax de editUserAssignSuccess et detachUserSuccess.
 *
 * @param  {Object} response Les données renvoyées par la requête Ajax.
 * @return {void}
 *
 * @since 1.0
 * @version 6.2.5.0
 */
window.digirisk.user.render = function( response ) {
	jQuery( 'section.users' ).replaceWith( response.data.template );
	window.digirisk.render.call_render_changed();
};

window.digirisk.user.pagination = function( event ) {
	event.preventDefault();

	var href = jQuery( this ).attr( 'href' ).split( '&' );
	var next_page = href[1].replace('current_page=', '');
	var element_id = href[2].replace('element_id=', '');

	var data = {
		action: 'paginate_user',
		element_id: element_id,
		next_page: next_page
	};

	jQuery( '.form-edit-user-assign' ).addClass( 'loading' );

	jQuery.post( window.ajaxurl, data, function( view ) {
		jQuery( '.form-edit-user-assign' ).replaceWith( view );
	} );
};
