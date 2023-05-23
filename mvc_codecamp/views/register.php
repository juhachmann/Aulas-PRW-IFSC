<?php 
  use app\core\form\Form;
  //var_dump($model);
  /**
  * @var $model \app\models\User
  */

?>

<h1>Formulário de contato</h1>

<?php 

  $form = Form::begin('', 'post'); 

  echo $form->field($model, 'firstname');
  echo $form->field($model, 'lastname');
  echo $form->field($model, 'email');
  echo $form->field($model, 'password')->password();
  echo $form->field($model, 'passwordConfirm')->password();

  echo '<button type="submit" class="btn btn-primary">Submit</button>';

  $form->end(); 

?>
