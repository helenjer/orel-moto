<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <title><?php echo $title_for_layout?></title>
        <meta name="keywords" content="<?=$keywords_for_layout?>">
        <meta name="description" content="<?=$description_for_layout?>">
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">	
		<?php	echo $this->Html->css('style'); 
		 //echo $scripts_for_layout;
	     ?>
	     
	    <link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" media="screen" />
	    <link rel="stylesheet" href="/css/colorbox.css" />
	     
	    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
	    <script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
            <script type="text/javascript" src="/js/application.js"></script>
	    <script type="text/javascript" src="/js/jquery.nivo.slider.js"></script>

	    
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
		<div id="caption"></div>	
		
		<div id="header">
			<div id="header-title">
				<a href="/" class="ht-logo"></a>
				<div class="phones"></div>
				<div class="address">г. Орел, ул. МОПРа 7 - <?php echo $this->Html->link('показать на карте', array('admin'=> false, 'controller' => 'pages', 'action' => 'contacts#scheme'));?></div>
			</div>
		</div>
		<div id="logo"></div>
			  
		<div id="container">
			<div class="breadcrumbs"><?php echo $html->getCrumbs(" &rarr; ",'Главная'); ?></div> 
			<div class="content">
				<div class="content-left">
					<div class="menu">
						<div class="menu-items">
						<?php $menu_links = array ( '0' => array('name'=> 'main', 'admin'=>'false', 'controller' => 'pages', 'action' => 'index', 'maincontr' => ''),
									    '1' => array('name'=> 'tech', 'admin'=>'false', 'controller' => 'mototechnics', 'action' => 'index', 'maincontr' => 'mototechnics'),
									    '2' => array('name'=> 'details', 'admin'=>'false', 'controller' => 'pages', 'action' => 'details', 'maincontr' => ''),
									    '3' => array('name'=> 'bicycles', 'admin'=>'false', 'controller' => 'mototechnics', 'action' => 'bicycles', 'maincontr' => ''),
									    '4' => array('name'=> 'spectech', 'admin'=>'false', 'controller' => 'pages', 'action' => 'spectech', 'maincontr' => ''),
									    '5' => array('name'=> 'for-children', 'admin'=>'false', 'controller' => 'mototechnics', 'action' => 'motochild', 'maincontr' => ''),
									    '6' => array('name'=> 'service', 'admin'=>'false', 'controller' => 'pages', 'action' => 'service', 'maincontr' => ''),
									    '7' => array('name'=> 'gallery', 'admin'=>'false', 'controller' => 'pages', 'action' => 'gallery', 'maincontr' => ''),
											'8' => array('name'=> 'catalogs', 'admin'=>'false', 'controller' => 'catalogs', 'action' => 'index', 'maincontr' => ''),
											'9' => array('name'=> 'museum', 'admin'=>'false', 'controller' => 'mototechnics', 'action' => 'museum', 'maincontr' => ''),
									    '10' => array('name'=> 'contacts', 'admin'=>'false', 'controller' => 'pages', 'action' => 'contacts', 'maincontr' => ''));


									    /*'6' => array('name'=> 'boat-motors', 'admin'=>'false', 'controller' => 'pages', 'action' => 'boatmotors', 'maincontr' => ''),*/

																											
								for ($i=0; $i<sizeof($menu_links) ;$i++) {
									if (($menu_links[$i]['controller'] === $this->params['controller']) && 
										($menu_links[$i]['action'] === $this->params['action']) || 
										($menu_links[$i]['maincontr'] === $this->params['controller']) &&
										($this->params['action'] !== 'bicycles') &&
										($this->params['action'] !== 'motochild'))  
											 echo '<span class ="menu-item '.$menu_links[$i]['name'].' act"></span>';
									 else  echo $this->Html->link('', array('admin'=> false, 'controller' => $menu_links[$i]['controller'], 'action' => $menu_links[$i]['action']), array('class'=> 'menu-item '.$menu_links[$i]['name']));
								  if ($menu_links[$i]['name'] == 'tech') 
										echo "<div class='submenu'>".
									
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'scooters'), array('class'=> 'submenu-item scooter')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'mopeds'), array('class'=> 'submenu-item moped')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'motorollers'), array('class'=> 'submenu-item motoroller')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'motorcycles'), array('class'=> 'submenu-item motorcycle')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'quadrocycles'), array('class'=> 'submenu-item quadrocycle')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'snows'), array('class'=> 'submenu-item snow')).
														"<div class='submenu-pic'></div>".
													"</div>";
													
										if ($menu_links[$i]['name'] == 'bicycles') 
										echo "<div class='submenu submenu_bicycles'>".
									
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'bicycles/children'), array('class'=> 'submenu-item children')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'bicycles/folding'), array('class'=> 'submenu-item folding')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'bicycles/road'), array('class'=> 'submenu-item road')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'bicycles/sport'), array('class'=> 'submenu-item sport')).
														$this->Html->link('', array('admin'=> false, 'controller' => 'mototechnics', 'action' => 'bicycles/two_suspend'), array('class'=> 'submenu-item two_suspend')).
														"<div class='submenu-pic'></div>".
													"</div>";
								}	
						?>	
						
						</div>
					</div>
					
					<div class="banners">
						<div class="banners-content">
							<!--Баннеры-->
						</div>
					</div>
					
				</div>
					<div class="content-strip"></div>
					<div class="content-artical">
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
			<div class="fi-stat" style="display:none;"><!--Openstat-->
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
			<div class="clear"></div>
		</div>
		
		<div class="clear"></div>
  </div>						
    </body>
</html>