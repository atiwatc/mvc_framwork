<?php
namespace Sencha;
class Sencha{
		public static function grigSencha($value,$id,$title='',$type='',$width=''){
			$keys = array_keys($value[0]);
			$values = array_values($value[0]);
			for($j=0;$j<sizeof($keys);$j++){
				/*
		  		if ((mb_detect_encoding($keys[$j], 'UTF-8', true) != 'UTF-8')) {
		  			$keys[$j] = Variable::tis620_to_utf8($keys[$j]);
		  		}
				 */
				 if($type[$j] == ""){
					$type[$j] = "string";
				}
				 $fields .= "{
					name : '$keys[$j]',
					type : '$type[$j]'
				}";
				//$fields .= "'$keys[$j]'";
				if($width[$j] == ""){
					$width[$j] = 100;
				}
				if($title[$j] == ""){
					$title[$j] = $keys[$j];
				}
				
				$fields_column .= "{id :'$keys[$j]',header :'$title[$j]',width : $width[$j],sortable : true,align : 'center',dataIndex : '$keys[$j]'}";
				if($j<(sizeof($keys)-1)){
					$fields .= ", ";
					$fields_column .= ",";
				}
			}
			$fields = 'fields : ['.$fields.']';
			$columns = 'columns : ['.$fields_column.']';

