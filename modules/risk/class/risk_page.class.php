<?php namespace digi;

if ( !defined( 'ABSPATH' ) ) exit;
/**
* Fichier du controlleur principal de l'extension digirisk pour wordpress / Main controller file for digirisk plugin
*
* @author Evarisk development team <dev@evarisk.com>
* @version 6.0
*/

/**
* Classe du controlleur principal de l'extension digirisk pour wordpress / Main controller class for digirisk plugin
*
* @author Evarisk development team <dev@evarisk.com>
* @version 6.0
*/
class risk_page_class extends singleton_util {
	protected function construct() {}

	public function display() {
		view_util::exec( 'risk', 'page/main' );
	}

	public function display_risk_list() {
		$risk_list = risk_class::g()->get( array(), array( 'comment', 'evaluation_method', 'evaluation', 'danger_category', 'danger' ) );

		if ( !empty( $risk_list ) ) {
		  foreach ( $risk_list as $key => $element ) {
				$risk_list[$key]->parent = society_class::g()->show_by_type( $element->parent_id );
				if ( $risk_list[$key]->parent->type == 'digi-group' ) {
					$risk_list[$key]->parent_group = $risk_list[$key]->parent;
				}
				else {
					$risk_list[$key]->parent_workunit = $risk_list[$key]->parent;
					$risk_list[$key]->parent_group = society_class::g()->show_by_type( $risk_list[$key]->parent_workunit->parent_id );
				}
		  }
		}

		unset ($element);

		view_util::exec( 'risk', 'page/list', array( 'risk_list' => $risk_list ) );
	}
}