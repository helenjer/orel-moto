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
			<div class="content">
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
			<span class="footer-info-dev">Разработка сайта: Жердова Елена</span><br> 
			<span class="footer-info-design">Дизайн: <a href="http://alex21.jino.ru">Алексей Правдин</a></span>
		</div>
		<div class="clear"></div>
    </div>
						
    </body>
</html>