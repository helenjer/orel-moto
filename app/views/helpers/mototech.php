<?php
class MototechHelper extends AppHelper {
    var $helpers = array('Html');
		
		// common
    function typeName ($type, $plural = 0) {
		switch ($type){
			case 'scooter':
				return $plural ? '�������' : '������';
			break;
			case 'moped':
				return $plural ? '������' : '�����';
			break;
			case 'motorcycle':
				return $plural ? '���������' : '��������';
			break;
			case 'motoroller':
				return $plural ? '�����������' : '����������';
			break;
			case 'quadrocycle':
				return $plural ? '�����������' : '����������';
			break;
			case 'snow':
				return $plural ? '���������' : '��������';
			break;
			case 'children':
				return $plural ? '�������' : '�������';
			break;
			case 'folding':
				return $plural ? '��������' : '��������';
			break;
			case 'road':
				return $plural ? '��������' : '��������';
			break;
			case 'sport':
				return $plural ? '����������' : '����������';
			break;
			case 'two_suspend':
				return $plural ? '�������������' : '�������������';
			break;
			case 'cars_akkum_radio':
				return $plural ? '���������� �������������� � ����������������' : '���������� �������������� � ����������������';
			break;
					case 'cars_akkum':
				return $plural ? '���������� ��������������' : '���������� ��������������';
			break;
			case 'motocycle_akkum':
				return $plural ? '��������� ��������������' : '�������� ��������������';
			break;
			case 'bicycles_3':
				return $plural ? '���������� ����������� � ������ ����������' : '��������� ����������� � ������ ����������';
			break;
			case 'cars':
				return $plural ? '����������' : '����������';
			break;
		}
	}
	
	// admin
	function categoriesAnchorList ($models) {
		$html_txt = '';
		$html_txt .= "<div class='anchor-links-menu'>";
		$html_txt .= "<div class='alm-title'>������� � ������:</div>";
		foreach ($models as $type => $list) {
		 $html_txt .= $this->Html->link($this->typeName($type, 1), array('#' => $type))."<br>";
		}
		$html_txt .= "</div>";
		
		return $html_txt;
	}
}
?>