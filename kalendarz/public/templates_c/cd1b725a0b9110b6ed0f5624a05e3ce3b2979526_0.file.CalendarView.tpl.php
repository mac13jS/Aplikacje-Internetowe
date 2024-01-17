<?php
/* Smarty version 4.3.4, created on 2024-01-16 18:17:53
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\CalendarView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a6ba41a0a276_00809235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd1b725a0b9110b6ed0f5624a05e3ce3b2979526' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\CalendarView.tpl',
      1 => 1705425471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Calendar.tpl' => 1,
  ),
),false)) {
function content_65a6ba41a0a276_00809235 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
  

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_74587157565a6ba41a05f55_13207067', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_74587157565a6ba41a05f55_13207067 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_74587157565a6ba41a05f55_13207067',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="bottom-margin">
        <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calendarAdd">Nowy wyścig</a>
    </div>

    <div id="table">
        <?php $_smarty_tpl->_subTemplateRender("file:Calendar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
<?php
}
}
/* {/block 'top'} */
}
