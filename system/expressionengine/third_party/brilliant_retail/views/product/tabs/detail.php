<?php
/************************************************************/
/*	BrilliantRetail 										*/
/*															*/
/*	@package	BrilliantRetail								*/
/*	@Author		David Dexter 								*/
/* 	@copyright	Copyright (c) 2011, Brilliant2.com 			*/
/* 	@license	http://brilliantretail.com/license.html		*/
/* 	@link		http://brilliantretail.com 					*/
/*															*/
/************************************************************/
/* NOTICE													*/
/*															*/
/* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF 	*/
/* ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED	*/
/* TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 		*/
/* PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT 		*/
/* SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY */
/* CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION	*/
/* OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR 	*/
/* IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 		*/
/* DEALINGS IN THE SOFTWARE. 								*/	
/************************************************************/

/****************/
/* Details Tab	*/
/****************/
?>
<table id="product_detail_tbl" cellspacing="0" cellpadding="0" border="0" class="mainTable edit_form" style="margin-top:5px;">
		<tr>
			<th>
				<?php
					if($products[0]["product_id"] == 0){
						echo lang('br_new_product');
					}else{
						echo $products[0]["title"].' ['.$hidden["product_id"].']';
					}
				?></th>
		</tr>
		<tr>
			<td class="custom_field">
				<label><em class="required">*</em> <?=lang('br_product_type')?> - <?=$type?></label>
				<?=$sub_type?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><em class="required">*</em> <?=lang('br_product_title')?></label>
				<br />
				<?=form_input(
								array(	'name' => 'title', 
										'id' => 'title',
										'value' => $products[0]["title"],
										'class' => '{required:true}',
										'title' => lang('br_details').' - '.lang('br_product_title').' '.lang('br_is_required'))
							)?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><em class="required">*</em> <?=lang('br_url_title')?></label>
				<br />
				<?=form_input(
								array(	'name' => 'url', 
										'id' => 'url',
										'value' => $products[0]["url"],
										'class' => '',
										'title' => lang('br_details').' - '.lang('br_url_title').' '.lang('br_is_required'))
								)?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><?=lang('br_product_detail')?></label>
				<br />
				<?=form_textarea(
											array(	'name' => 'detail', 
													'value' => $products[0]["detail"],
													'title' => lang('br_details').' - '.lang('br_description').' '.lang('br_is_required'),
													'class' => 'ckeditor',
													'style' => 'width:400px')
										)?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><?=lang('status')?></label>
				<br />
				<?=form_dropdown('enabled', array(1 => lang('br_enabled'), 0 => lang('br_disabled')), $products[0]["enabled"])?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><?=lang('br_product_sku').' *'?></label>
				<br />
				<?=form_input(
										array(	'name' => 'sku', 
												'value' => $products[0]["sku"],
												'class' => '{required:true}',
												'title' => lang('br_details').' - '.lang('br_product_sku').' '.lang('br_is_required'))
										)?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><?=lang('br_shippable')?></label>
				<br />
				<?=form_dropdown('shippable', array(1 => lang('br_yes'), 0 => lang('br_no')), $products[0]["shippable"])?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><?=lang('br_product_weight')?></label>
				<br />
				<?=form_input(	array(	'name' => 'weight', 
										'value' => $products[0]["weight"],
										'class' => '',
										'title' => lang('br_details').' - '.lang('br_product_weight'))
								)?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><?=lang('br_featured')?></label>
				<br />
				<?=form_dropdown('featured', array(1 => lang('br_yes'), 0 => lang('br_no')), $products[0]["featured"])?></td>
		</tr>
		<tr>
			<td class="custom_field">
				<label><?=lang('br_quantity')?></label>
				<br />
				<?=form_input(
								array(	'name' => 'quantity', 
										'value' => $products[0]["quantity"],
										'title' => lang('br_details').' - '.lang('br_quantity'))
								)?></td>
		</tr>
