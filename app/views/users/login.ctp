<div class="form">
<?php
    echo $session->flash();
    echo $form->create('User', array('action' => 'login'));
    echo "<div class='field'>".$form->input('username', array ('label' => '��� ������������'))."</div>";
    echo "<div class='field'>".$form->input('password', array ('label' => '������'))."</div>";
    echo "<div class='field'>".$form->end('�����')."</div>";
?>
<div class="clear"></div>
</div>