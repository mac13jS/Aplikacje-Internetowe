<?php
/* Smarty version 4.3.4, created on 2024-01-15 19:28:18
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\SeriesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a57942c4d504_26423053',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c0b9b7ad4ff7fed8d01d376346952619b1df73d' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\SeriesView.tpl',
      1 => 1705336324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:SeriesList.tpl' => 1,
  ),
),false)) {
function content_65a57942c4d504_26423053 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
  

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_146539782265a57942c48bf6_22119777', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_146539782265a57942c48bf6_22119777 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_146539782265a57942c48bf6_22119777',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="bottom-margin">
        <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
seriesAdd">Nowa seria</a>
    </div>

    <div id="table">
        <?php $_smarty_tpl->_subTemplateRender("file:SeriesList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
<?php
}
}
/* {/block 'top'} */
}
