<?php
/* Smarty version 4.3.4, created on 2024-01-15 21:01:50
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\FavouritesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a58f2e5f8bd0_77954025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4498d4f76f54610c3f5e4e3862d9c1d7e54e38fb' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\FavouritesView.tpl',
      1 => 1705348632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:FavouritesList.tpl' => 1,
  ),
),false)) {
function content_65a58f2e5f8bd0_77954025 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
  

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62730035165a58f2e5f61a7_84530236', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_62730035165a58f2e5f61a7_84530236 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_62730035165a58f2e5f61a7_84530236',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div id="table">
        <?php $_smarty_tpl->_subTemplateRender("file:FavouritesList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
<?php
}
}
/* {/block 'top'} */
}
