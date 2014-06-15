<?php
class MototechHelper extends AppHelper {
    var $helpers = array('Html');
		
		// common
    function typeName ($type, $plural = 0) {
		switch ($type){
			case 'scooter':
				return $plural ? 'Скутеры' : 'Скутер';
			break;
			case 'moped':
				return $plural ? 'Мопеды' : 'Мопед';
			break;
			case 'motorcycle':
				return $plural ? 'Мотоциклы' : 'Мотоцикл';
			break;
			case 'motoroller':
				return $plural ? 'Мотороллеры' : 'Мотороллер';
			break;
			case 'quadrocycle':
				return $plural ? 'Квадроциклы' : 'Квадроцикл';
			break;
			case 'snow':
				return $plural ? 'Снегоходы' : 'Снегоход';
			break;
			case 'children':
				return $plural ? 'Детские' : 'Детский';
			break;
			case 'folding':
				return $plural ? 'Складные' : 'Складной';
			break;
			case 'road':
				return $plural ? 'Дорожные' : 'Дорожный';
			break;
			case 'sport':
				return $plural ? 'Спортивные' : 'Спортивный';
			break;
			case 'two_suspend':
				return $plural ? 'Двухподвесные' : 'Двухподвесный';
			break;
			case 'cars_akkum_radio':
				return $plural ? 'Автомобили аккумуляторные с радиоуправлением' : 'Автомобиль аккумуляторный с радиоуправлением';
			break;
					case 'cars_akkum':
				return $plural ? 'Автомобили аккумуляторные' : 'Автомобиль аккумуляторный';
			break;
			case 'motocycle_akkum':
				return $plural ? 'Мотоциклы аккумуляторные' : 'Мотоцикл аккумуляторный';
			break;
			case 'bicycles_3':
				return $plural ? 'Велосипеды трёхколесные с ручкой управления' : 'Велосипед трёхколесный с ручкой управления';
			break;
			case 'cars':
				return $plural ? 'Автомобили' : 'Автомобиль';
			break;
		}
	}
	
	// admin
	function categoriesAnchorList ($models) {
		$html_txt = '';
		$html_txt .= "<div class='anchor-links-menu'>";
		$html_txt .= "<div class='alm-title'>Перейти к списку:</div>";
		foreach ($models as $type => $list) {
		 $html_txt .= $this->Html->link($this->typeName($type, 1), array('#' => $type))."<br>";
		}
		$html_txt .= "</div>";
		
		return $html_txt;
	}
}
?>