<?php
/* Smarty version 4.3.4, created on 2024-01-15 19:31:27
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\SeriesEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a579ffc69b71_63612934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14813846b6293d5efc34e4fd72e62891b8e96997' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\SeriesEdit.tpl',
      1 => 1705336423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a579ffc69b71_63612934 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_126905813965a579ffc66521_14083243', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_126905813965a579ffc66521_14083243 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_126905813965a579ffc66521_14083243',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="bottom-margin">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
seriesSave" method="post" class="pure-form pure-form-aligned">
            <fieldset>
                <legend>Dane serii</legend>
                <div class="pure-control-group">
                    <label for="name">Nazwa</label>
                    <input id="name" type="text" placeholder="nazwa" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
                </div>
                <div class="pure-controls">
                    <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                    <a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
series">Powrót</a>
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
