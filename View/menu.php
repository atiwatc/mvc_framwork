<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">  
<!-- <div class="navbar navbar-default navbar-fixed-top" role="navigation" > -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button
         
			<a class="navbar-brand">
				<!--<span class="logo-onestopservice">Example</span>-->
				&nbsp;
			</a>
		 
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="" id="home">
					<a href="<?php echo YOURLS_WEBSERVER_SITE."/mainController/home";?>" )" >
						<span class="glyphicon glyphicon-home"></span>  หน้าหลัก
					</a>
				</li>
				<li class="" id="about">
					<a href="<?php echo YOURLS_WEBSERVER_SITE."/mainController/about";?>" )" >
						<span class="glyphicon glyphicon-home"></span>  เกี่ยวกับเรา
					</a>
				</li>
			</ul>
		</div>
	</div>
	
<script>
			try{
					var NAME = <?php echo $value?>;
					NAME.className='active';
			}catch(err){
				alert("errore");
			}

</script>

