<?php
/* Smarty version 4.3.4, created on 2024-01-15 19:38:02
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\SigninView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a57b8a058e93_32995829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a6ed1069a8dfd10844d7633f98812b98c42370e' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\SigninView.tpl',
      1 => 1704630013,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a57b8a058e93_32995829 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_40995943165a57b8a055fa3_19383325', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_40995943165a57b8a055fa3_19383325 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_40995943165a57b8a055fa3_19383325',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
signin" method="post" class="pure-form pure-form-aligned bottom-margin">
        <legend>Logowanie do systemu</legend>
        <fieldset>
            <div class="pure-control-group">
                <label for="id_login">Login: </label>
                <input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
            </div>
            <div class="pure-control-group">
                <label for="id_pass">Hasło: </label>
                <input id="id_pass" type="password" name="password"/><br/>
            </div>
            <div class="pure-control-group">
                <label for="id_pass_repeat">Powtórz hasło: </label>
                <input id="id_pass_repeat" type="password" name="password_repeat"/><br/>
            </div>
            <div class="pure-controls">
                <input type="submit" value="Zarejestruj" class="pure-button pure-button-primary"/>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
loginShow" class="pure-button">Zaloguj</a>
            </div>
        </fieldset>
    </form>	
<?php
}
}
/* {/block 'top'} */
}
