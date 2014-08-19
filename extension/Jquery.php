<?php
namespace Jquery;
class Jquery{
public static function dialogJquery($url,$id,$title,$width,$height){
			return "
			     $.ajax({
						type: 'GET',
					    //contentType: 'application/json; charset=utf-8',
						url: '$url',
						success: function(msg){
							var dialogOpts = {
							modal: false,
							bgiframe: true,
							autoOpen: false,
							minHeight: 'auto',
							width: $width,
							draggable: true,
							resizeable: true,
							title: '$title',
							position: ['center',100],
							open: function() {
								$('#$id').html(msg);
							},
							close: function(event, ui) {
					      		$('#$id').dialog('destroy');
					        }
							};
							
							$('#$id').dialog(dialogOpts);
							$('#$id').dialog('open');
							//$('#$id').dialog('option', 'title', '$title');
						}
					});
					";
		}
		public static function ajaxJquery($url,$method="POST",$data="",$div="",$type=""){

			if($data != NUll || $data != ""){
				$data = "data: $data,";
			}
			if($type != NUll || $type != ""){
				$type = "dataType : '$type',";
			}
			
			return "
			    	$('#$div').html('<div style=\"position:relative; top:200px;z-index:2;color:#2E9AFE; font-size:15pt;\" align=\"center\" ><img src=\'".YOURLS_WEBSERVER_SITE."/image/ajax_loader_blue_64.gif\'><br />กำลังโหลดข้อมูล...</div>');
					$.ajax({
					   type: '$method',
					   url: '$url',
					   cache: false,
					   $data
					   $type
					   success: function(msg){
					   		setTimeout(function () {
				              $('#$div').html(msg);
				            }, 1000);
					   }
					 });";
		}
		public static function dateDMY($date){
			return substr($date,8,2)."/".substr($date,5,2)."/".(substr($date,0,4)+543);
		}
		public static function dateYMD($date){
			return (substr($date,6,4)-543)."/".substr($date,3,2)."/".substr($date,0,2). date(" H:i:s");
		}
		public static function datepickerJquery($id){
			echo "<style>
						#$id { 
						background : url('".YOURLS_WEBSERVER_SITE."/image/calendar.gif') center right no-repeat;
						cursor: pointer !important;
						text-align: center;
						padding-right: 22px;
						height: 24px;
						border: 1px #CCC solid;
					}
					</style>";
			echo "<input type='text' name='$id' id='$id' value='' >";
?>
			
