<?php
/* Smarty version 4.3.4, created on 2024-01-16 20:32:20
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\CalendarEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a6d9c443d0b0_48119518',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '691e3385da4de45ed978ae004be8fb33ded4a7f1' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\CalendarEdit.tpl',
      1 => 1705429320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a6d9c443d0b0_48119518 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_209463878565a6d9c4438bb9_70834774', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_209463878565a6d9c4438bb9_70834774 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_209463878565a6d9c4438bb9_70834774',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="bottom-margin">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calendarSave" method="post" class="pure-form pure-form-aligned">
            <fieldset>
                <legend>Dane rundy</legend>
                <div class="pure-control-group">
                    <label for="name">Nazwa rundy</label>
                    <input id="name" type="text" placeholder="nazwa" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
                </div>
                <div class="pure-control-group">
                    <label for="circuit">Tor</label>
                    <input id="circuit" type="text" placeholder="tor" name="circuit" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->circuit;?>
">
                </div>
                <div class="pure-control-group">
                    <label for="date">Data</label>
                    <input id="date" type="text" placeholder="data" name="date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->date;?>
">
                </div>
                <div class="pure-control-group">
                    <label for="round">Numer rundy</label>
                    <input id="round" type="text" placeholder="numer rundy" name="round" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->round;?>
">
                </div>
                <div class="pure-controls">
                    <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                    <a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calendar/<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">Powrót</a>
                </div>
            </fieldset>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
        </form>	
    </div>
<?php
}
}
/* {/block 'top'} */
}