</table>		


				<div class="publish_field" id="hold_br_taxable">

					<label class="hide_field">
						<span>
							<?=lang('br_taxable')?>
						</span>
					</label>
	
					<div id="sub_hold_br_cost">
						<fieldset class="holder">
							<?=form_dropdown(	
									'taxable', 
									array(	1 => lang('br_yes'), 
											0 => lang('br_no')), 
									$products[0]["taxable"])
								?>
						</fieldset>
					</div> <!-- /sub_hold_field -->

				</div>


				<div class="publish_field" id="hold_br_cost">

					<label class="hide_field">
						<span>
							<?=lang('br_cost')?>
						</span>
					</label>
	
					<div id="sub_hold_br_cost">
						<fieldset class="holder">
							<?=form_input(	array(	'name' => 'cost', 
													'class' => '',
													'title' => lang('br_cost'),
													'value' => $products[0]["cost"])
											)?>
						</fieldset>
					</div> <!-- /sub_hold_field -->

				</div>
		<?php
			foreach($custom as $c){
		?>			
				<div class="publish_field publish_<?=$c["settings"]['field_type']?>" id="hold_field_<?=$c["settings"]['field_id']?>">

				<label class="hide_field">
					<span>
						<?php if($c["settings"]['field_required'] == 'y'){ required(); } ?>
							<?=$c["settings"]['field_label']?>
					</span>
				</label>

				<div id="sub_hold_field_<?=$c["settings"]['field_id']?>">
										
										<?php if($c["settings"]['field_instructions'] != ''):?>
											<div class="instruction_text">
												<?=auto_typography('<strong>'.$this->lang->line('instructions').'</strong>'.NBS.$c["settings"]['field_instructions'])?>
											</div>
										<?php endif;?>
										
										<fieldset class="holder">
											<?=isset($c["settings"]['string_override']) ? $c["settings"]['string_override'] : $c["display_field"]?>
											<?=form_error($c["settings"]["field_name"])?>

										<?php if ($c["settings"]['has_extras']): ?>
											<p class="spellcheck markitup">

												<?php if ($c["settings"]['field_show_writemode'] == 'y'):?>
													<a href="#" class="write_mode_trigger" id="id_<?=$c["settings"]['field_id']?>" title="<?=lang('write_mode')?>"><img alt="<?=lang('write_mode')?>" width="22" height="21" src="<?=$cp_theme_url?>images/publish_write_mode.png" /></a> 
												<?php endif;?>

												<?php if ($c["settings"]['field_show_file_selector'] == 'y' && count($file_list) > 0):?>
													<a href="#" class="markItUpButton">
													<img class="file_manipulate js_show" src="<?=$cp_theme_url?>images/publish_format_picture.gif" alt="<?=lang('file')?>" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<?php endif;?>

												<?php if($spell_enabled && $c["settings"]['field_show_spellcheck'] == 'y'):?>
													<a href="#" class="spellcheck_link" id="spelltrigger_<?=(ctype_digit($c["settings"]['field_id']))?'field_id_':''?><?=$c["settings"]['field_id']?>" title="<?=lang('check_spelling')?>"><img src="<?=$cp_theme_url.'images/spell_check_icon.png'?>" style="margin-bottom: -8px;" alt="<?=lang('check_spelling')?>" /></a>
												<?php endif;?>

												<?php if($c["settings"]['field_show_glossary'] == 'y'):?>
													<a href="#" class="glossary_link" title="<?=lang('glossary')?>"><img src="<?=$cp_theme_url.'images/spell_check_glossary.png'?>" style="margin-bottom: -8px;" alt="<?=lang('glossary')?>" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<?php endif;?>

												<?php if ($smileys_enabled && $c["settings"]['field_show_smileys'] == 'y'):?>
													<a href="#" class="smiley_link" title="<?=lang('emoticons')?>"><?=lang('emoticons')?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<?php endif;?>
												
												<?php if ($c["settings"]['field_show_fmt'] == 'y' && count($c["settings"]['field_fmt_options']) > 0):?>
													<?=lang('formatting')?>
													<?=form_dropdown('field_ft_'.$c["settings"]['field_id'], $c["settings"]['field_fmt_options'], $c["settings"]['field_fmt'])?> 
												<?php endif;?>

											</p>

											<?php if($spell_enabled && $c["settings"]['field_show_spellcheck'] == 'y'):
												echo build_spellcheck($c["settings"]["field_name"]);
											endif;?>

											<?php if($c["settings"]['field_show_glossary'] == 'y'):
												echo $glossary_items;
											endif;?>
											<?php if(isset($c["settings"]['smiley_table'])):
												echo $c["settings"]['smiley_table'];
											endif;?>
										<?php endif; ?>
										
										</fieldset>
	
									</div> <!-- /sub_hold_field -->
				</div>
<?php
/*				
				
				
				
				echo '	<p>&nbsp;</p>
						<table cellspacing="0" cellpadding="0" border="0" class="mainTable edit_form" style="margin-top:5px;">
							<tr>
								<th>'.$c["settings"]["field_label"].'</th>
							</tr>';
				if($c["settings"]["field_instructions"] != ""){
					echo '	<tr>
								<td class="custom_field">'.$c["settings"]["field_instructions"].'</td>
							</tr>';
				}			
					
				echo '		<tr>
								<td class="custom_field publish_field" id="hold_field_'.$c["settings"]["field_id"].'">'.$c["display_field"];
?>

				<p class="spellcheck markitup">

					<?php if ($c["settings"]['field_show_writemode'] == 'y'):?>
						<a href="#" class="write_mode_trigger" id="id_<?=$c["settings"]['field_id']?>" title="<?=lang('write_mode')?>"><img alt="<?=lang('write_mode')?>" width="22" height="21" src="<?=$cp_theme_url?>images/publish_write_mode.png" /></a> 
					<?php endif;?>
					
					<?php if ($c["settings"]['field_show_file_selector'] == 'y' && count($file_list) > 0):?>
						<a href="#" class="markItUpButton">
						<img class="file_manipulate js_show" src="<?=$cp_theme_url?>images/publish_format_picture.gif" alt="<?=lang('file')?>" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php endif;?>
					
					<?php if($spell_enabled && $c["settings"]['field_show_spellcheck'] == 'y'):?>
						<a href="#" class="spellcheck_link" id="spelltrigger_<?=(ctype_digit($c["settings"]['field_id']))?'field_id_':''?><?=$c["settings"]['field_id']?>" title="<?=lang('check_spelling')?>"><img src="<?=$cp_theme_url.'images/spell_check_icon.png'?>" style="margin-bottom: -8px;" alt="<?=lang('check_spelling')?>" /></a>
					<?php endif;?>
					
					<?php if($c["settings"]['field_show_glossary'] == 'y'):?>
						<a href="#" class="glossary_link" title="<?=lang('glossary')?>"><img src="<?=$cp_theme_url.'images/spell_check_glossary.png'?>" style="margin-bottom: -8px;" alt="<?=lang('glossary')?>" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php endif;?>
					
					<?php if ($smileys_enabled && $c["settings"]['field_show_smileys'] == 'y'):?>
						<a href="#" class="smiley_link" title="<?=lang('emoticons')?>"><?=lang('emoticons')?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php endif;?>
					
					<?php if ($c["settings"]['field_show_fmt'] == 'y' && count($c["settings"]['field_fmt_options']) > 0):?>
						<?=lang('formatting')?>
						<?=form_dropdown('field_ft_'.$c["settings"]['field_id'], $c["settings"]['field_fmt_options'], $c["settings"]['field_fmt'])?> 
					<?php endif;?>
					
					</p>
					
					<?php if($spell_enabled && $c["settings"]['field_show_spellcheck'] == 'y'):
					echo build_spellcheck($c["settings"]["field_name"]);
					endif;?>
					
					<?php if($c["settings"]['field_show_glossary'] == 'y'):
					echo $glossary_items;
					endif;?>
					<?php if(isset($c["settings"]['smiley_table'])):
					echo $c["settings"]['smiley_table'];
					endif;?>
		<?php
			echo '				</td>
							</tr>
						</table>';
			
		*/
			}
		
		?>

