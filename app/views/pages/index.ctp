<h1>Движение &mdash; жизнь!</h1>
<div class="ca-text index-page">

        <div class="slider-wrapper theme-default" style="overflow: hidden">
            <div id="slider" class="nivoSlider">
                <img src="/img/slides/moto1.jpg" data-thumb="images/moto1.jpg" alt="" />
                <img src="/img/slides/moto2.jpg" data-thumb="images/moto2.jpg" alt="" />
                <img src="/img/slides/moto3.jpg" data-thumb="images/moto3.jpg" alt="" />
                <img src="/img/slides/moto4.jpg" data-thumb="images/moto4.jpg" alt="" />
                <img src="/img/slides/moto5.jpg" data-thumb="images/moto5.jpg" alt="" />
                <img src="/img/slides/moto6.jpg" data-thumb="images/moto6.jpg" alt="" />
	    </div>
        </div>
	
	<?php
	if (sizeof($allnews) > 0 ) {
	

		echo '<h3 class="news-title">Наши новости</h3>
			<div class="news-announce">'.$allnews[0]['News']['text'].'</div>
			<div class="news" style="display:none;">';
			
		foreach ($allnews as $n) {
	
			echo '<div class="news-one"><div class="news-date">'.date("d.m.Y", strtotime($n['News']['date'])).'</div>'.$n['News']['text'].'</div>';
		    };
		echo '<div class="news-nav"><a class="btn-prev-news" style="display:none;">Следующие новости</a><span class="news-nav-sep" style="display:none"> | </span><a class="btn-next-news" style="display:none;">Предыдущие новости</a></div>';
		echo '</div>';
		echo '<div class="btn-news"><span></span></div>';
	};
	?>
	
	<div class="index-page-txt">
		<?php echo $index['Page']['text']?>
	</div>
	
	
	<h3>Наши партнеры</h3>
	<div class="companies-menu cm-partners">
		
		<?php
		 foreach ($allpartners as $m) {
			$partner_name = $m['Partner']['name'];
			$partner_title = strtoupper($partner_name);
			if (($partner_name === 'hors') || ($partner_name === 'nexus') || ($partner_name === 'omaks')) $partner_title.=' MOTORS';
			
			echo '<div class="cm-partner-item"><a class="company '.$partner_name.'" title="Подробнее о партнере '.$partner_title.'"></a><div class="cmp-info  closeable"><span class="close">&times;</span><h3>'.$partner_title.'<span  class="company '.$partner_name.' act"></span></h3><div class="strip"></div>'.$m['Partner']['text'].'<div class="video-show"></div></div></div>';

		    };
		 ?>   
		</div>
		
	<div class="clear"></div>
</div>
<div class="popup-fade" style="display: none;"></div>


