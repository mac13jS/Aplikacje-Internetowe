<?php
/* Smarty version 4.3.4, created on 2024-01-17 19:20:59
  from 'D:\App\Xampp\htdocs\kalendarz\app\views\ManageEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65a81a8ba81ce7_58455638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c53dd51450509d4859505ad9c408ab5f0b6805b' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalendarz\\app\\views\\ManageEdit.tpl',
      1 => 1705515646,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a81a8ba81ce7_58455638 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19447203065a81a8ba794a4_45077998', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_19447203065a81a8ba794a4_45077998 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_19447203065a81a8ba794a4_45077998',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="bottom-margin">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageSave" method="post" class="pure-form pure-form-aligned">
            <fieldset>
                <legend>Dane użytkownika</legend>
                <div class="pure-control-group">
                    <label for="login">Login</label>
                    <input id="login" type="text" placeholder="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
">
                </div>
                <div class="pure-control-group">
                    <label for="role">Rola użytkownika</label>
                    <select name="role">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'role');
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?>
                            <option value=<?php echo $_smarty_tpl->tpl_vars['role']->value["id_role"];?>
><?php echo $_smarty_tpl->tpl_vars['role']->value["name"];?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
                <div class="pure-controls">
                    <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                    <a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manage">Powrót</a>
                </div>
            </fieldset>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
        </form>	
    </div>

    <table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Rola</th>
            <th>Data dodania</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userRoles']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
    <tr><td><a class="series"><?php echo $_smarty_tpl->tpl_vars['r']->value["name"];?>
</a></td><td><a class="series"><?php echo $_smarty_tpl->tpl_vars['r']->value["access_date"];?>
</a></td><td><a class="button-small pure-button button-warning" onclick="deleteConfirm('Czy na pewno chcesz usunąć rolę użytkownikowi?', '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
manageDelete/<?php echo $_smarty_tpl->tpl_vars['r']->value['id_role'];?>
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
