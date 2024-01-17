<?php
/* Smarty version 4.3.4, created on 2024-01-16 19:59:39
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\Calendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a6d21b16ba33_09647464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e9d27416193b9c59309b1e92a48564700b95098' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\Calendar.tpl',
      1 => 1705431577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a6d21b16ba33_09647464 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Runda</th>
            <th>Nazwa</th>
            <th>Tor</th>
            <th>Data</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calendar']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['c']->value["round"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["circuit"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["date"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calendarEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_calendar'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" onclick="deleteConfirm('Czy na pewno chcesz usunąć rundę z listy?', '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calendarDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_calendar'];?>
')">Usuń</a></td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
