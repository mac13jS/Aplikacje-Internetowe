<?php
/* Smarty version 4.3.4, created on 2023-12-02 18:37:25
  from 'D:\App\Xampp\htdocs\kalkulator_kredytowy_amelia\app\views\Calculator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656b6b55416439_55857731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '063e776ae0a86f044829d451db716f3f6ab03baf' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalkulator_kredytowy_amelia\\app\\views\\Calculator.tpl',
      1 => 1701538585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656b6b55416439_55857731 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_830420819656b6b5540c116_50149445', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_830420819656b6b5540c116_50149445 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_830420819656b6b5540c116_50149445',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calc" method="post">

			<label for="loanAmount">Kwota kredytu: </label>
			<input id="loanAmount" type="text" name="kredyt" value="<?php echo $_smarty_tpl->tpl_vars['data']->value->kredyt;?>
"><br /><br />
			<label for="interest">Oprocentowanie roczne: </label>
			<input id="interest" type="text" name="oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['data']->value->oprocentowanie;?>
"><br /><br />
			<label for="repaymentPeriod">Długość trwania kredytu: </label>
			<input id="repaymentPeriod" type="text" name="okres_kredytowania" value="<?php echo $_smarty_tpl->tpl_vars['data']->value->okres_kredytowania;?>
"><br /><br />
			<button type="submit">Oblicz</button>
		
	</form>

	<div class="messages">
		<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
			<h4>Wystąpiły błędy: </h4>
			<ol class="err">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ol>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
			<h4>Informacje: </h4>
			<ol class="inf">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ol>
		<?php }?>
		<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
			<h4>Wynik</h4>
			<p class="res"><?php echo round($_smarty_tpl->tpl_vars['result']->value,2);?>
</p>
		<?php }?>
	</div>

<?php
}
}
/* {/block 'content'} */
}
