<?php 
  use app\core\form\Form;

  /**
   * @var $model \app\models\User
   */
?>

<h1>Login</h1>

<?php 

  $form = Form::begin('', 'post'); 

  echo $form->field($model, 'email');
  echo $form->field($model, 'password')->password();

  $html = <<<HTML
    <button type="submit" class="btn btn-primary">Login</button>
HTML;

  echo $html;

  $form->end(); 

?>
