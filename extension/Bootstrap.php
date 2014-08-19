<?php
namespace Bootstrap;
class Bootstrap{
		public static $classDataTables;
		public static function tableBootstrap($idtable)
		{
			echo "<script>
					$(document).ready(function() {
						$('#$idtable').dataTable({
							'aaSorting': [[ 4, 'desc' ]]
						});
					});
			</script>";
			self::$classBootstrap = "class='table table-striped table-bordered table-hover' id='$idtable'";
			//return self::$classBootstrap;
		}
		
		public static function DataTables($idtable)
		{
			echo "<script>
						$(document).ready(function() {
							$('#$idtable').dataTable( {
								'bJQueryUI': true,         
								'sPaginationType': 'full_numbers',
								'aLengthMenu': [[15, 30, 50, 100, -1], [15, 30, 50, 100, 'All']],
								'iDisplayLength': 15,
								'bSort': true,
								'bFilter': true,
								'bAutoWidth': false,

								'sWidth': '20%' 
							} );
							});
					</script>

					";
			self::$classDataTables = "cellpadding='0' cellspacing='0' border='0' class='display' id='$idtable'";
			//return self::$classBootstrap;
		}
		public static function DataTables_2pagging($idtable)
		{
			echo "<script>
						$(document).ready(function() {
							$('#$idtable').dataTable( {
								'bJQueryUI': true,         
								'sPaginationType': 'full_numbers',
								'aLengthMenu': [[15, 30, 50, 100, -1], [15, 30, 50, 100, 'All']],
								'iDisplayLength': 15,

								//'sDom': '<\"clear\"lfptip>',
								//'sDom': '<\"top\"i>rt<\"top\"flp><\"clear\">',
								'sDom': '<\"H\"lfrp>t<\"F\"ip>',
								// 'dom': '<\"top\"i>rt<\"bottom\"flp><\"clear\">',
								'bSort': true,
								'bFilter': true,
								'bAutoWidth': false,
								
								'sWidth': '20%' 
							} );
							});
					</script>

					";
			self::$classDataTables = "cellpadding='0' cellspacing='0' border='0' class='display' id='$idtable'";
			//return self::$classBootstrap;
		}

			public static function DataTables_exports($idtable)
		{
			echo "
			<style>
				.DTTT_button{
					width: 150px;
					height: 40px;
					padding-top: 12px;
					padding-left: 23px;
					font-weight:bold;
					background-color:#FBFBEF;
					border-radius:5px 5px 0px 0px;
					font-size: 11px;
				}
				.DTTT_button:hover{
					color: #2E64FE;
					background-color:#EFFBF5;
				}
				#ToolTables_Company_export_0{
					background-image: url('".YOURLS_WEBSERVER."/library/DataTables-1.9.4/media/images/copy.png');
					background-repeat: no-repeat;
					background-position: 5px 5px;
				}
				#ToolTables_Company_export_1{
					background-image: url('".YOURLS_WEBSERVER."/library/DataTables-1.9.4/media/images/excel.png');
					background-repeat: no-repeat;
					background-position: 5px 5px;
				}
				#ToolTables_Company_export_0:hover{
					background-image: url('".YOURLS_WEBSERVER."/library/DataTables-1.9.4/media/images/copy_hover.png');
					background-repeat: no-repeat;
					background-position: 5px 5px;
				}
				#ToolTables_Company_export_1:hover{
					background-image: url('".YOURLS_WEBSERVER."/library/DataTables-1.9.4/media/images/excel_hover.png');
					background-repeat: no-repeat;
					background-position: 5px 5px;
				}
			</style>
			
			<script>
					$(document).ready( function () {
						$('#$idtable').dataTable( {
							'bJQueryUI': true,
							'sPaginationType': 'full_numbers',
							'aLengthMenu': [[15, 30, 50, 100, -1], [15, 30, 50, 100, 'All']],
							'iDisplayLength': 15,
							'bProcessing': true,
        					//'bServerSide': true,
        
							//'sDom': '<\'row-fluid\'<\'span6\'T><\'span6\'f>r>t<\'row-fluid\'<\'span6\'i><\'span6\'p>>',
							//'sDom': '<\"H\"Tfr>t<\"F\"ip>',
							//'sDom': 'T<\"clear\">lfrtip',
							//'sDom': 'T<\"clear\">lfrtip',
							'sDom':'T<\"clear\"><\"H\"lfr>rt<\"F\"ip>',
							'oTableTools': {
								'sSwfPath': '".YOURLS_WEBSERVER."/library/DataTables-1.9.4/media/swf/copy_csv_xls_pdf.swf',
		            			'aButtons': [
		            							
		            							{
								                    'sExtends': 'xls',
								                    'sButtonText': 'Save ข้อมูลเป็น Excel'
								                    //,'mColumns': [ 0, 1, 2, 3, 4 ] //column ที่ต้องการให้แสดงผล
								                },{
								                    'sExtends': 'copy',
								                    'sButtonText': 'Coppy ตารางข้อมูล'
								                   // ,'mColumns': [ 0, 1, 2, 3, 4 ] //column ที่ต้องการให้แสดงผล
								                }
								            ]
							}
						} );
					} );
				</script>";
			self::$classDataTables = "cellpadding='0' cellspacing='0' border='0' class='display' id='$idtable'";
			//return self::$classBootstrap;
		}
}
?>