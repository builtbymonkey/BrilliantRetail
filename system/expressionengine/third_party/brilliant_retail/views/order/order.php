<?php
/************************************************************/
/*	BrilliantRetail 										*/
/*															*/
/*	@package	BrilliantRetail								*/
/*	@Author		David Dexter  								*/
/* 	@copyright	Copyright (c) 2010-2012						*/
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

$this->table->set_template($cp_pad_table_template); 

$this->table->set_heading(
	array(
			'data' => lang('br_order_id'),
			'style' => 'width:40px'
		),
	array(
			'data' => lang('br_order_date'),
			'style' => 'width:60px'
		),
	array(	
			'data' => lang('br_order_customer'),
			'style' => ''
		),
	array(
			'data' => lang('br_order_amount'),
			'style' => 'width:60px'
		),
	array(
			'data' => lang('br_order_status'),
			'style' => 'width:60px'
		),
	array(
    		'data' => '<input type="checkbox" id="toggle_check" />', 
			'style' => 'text-align:center',
			'width' => '5%')
);
$content = $this->table->generate();
?>

<?=$br_header?>
<?=form_open('D=cp&C=addons_modules&M=show_module_cp&module=brilliant_retail&method=order_batch',array('method' => 'POST', 'id' => 'order_form'))?>

	<?=$content?>

	<div id="order_status_id">
		<select name="status_id" id="status_id">
		<?php 
			ksort($status);
			foreach($status as $key => $val){
				$sel = ($key == $order["status_id"]) ? 'selected="selected"' : '';
				echo '<option value="'.$key.'" '.$sel.'>'.$val.'</option>';  
			}
		?>
		</select>&nbsp;<input type="submit" class="submit" value="<?=lang('update')?>" />
		<br />
		<div style="margin:5px 0">
			<input type="checkbox" name="notify" style="float:left;" />&nbsp;<?=lang('br_status_notify')?>
		</div>
	</div>
	<div class="b2r_clearboth"><!-- --></div>
</form>
        
<?=$br_footer?>

<script type="text/javascript">
	$(function(){
		var oTable = $('.mainTable').dataTable({
													"iDisplayLength": 25, 
													"aoColumns": [
																		{ "asSorting": [ "desc", "asc" ] }, 
																		null,
																		null,
																		null,
																		null,
																		{ "bSortable": false }
																	], 
													"bProcessing": true,
													"bServerSide": true,
													"sAjaxSource": "<?=str_replace("&amp;","&",$ajax_url)?>", 
													"fnDrawCallback": function() {
														$('#toggle_check').click(function(){
															if(this.checked){
																$('input[type=checkbox]').attr('checked','checked');
															}else{
																$('input[type=checkbox]').each(function() {  
																	this.checked = false;  
																});  
															}
														});
													}
												});
		
		$('<p class="b2r_search_btn"><a href="#" id="clear"><b>Clear</b></a></p>').insertBefore('.mainTable_filter input');
		$('#clear').click(function(){
										oTable.fnFilterClear();
										return false
									});
		$('#toggle_check').click(function(){
			if(this.checked){
				$('input[type=checkbox]').attr('checked','checked');
			}else{
				$('input[type=checkbox]').attr('checked','');
			}
		});
	});
</script>