{extends file="main.tpl"}

{block name=content}

	<form action="{$conf->action_root}calc" method="post">

			<label for="loanAmount">Kwota kredytu: </label>
			<input id="loanAmount" type="text" name="kredyt" value="{$data->kredyt}"><br /><br />
			<label for="interest">Oprocentowanie roczne: </label>
			<input id="interest" type="text" name="oprocentowanie" value="{$data->oprocentowanie}"><br /><br />
			<label for="repaymentPeriod">Długość trwania kredytu: </label>
			<input id="repaymentPeriod" type="text" name="okres_kredytowania" value="{$data->okres_kredytowania}"><br /><br />
			<button type="submit">Oblicz</button>
		
	</form>

	<div class="messages">
		{if $msgs->isError()}
			<h4>Wystąpiły błędy: </h4>
			<ol class="err">
				{foreach $msgs->getMessages() as $msg}
				<li>{$msg->text}</li>
				{/foreach}
			</ol>
		{/if}
		{if $msgs->isInfo()}
			<h4>Informacje: </h4>
			<ol class="inf">
				{foreach $msgs->getMessages() as $msg}
				<li>{$msg->text}</li>
				{/foreach}
			</ol>
		{/if}
		{if isset($result)}
			<h4>Wynik</h4>
			<p class="res">{round($result, 2)}</p>
		{/if}
	</div>

{/block}