			?>
			<div id="<?php echo $id;?>"></div>
			<script>
				Ext.Loader.setConfig({ enabled : true });			
					Ext.Loader.setPath('Ext.ux', '../../../../ext-4.2.1.883/examples/ux');			
					Ext.require(['Ext.data.*', 'Ext.grid.*', 'Ext.util.*', 'Ext.ux.data.PagingMemoryProxy', 'Ext.toolbar.Paging', 'Ext.ux.SlidingPager']);
					Ext.onReady(function() {			
						Ext.define('Model', {
							extend : 'Ext.data.Model',
							idProperty : <?php echo "'$keys[0]'";?>,
							<?php echo $fields;?>
						});
						var store = Ext.create('Ext.data.Store', {
							model : 'Model',
							remoteSort : true,
							pageSize : 20,
							proxy : {
								type : 'pagingmemory',
								data : <?php echo  json_encode($value);?>,
								reader : {type : 'json'}
							}
						});
						document.getElementById("<?php echo $id;?>").innerHTML = "";
						var grid = Ext.createWidget('gridpanel', {
							//title : 'รายการข้อมูลขอรับบริการ',
							store : store,
							<?php echo $columns;?>,
							frame: false,
							//autoExpandColumn : 'AssetNumber',
							height : 510,
							width : '<?php echo $width[sizeof($keys)];?>',
							columnLines : true,
							enableLocking : false,
							animCollapse : false,
							margin : '0 0 20 0',
							autoHeight : true,
							autoWidth : true,
							autoScroll : true,
							resizable : {
								handles : 's'
							},
							bbar : Ext.create('Ext.PagingToolbar', {
								store : store,
								displayInfo : true,
								displayMsg : 'Displaying topics {0} - {1} of {2}',
								emptyMsg : "No topics to display",
							})
						});
			
						grid.render('<?php echo $id;?>');
						store.load();
						//store.sort("id","DESC");
						store.sort("<?php echo $keys[0];?>","ASC");
				});
			</script>
<?php
		}
		public static function autocompletSencha($value,$id,$width='500'){
			$keys = array_keys($value[0]);
			$fields = 'fields : ['."'$keys[0]','$keys[1]'".']';
?>
			<div id="<?php echo $id;?>"></div>
			<input type="hidden" name="<?php echo $id;?>_autocompletSencha" id="<?php echo $id;?>_autocompletSencha" value=""/>
			<script type="text/javascript">
			Ext.require([
			    'Ext.form.field.ComboBox',
			    'Ext.window.MessageBox',
			    'Ext.form.FieldSet',
			    'Ext.tip.QuickTipManager',
			    'Ext.data.*'
			]);		
			Ext.define("<?php echo $id;?>", {
			    extend: 'Ext.data.Model',
			    <?php echo $fields;?>
			});
			function createStore_emp(){	
				return Ext.create('Ext.data.Store', {
			        autoDestroy: true,
			        model: '<?php echo $id;?>',
			        data: <?php echo json_encode($value);?>
			   });
			}
			document.getElementById("<?php echo $id;?>").innerHTML = "";
			var simpleCombo = Ext.create('Ext.form.field.ComboBox', {
		        renderTo: '<?php echo $id;?>',
		        valueField : '<?php echo $keys[0];?>',
				displayField : '<?php echo $keys[1];?>',
				emptyText:'กรุณาระบุ ...',
		        width: <?php echo $width;?>,
		        //labelWidth: 130,
		        store: createStore_emp(),
		        queryMode: 'local',
		        typeAhead: true,
		        listeners: {
		  			select : function (mycombo, record,index ){
		  				emp = mycombo.getValue();
						document.getElementById('<?php echo $id;?>_autocompletSencha').value = emp;
		  			}
				}
		    });
			
		</script>
<?php
		}

		public static function chartBarSencha($id,$value,$type="",$title="",$width,$height){
			$keys = array_keys($value[0]);
			//for($j=0;$j<sizeof($keys);$j++){
			for($j=0;$j<2;$j++){
				if($type[$j] == ""){
					$type[$j] = "string";
				}
				 $fields .= "{
								name : '$keys[$j]',
								type : '$type[$j]'
							 }";
				if($j<(2-1)){
					$fields .= ", ";
				}
			}
			$fields = 'fields : ['.$fields.'],';
			//echo $fields;
		?>
		
		<script>
		/*
		data = [{"name":"test1","data":21,"data1":31,"data2":15,"data3":54,"link":1},
		        			{"name":"test2","data":11,"data1":11,"data2":15,"data3":54,"link":2},
		        			{"name":"test3","data":13,"data1":15,"data2":35,"data3":24,"link":3},
		        			{"name":"test4","data":8,"data1":13,"data2":65,"data3":74,"link":4},
		        			{"name":"test5","data":6,"data1":44,"data2":35,"data3":24,"link":5},
		        			{"name":"test6","data":55,"data1":12,"data2":16,"data3":76,"link":6},
		        			{"name":"test7","data":88,"data1":65,"data2":32,"data3":55,"link":7}];
		*/
		document.getElementById("<?php echo $id;?>").innerHTML = "<br>";
					window.store1 = Ext.create('Ext.data.JsonStore', {
					  // fields: ['name', {type: 'decimal', name: 'data1'},'link'],
					  //data: data
					  <?php echo $fields;?>
					   data: <?php echo json_encode($value);?>
					});
		
					Ext.require('Ext.chart.*');
					Ext.require(['Ext.Window', 'Ext.layout.container.Fit', 'Ext.fx.target.Sprite', 'Ext.window.MessageBox']);
		
					Ext.onReady(function () {
						var chartLink ='labLink("<?php echo $varCenterID?>","<?php echo $cmb_year ;?>",chartName);';	
		
						var colors = ['0066FF', 'AFD8F8', 'F6BD0F', '8BBA00', 'A66EDD','F984A1','CCCC00','999999','0099CC','FF0000',
									  '006F00', '0099FF', 'FF66CC', '669966', '7C7CB4','FF9933','9900FF','99FFCC','CCCCFF','669900',
									  '1941A5', 'AFD8F8', 'F6BD0F', '8BBA00', 'A66EDD','F984A1','CCCC00','999999','0099CC','FF0000',
									  '006F00', '0099FF', 'FF66CC', '669966', '7C7CB4','FF9933','9900FF','99FFCC','CCCCFF','669900','1941A5'];
						// var chart = Ext.create('widget.panel', {
						var chart = Ext.create('Ext.chart.Chart', {
								style: 'background:#fff',
								animate: true,
								shadow: true,
								store: store1,
								axes: [{
									type: 'Numeric',
									position: 'left',
									//fields: [{type: 'decimal', name: 'data'}],
									fields: ['<?php echo $keys[1];?>'],
									label: {
										renderer: Ext.util.Format.numberRenderer('0,0')
									},
									//title: 'แกน y',
									grid: true,
									minimum: 0
								}, {
									type: 'Category',
									position: 'bottom',
									//fields: ['name'],
									fields: ['<?php echo $keys[0];?>']
									//title: 'แกน x'
								}],
								series: [{
									type: 'column',
									axis: 'left',
									highlight: true,
										renderer: function(sprite, record, attributes, index, store) {
											attributes.fill = colors[index%colors.length];
											return attributes;
										},
									tips: {
									  trackMouse: true,
									  width: 140,
									  height: 28,
									  renderer: function(storeItem, item) {
										this.setTitle(storeItem.get('<?php echo $keys[0];?>') + ', ' + storeItem.get('<?php echo $keys[1];?>'));
									  }
									},
									
									label: {
									  display: 'insideEnd','text-anchor': 'middle',
										field: '<?php echo $keys[1];?>',
										renderer: Ext.util.Format.numberRenderer('0,0.00'),
										orientation: 'vertical',
										color: '#333'
									},
									listeners: {//This Doesnt Work :(
										itemclick: function(obj){
										}
									},
									xField: '<?php echo $keys[0];?>',
									yField: '<?php echo $keys[1];?>'
								}]
							});
		
						//var win = Ext.create('Ext.window.Window', {
						var win = Ext.create('widget.panel', {
							width: <?php echo $width;?>,
							height: <?php echo $height;?>,
							minHeight: 400,
							minWidth: 550,
							hidden: false,
							maximizable: true,
							title: '<?php echo $title;?>',
							layout: 'fit',
							renderTo: "<?php echo $id;?>",
							//renderTo: Ext.getBody(),
							autoShow: true,
							/*
							tbar: [{
								text: 'Save Chart',
								handler: function() {
									Ext.MessageBox.confirm('Confirm Download', 'Would you like to download the chart as an image?', function(choice){
										if(choice == 'yes'){
											chart.save({
												type: 'image/png'
											});
										}
									});
								}
							}, {
								text: 'Reload Data',
								handler: function() {
									window.loadTask.delay(100, function() {
									  store1.loadData(generateData(6, 20));
									});
								}
							}],
							*/
							items: chart    
						});
					});
		
		</script>
		
		<?php
		}
}
?>