<script type="text/javascript">
	$(function(){
		<?php
			if($hidden["product_id"] == 0){
		?>
				$('#title').bind('keyup',function(){
					var a = $(this);
					var str = a.val().toLowerCase();
					var sep = "-";
					var tmp = '';
					for(var pos=0; pos < str.length; pos++)
					{
						var c = str.charCodeAt(pos);
						
						if (c >= 32 && c < 128)
						{
							tmp += str.charAt(pos);
						}
						else
						{
							if (c == '223') {tmp += 'ss'; continue;}
							if (c == '224') {tmp += 'a'; continue;}
							if (c == '225') {tmp += 'a'; continue;}
							if (c == '226') {tmp += 'a'; continue;}
							if (c == '229') {tmp += 'a'; continue;}
							if (c == '227') {tmp += 'ae'; continue;}
							if (c == '230') {tmp += 'ae'; continue;}
							if (c == '228') {tmp += 'ae'; continue;}
							if (c == '231') {tmp += 'c'; continue;}
							if (c == '232') {tmp += 'e'; continue;}
							if (c == '233') {tmp += 'e'; continue;}
							if (c == '234') {tmp += 'e'; continue;}
							if (c == '235') {tmp += 'e'; continue;}
							if (c == '236') {tmp += 'i'; continue;}
							if (c == '237') {tmp += 'i'; continue;}
							if (c == '238') {tmp += 'i'; continue;}
							if (c == '239') {tmp += 'i'; continue;}
							if (c == '241') {tmp += 'n'; continue;}
							if (c == '242') {tmp += 'o'; continue;}
							if (c == '243') {tmp += 'o'; continue;}
							if (c == '244') {tmp += 'o'; continue;}
							if (c == '245') {tmp += 'o'; continue;}
							if (c == '246') {tmp += 'oe'; continue;}
							if (c == '249') {tmp += 'u'; continue;}
							if (c == '250') {tmp += 'u'; continue;}
							if (c == '251') {tmp += 'u'; continue;}
							if (c == '252') {tmp += 'ue'; continue;}
							if (c == '255') {tmp += 'y'; continue;}
							if (c == '257') {tmp += 'aa'; continue;}
							if (c == '269') {tmp += 'ch'; continue;}
							if (c == '275') {tmp += 'ee'; continue;}
							if (c == '291') {tmp += 'gj'; continue;}
							if (c == '299') {tmp += 'ii'; continue;}
							if (c == '311') {tmp += 'kj'; continue;}
							if (c == '316') {tmp += 'lj'; continue;}
							if (c == '326') {tmp += 'nj'; continue;}
							if (c == '353') {tmp += 'sh'; continue;}
							if (c == '363') {tmp += 'uu'; continue;}
							if (c == '382') {tmp += 'zh'; continue;}
							if (c == '256') {tmp += 'aa'; continue;}
							if (c == '268') {tmp += 'ch'; continue;}
							if (c == '274') {tmp += 'ee'; continue;}
							if (c == '290') {tmp += 'gj'; continue;}
							if (c == '298') {tmp += 'ii'; continue;}
							if (c == '310') {tmp += 'kj'; continue;}
							if (c == '315') {tmp += 'lj'; continue;}
							if (c == '325') {tmp += 'nj'; continue;}
							if (c == '352') {tmp += 'sh'; continue;}
							if (c == '362') {tmp += 'uu'; continue;}
							if (c == '381') {tmp += 'zh'; continue;}
						}
					}
		    		
					var multiReg = new RegExp(sep + '{2,}', 'g');
					
					str = tmp;
					
					str = str.replace('/<(.*?)>/g', '');
					str = str.replace(/\s+/g, sep);
					str = str.replace(/\//g, sep);
					str = str.replace(/[^a-z0-9\-\._]/g,'');
					str = str.replace(/\+/g, sep);
					str = str.replace(multiReg, sep);
					str = str.replace(/-$/g,'');
					str = str.replace(/_$/g,'');
					str = str.replace(/^_/g,'');
					str = str.replace(/^-/g,'');
					str = str.replace(/\.+$/g,'');
			
					$('#url').val(str);
				});
		<?php	
			}
		?>
	})
</script>