<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title><?php echo $title_for_layout?></title>
        <meta name="keywords" content="<?/*=$keywords_for_layout*/?>">
        <meta name="description" content="<?/*=$description_for_layout*/?>">
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">	
		<?php	echo $this->Html->css('style'); 
		 //echo $scripts_for_layout;
	     ?>
		   <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
           <script type="text/javascript" src="/js/application.js"></script>
		</head>
	<body>
		<!--[if lte IE 6]> 
	  <script>
	    document.location.href = "/oldbrouser.php";
    </script>
	<![endif]--> 
		<div id="main">
		<div id="sky"></div>
		<div id="strip-left"></div>
		<div id="strip-right"></div>
		
		<div id="header">
			<div id="header-title">
				<a href="/" class="ht-logo"></a>
			</div>
		</div>
			  
		<div id="container">
		  <div class="breadcrumbs"></div>
			<div class="content admin">
				<div class="content-left">
					<div class="menu">

					</div>
					
					<div class="banners">
						<div class="banners-content">
						</div>
					</div>
					
				</div>
					<div class="content-strip"></div>
					<div class="content-artical">
					  <h1>Панель администрирования</h1>
						<div class="admin-menu">
							<?php echo $this->Html->link('На главную', array('admin'=>true, 'controller'=>'users', 'action' => 'index'))." | ".
						           $this->Html->link('Выход', array('admin'=>false, 'controller'=>'users', 'action' => 'logout'))."<br>";?>
						</div>
						
						<?php echo $this->Session->flash(); ?>
						<?php echo $content_for_layout; ?>					

					</div>
				<div class="clear"></div>
			</div>
		</div>
			  
	</div>
	<div class="footer-bg"></div>
	<div id="footer">  
		<div class="footer-left"></div>
		<div class="footer-right"></div>
		<div class="footer-info">
			<div class="fi-auth">
			    <span class="footer-info-dev">Разработка сайта: Жердова Елена</span><br> 
			    <span class="footer-info-design">Дизайн: <a href="http://alex21.jino.ru">Алексей Правдин</a></span>
			</div>
			<div class="fi-stat"><!--Openstat-->
				<span id="openstat2269943"></span>
				<script type="text/javascript">
				var openstat = { counter: 2269943, image: 5081, color: "828282", next: openstat };
				(function(d, t, p) {
				var j = d.createElement(t); j.async = true; j.type = "text/javascript";
				j.src = ("https:" == p ? "https:" : "http:") + "//openstat.net/cnt.js";
				var s = d.getElementsByTagName(t)[0]; s.parentNode.insertBefore(j, s);
				})(document, "script", document.location.protocol);
				</script>
				<!--/Openstat-->
			</div>
		</div>
		<div class="clear"></div>
    </div>
						
    </body>
</html>