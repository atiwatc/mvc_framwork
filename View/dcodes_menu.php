<!-- DC Menu Dock Settings: vertical style -->
<script type="text/javascript"> 
    $(function () {
    var jqDockOpts = {
        align: 'top',
        duration: 200,
        labels: 'tc',
        size: 42,
        distance: 120,
        maxWidth: 30
    };
    $('#jqDock').jqDock(jqDockOpts);
}); 
</script>
<!-- DC Menu Dock Start -->
<div id="dockContainer" class="dc_dockmenu">
  <ul id="jqDock">
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/home.png" alt="Home" title="Home" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/email.png" alt="Contact" title="Contact" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/terminal.png" alt="Terminal" title="Terminal" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/music.png" alt="Music" title="Music" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/video.png" alt="Video" title="Video" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/profile.png" alt="Profile" title="Profile" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/calendar.png" alt="Calendar" title="Calendar" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/link.png" alt="Links" title="Links" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/rss.png" alt="RSS" title="RSS" /></a></li>
    <li><a class="dockItem" href="#"><img src="<?php echo YOURLS_WEBSERVER.'/library/';?>dcodes/menus/dock/images/downloads.png" alt="Downloads" title="Downloads" /></a></li>
  </ul>
</div>
<!-- DC Menu Dock End -->