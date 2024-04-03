<?php
/**
 * SimpleScreen plugin for MantisBT
 * https://github.com/mantisbt-plugins/CustomReporter
 *
 * Copyright (c) 2024  Cas Nuy
 *
 * SimpleScreen is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class SimpleScreenPlugin extends MantisPlugin {

	function register() {
		$this->name = plugin_lang_get( 'title' );
		$this->description = plugin_lang_get( 'description' );
		$this->page = 'config';
		$this->version = '1.0.0';
		$this->requires = array( 'MantisCore' => '2.0.0', );
		$this->author = 'Cas Nuy';
		$this->contact = 'cas-at-nuy.info';
		$this->url = 'https://github.com/mantisbt-plugins/SimpleScreen';
	}

	function config() {
		return array(
			'simple_threshold'	=> REPORTER,
			'simple_fields'		=> array(
				'additional_info',
				'attachments',
				'category_id',
				'date_submitted',
				'description',
				'due_date',
				'eta',
				'fixed_in_version',
				'handler',
				'id',
				'last_updated',
				'os',
				'os_build',
				'platform',
				'priority',
				'product_build',
				'product_version',
				'project',
				'projection',
				'reporter',
				'reproducibility',
				'resolution',
				'severity',
				'status',
				'steps_to_reproduce',
				'summary',
				'tags',
				'target_version',
				'view_state',
				),
			);
	}

	function init() {
		event_declare('EVENT_SIMPLE_SCREEN', EVENT_TYPE_CHAIN);
		plugin_event_hook( 'EVENT_SIMPLE_SCREEN', 'setfields' );
	}

	function setfields( $p_event, $t_fields ) {
		$t_user_id		= auth_get_current_user_id();
		$p_project_id	= helper_get_current_project();
		$t_access_level = user_get_access_level( $t_user_id, $p_project_id );
		if ( $t_access_level > plugin_config_get( 'simple_threshold' ) ) {
			$t_fields = config_get( 'bug_report_page_fields' ) ;
		} else {
			$t_fields = plugin_config_get( 'simple_fields' ) ;
		}
		return $t_fields;
	}

}