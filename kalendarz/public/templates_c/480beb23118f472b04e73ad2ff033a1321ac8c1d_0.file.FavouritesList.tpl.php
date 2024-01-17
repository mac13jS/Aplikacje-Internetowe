<?php
/* Smarty version 4.3.4, created on 2024-01-16 17:34:23
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\FavouritesList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a6b00f4aff81_22194914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '480beb23118f472b04e73ad2ff033a1321ac8c1d' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\FavouritesList.tpl',
      1 => 1705422861,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a6b00f4aff81_22194914 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Seria</th>
            <th>Ulubione</th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['series']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
?>
    <tr><td><a class="series" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calendar/<?php echo $_smarty_tpl->tpl_vars['s']->value['id_series'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value["name"];?>
</a></td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
seriesFavouriteDelete/<?php echo $_smarty_tpl->tpl_vars['s']->value['id_series'];?>
">Usuń</a></td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
