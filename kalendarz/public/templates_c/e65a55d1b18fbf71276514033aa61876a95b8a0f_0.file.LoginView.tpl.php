<?php
/* Smarty version 4.3.4, created on 2024-01-15 19:38:01
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a57b893d2236_32111544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e65a55d1b18fbf71276514033aa61876a95b8a0f' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\LoginView.tpl',
      1 => 1704630026,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a57b893d2236_32111544 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_142677620465a57b893cf3d1_44235530', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_142677620465a57b893cf3d1_44235530 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_142677620465a57b893cf3d1_44235530',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post" class="pure-form pure-form-aligned bottom-margin">
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
            <div class="pure-controls">
                <input type="submit" value="Zaloguj" class="pure-button pure-button-primary"/>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
signinShow" class="pure-button">Zarejestruj</a>
            </div>
        </fieldset>
    </form>	
<?php
}
}
/* {/block 'top'} */
}
