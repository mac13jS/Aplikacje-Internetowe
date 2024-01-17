<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Kalendarz sportowy</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
		integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css">
	<script type="text/javascript" src="{$conf->app_url}/js/functions.js"></script>
</head>

<body style="margin: 20px;">

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a class="pure-menu-heading">Kalendarz Sportowy</a>

	<ul class="pure-menu-list">
        <li class="pure-menu-item"><a href="{$conf->action_root}series" class="pure-menu-link">Serie</a></li>
        <li class="pure-menu-item"><a href="{$conf->action_root}favourites" class="pure-menu-link">Ulubione</a></li>
        <li class="pure-menu-item"><a href="{$conf->action_root}manage" class="pure-menu-link">Zarządzaj</a></li>
		{if count($conf->roles)>0}
			<li class="pure-menu-item"><a href="{$conf->action_root}logout" class="pure-menu-item pure-menu-link">Wyloguj</a></li>
		{else}	
			<li class="pure-menu-item"><a href="{$conf->action_root}loginShow" class="pure-menu-item pure-menu-link">Zaloguj</a></li>
		{/if}
    </ul>
</div>

{block name=top} {/block}

{block name=messages}

{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

{/block}

{block name=bottom} {/block}

</body>

</html>