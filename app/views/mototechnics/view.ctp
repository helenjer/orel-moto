<?php 
  $mototype = array('scooter'=>'Скутер', 'moped'=>'Мопед','motorcycle'=>'Мотоцикл', 'motoroller'=>'Мотороллер', 'quadrocycle'=>'Квадроцикл', 'snow'=>'Снегоход', 'bicycle'=>'Велосипед', 'motochild'=>'Детский транспорт');
  $this->Html->addCrumb('Мототехника', '');
  if ($tech['Mototechnic']['type'] == 'motochild') $this->Html->addCrumb($mototype[$tech['Mototechnic']['type']],$tech['Mototechnic']['type']);
  else  $this->Html->addCrumb($mototype[$tech['Mototechnic']['type']].'ы',$tech['Mototechnic']['type'].'s');
  $this->Html->addCrumb($tech['Mototechnic']['model'], ''); 
 ?>
 
<h1>Мототехника</h1>
<div class="ca-text"> 
	<h2><?php if ($tech['Mototechnic']['type'] !== 'spectech') echo $mototype[$tech['Mototechnic']['type']].' ';
	echo $tech['Mototechnic']['model']?></h2>
	<?php if (!empty($tech['Mototechnic']['sub_txt'])) echo '<div class="sub-text-top">'.$tech['Mototechnic']['sub_txt'].'</div>';?>
		<div class="ca-text-left">
		  <?php
			if (!empty($tech['Mototechnic']['img'])) {				
				echo "<div class='catl-img'>";
						// check if new added model
						if ($tech['Mototechnic']['is_new']) echo "<span class='icon-new'></span>";
						
					echo $html->image($tech['Mototechnic']['img'], array('class'=>'moto'));				
				echo "</div>";
			}
		  ?>
			  
		  <div class="ca-text-sub">
		    <?php
		      if (!empty($tech['Mototechnic']['price'])) echo '<div class="price"> Цена: <span>'.$tech['Mototechnic']['price'].' руб.</span></div>';
		      if (!empty($tech['Mototechnic']['presence'])) echo '<div class="presence"> Наличие: <span>'.$tech['Mototechnic']['presence'].'</span></div>';			
		      //echo $tech['Mototechnic']['video_txt'];
				
				if (sizeof($tech['Video'])) {?>
					<h3>Видео</h3>
				<?php } ?>
				
				
				<?php	foreach ($tech['Video'] as $video) { ?>
						<div class="video-item">
							<?php if ($html->image($video['img'])) echo $html->image($video['img']);
											else echo $html->image('logo.png'); ?>
							<div class="video-item-info closeable">
								<span class="close">&times;</span> 
								<div class="video-show"></div> 
							</div> 
							<div style="display: none;" class="video-hide"><iframe width="800" height="430" frameborder="0" allowfullscreen="" src="<?= $video['url'] ?>"></iframe></div> 
						</div>
				<?php	} ?>
				
		  </div>
	
		</div>
		<?php echo $tech['Mototechnic']['full_txt'];?>
		<div class="clear"></div>
</div>

<div class="photo-popup closeable">
	<span class="close">&times;</span> 
	<div class="photo-popup-body">
		<?php
			echo $html->image($tech['Mototechnic']['img'], array('class'=>''));
		?>
	</div> 
</div>
<div class="popup-fade" style="display: none;"></div>