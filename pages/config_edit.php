<?php
# authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

# Read results
form_security_validate( 'plugin_simplescreen_config_update' );
$f_simple_threshold = gpc_get_int( 'simple_threshold', REPORTER );
$f_simple_fields = gpc_get_string_array( 'simple_fields' );

# update results
plugin_config_set( 'simple_threshold', $f_simple_threshold );
plugin_config_set( 'simple_fields', $f_simple_fields );
form_security_purge( 'plugin_simplescreen_config_update' );

# redirect
print_successful_redirect( plugin_page( 'config', true ) );
