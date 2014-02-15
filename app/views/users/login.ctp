<div class="form">
<?php
    echo $session->flash();
    echo $form->create('User', array('action' => 'login'));
    echo "<div class='field'>".$form->input('username', array ('label' => 'Имя пользователя'))."</div>";
    echo "<div class='field'>".$form->input('password', array ('label' => 'Пароль'))."</div>";
    echo "<div class='field'>".$form->end('Войти')."</div>";
?>
<div class="clear"></div>
</div>