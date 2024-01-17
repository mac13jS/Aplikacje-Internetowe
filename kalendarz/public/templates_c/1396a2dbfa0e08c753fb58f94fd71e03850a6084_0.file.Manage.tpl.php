<?php
/* Smarty version 4.3.4, created on 2024-01-17 20:10:14
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\Manage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a82616f38e42_82527794',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1396a2dbfa0e08c753fb58f94fd71e03850a6084' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\Manage.tpl',
      1 => 1705518612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a82616f38e42_82527794 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
  

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_168894273365a82616f31138_53132676', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_168894273365a82616f31138_53132676 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_168894273365a82616f31138_53132676',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <table class="pure-table pure-table-bordered">
        <thead>
            <tr>
                <th>Użytkownik</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
        <tr><td><?php echo $_smarty_tpl->tpl_vars['u']->value["login"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageEdit/<?php echo $_smarty_tpl->tpl_vars['u']->value['id_user'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" onclick="deleteConfirm('Czy na pewno chcesz usunąć użytkownika?', '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageDeleteUser/<?php echo $_smarty_tpl->tpl_vars['u']->value['id_user'];?>
')">Usuń</a></td></tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
<?php
}
}
/* {/block 'top'} */
}
