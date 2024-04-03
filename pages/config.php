<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
$t_title = plugin_lang_get( 'title' );
layout_page_header( $t_title );
layout_page_begin( 'manage_overview_page.php' );
print_manage_menu();
?>

<br/>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container">

	<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
		<?php echo form_security_field( 'plugin_simplescreen_config_update' ) ?>

		<fieldset>
			<div class="widget-box widget-color-blue2">
				<div class="widget-header widget-header-small">
					<h4 class="widget-title lighter">
						<i class="ace-icon fa fa-exchange"></i>
						<?php echo plugin_lang_get( 'config' ); ?>
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						<div class="table-responsive">
							<table class="table table-bordered table-condensed table-striped">
								<tr>
									<td class="category">
										<?php echo plugin_lang_get( 'threshold' ) ?>
									</td>
									<td>
										<select id="simple_threshold"
												name="simple_threshold"
												class="input-sm"><?php
											print_enum_string_option_list(
												'access_levels',
												plugin_config_get( 'simple_threshold' )
											); ?>
										</select>
									</td>
									</tr>
									<tr>
									<td>
									<?php echo plugin_lang_get( 'fields' ) ?>
									</td>
									<td>
									
									<?php
									$allfields = config_get( 'bug_report_page_fields' );
									$selectedfields = plugin_config_get( 'simple_fields' );
									?>
									<select name="simple_fields[]" multiple="multiple"><?php
									foreach($allfields as $option){
										if(!empty($selectedfields)){

											if(in_array($option,$selectedfields)){
												?><option selected="selected" value="<?php echo $option;?>"><?php echo $option;?></option><?php
											} else {
												?><option value="<?php echo $option;?>"><?php echo $option;?></option><?php
											}

										} else {
											?><option value="<?php echo $option;?>"><?php echo $option;?></option><?php
										}
									}

									?></select>
									
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="widget-toolbox padding-8 clearfix">
						<input type="submit"
							   class="btn btn-primary btn-white btn-round"
							   value="<?php echo lang_get( 'change_configuration' ) ?>"/>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>
</div>

<?php
layout_page_end();
