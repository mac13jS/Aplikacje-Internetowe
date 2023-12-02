<?php
/* Smarty version 4.3.4, created on 2023-12-02 18:35:00
  from 'D:\App\Xampp\htdocs\kalkulator_kredytowy_amelia\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_656b6ac4efc0c2_06021791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd424b8778ff60d2d700b44b449c33230a7d0061' => 
    array (
      0 => 'D:\\App\\Xampp\\htdocs\\kalkulator_kredytowy_amelia\\app\\views\\templates\\main.tpl',
      1 => 1701538498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656b6ac4efc0c2_06021791 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['data']->value->desc;?>
">
	<title><?php echo $_smarty_tpl->tpl_vars['data']->value->title;?>
</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css?v=<?php echo '<?php'; ?>
 echo time(); <?php echo '?>'; ?>
">	
</head>

<body>

<div class="header">
	<h1><?php echo $_smarty_tpl->tpl_vars['data']->value->title;?>
</h1>
	<h2><?php echo $_smarty_tpl->tpl_vars['data']->value->desc;?>
</h1>
</div>

<div class="content">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1422668574656b6ac4efb0e9_25511116', 'content');
?>

</div><!-- content -->

<div class="footer">
	<p>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_131832013656b6ac4efbbf9_17001472', 'footer');
?>

	</p>
</div>

</body>
</html><?php }
/* {block 'content'} */
class Block_1422668574656b6ac4efb0e9_25511116 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1422668574656b6ac4efb0e9_25511116',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_131832013656b6ac4efbbf9_17001472 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_131832013656b6ac4efbbf9_17001472',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Przykładowa stopka </br> Maciej Szczepanik <?php
}
}
/* {/block 'footer'} */
}