			<script type="text/javascript">
					$(function() {
					var dateBefore = null;
					$('#<?php echo $id;?>').datepicker({
						dateFormat : 'dd-mm-yy',
						dayNamesMin : ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
						monthNamesShort : ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
						changeMonth : true,
						changeYear : true,
						beforeShow : function() {
							document.getElementById('<?php echo $id;?>').value = '';
							if ($(this).val() != '') {
								var arrayDate = $(this).val().split('-');
								arrayDate[2] = parseInt(arrayDate[2]) - 543;
								$(this).val(arrayDate[0] + '-' + arrayDate[1] + '-' + arrayDate[2]);
							}
							setTimeout(function() {
								$.each($('.ui-datepicker-year option'), function(j, k) {
									var textYear = parseInt($('.ui-datepicker-year option').eq(j).val()) + 543;
									$('.ui-datepicker-year option').eq(j).text(textYear);
								});
							}, 50);
						},
						onChangeMonthYear : function() {
							setTimeout(function() {
								$.each($('.ui-datepicker-year option'), function(j, k) {
									var textYear = parseInt($('.ui-datepicker-year option').eq(j).val()) + 543;
									$('.ui-datepicker-year option').eq(j).text(textYear);
								});
							}, 50);
						},
						onClose : function() {
							if ($(this).val() != '' && $(this).val() == dateBefore) {
								var arrayDate = dateBefore.split('-');
								arrayDate[2] = parseInt(arrayDate[2]) + 543;
								$(this).val(arrayDate[0] + '/' + arrayDate[1] + '/' + arrayDate[2]);
							}
						},
						onSelect : function(dateText, inst) {
							dateBefore = $(this).val();
							var arrayDate = dateText.split('-');
							arrayDate[2] = parseInt(arrayDate[2]) + 543;
							$(this).val(arrayDate[0] + '/' + arrayDate[1] + '/' + arrayDate[2]);
						}
					});
				});
				</script>
<?php
		}
		public static function autocompleteJqueryUi($value,$id,$width="500"){
			for($j=0;$j<sizeof($value);$j++){
				$val = array_values($value[$j]);
				$val[0] = str_replace('"','\"',$val[0]);
				$val[1] = str_replace('"','\"',$val[1]);
				$val[0] = str_replace('script',' script',$val[0]);
				$val[1] = str_replace('script','scriipt',$val[1]);
				$fields .= '{"value":"'.$val[0].'","label":"'.$val[1].'"}';
				if($j<(sizeof($value)-1)){
						$fields .= ",";
				}
			}
			$fields = "[".$fields."]";
?>
			<style>
				/*--- uiCombo Start ---*/
				.uiCombo .ui-autocomplete-input {
					height: 24px;
				}
				
				.uiCombo a {
					padding: 1.0px 2px;
					text-decoration: none;		
					/*		
					background: url('../../image/trigger-arrow.png') 3px 4px; , -ms-linear-gradient(top,#74c163,#1d7a09);
				    background: url('../../image/trigger-arrow.png') 3px 4px; , -moz-linear-gradient(top,#74c163,#1d7a09);
				    background: url('../../image/trigger-arrow.png') 3px 4px;  , -webkit-linear-gradient(top,#74c163,#1d7a09);
				    background: url('../../image/trigger-arrow.png') 3px 4px; , linear-gradient(top,#74c163,#1d7a09);	
				    background-size:10px 10px;
				    * */
				    width: 26px; 
					height: 24px;
					border: 1px #CCC solid;
				    background: no-repeat url("<?php echo YOURLS_WEBSERVER_SITE;?>/image/glyphicons-halflings.png") -307px -115px transparent;			    
				    
				    background-color: #EEE;
				    background-repeat:no-repeat;
				}			
				.uiCombo a:hover{
					padding: 1.0px 2px;
					background: no-repeat url("<?php echo YOURLS_WEBSERVER_SITE;?>/image/glyphicons-halflings.png") -307px -115px transparent;			    
					background-color: #D0D0D0;
					background-repeat:no-repeat;
				}
				.ui-autocomplete {
					max-height: <?php echo $width;?>px;
					overflow-y: auto;
					overflow-x: hidden;
				}		
				.custom-combobox {
					position: relative;
					display: inline-block;
				}
				.custom-combobox-toggle {
					position: absolute;
					top: 0;
					bottom: 0;
					width: 16px;
					margin-left: -1px;
					padding: 0;
					/* support: IE7 */
					*height: 1.7em;
					*top: 0.1em;
				}			
				.custom-combobox-input {
					margin: 0;
				}			
				.ui-state-default, 
				.ui-widget-content .ui-state-default, 
				.ui-widget-header .ui-state-default {
					border: 1px solid rgb(178, 211, 224);
					font-size: 12px;
					font-weight: normal ;
					color: rgb(00, 00, 00);
					height: 19px;
				}				
				/*--- uiCombo End ---*/
			</style>
			<script>
				var countflag = 1;
				function openlistbox(id){				
					if(countflag == 1 ){
						var datadiv = '#'+id+'';
						var datadiv1 = '#'+id+'picture';
						var datadiv2 = '#'+id+'Hidepicture';
						$(datadiv).autocomplete('search','');						
						countflag = 2;						
					}
					else if (countflag == 2 ){
						var datadiv = '#'+id+'';
						var datadiv1 = '#'+id+'picture';
						var datadiv2 = '#'+id+'Hidepicture';
						if($('.ui-autocomplete').css('display') == 'none'){
							$(datadiv).autocomplete('search','');
						}else{
							$(datadiv).autocomplete('close','');
						}
						countflag = 1;
					}
				}
				$('html').click(function() {
					$('.ui-autocomplete').css('display', 'none');			
				});				
				var Combo_AssetIDdatajson =  <?php echo $fields;?>;
				$(function(){		
					$("#<?php echo $id;?>Show").autocomplete({
						source: Combo_AssetIDdatajson ,
						select: function( event, ui ) {
							$( "#<?php echo $id;?>Show" ).val( ui.item.label );
							$( "#<?php echo $id;?>" ).val( ui.item.value);
							return false;
							
						},
						open: function() {
									$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
								},
						close: function() {
									$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
								}, 
						minLength: 0
					})
					.bind( "keyup", function( event ) {
							
					})
					.focus(function(){ 

					});	
				}); 
				$(function(){
					$('#<?php echo $id;?>Show').val('กรุณาระบุ...');
					$('#<?php echo $id;?>').val('');
				});  
			</script> 
			<div class='uiCombo' style='display: inline-flex; border-radius: 0 2px 2px 0;  width: 100%;'>
				<input type='text' id='<?php echo $id;?>Show' size="112"/>
				<a href='javascript:openlistbox("<?php echo $id;?>Show");' target='_self' >
					&nbsp;&nbsp;&nbsp;
				</a>
			</div>	
				<input type='hidden' id='<?php echo $id;?>' name='<?php echo $id;?>' />

<?php
		}
}	
?>