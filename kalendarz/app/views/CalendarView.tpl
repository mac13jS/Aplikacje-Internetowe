{extends file="main.tpl"}  

{block name=top}
    <div class="bottom-margin">
        <a class="pure-button button-success" href="{$conf->action_root}calendarAdd">Nowy wyścig</a>
    </div>

    <div id="table">
        {include file="Calendar.tpl"}
    </div>
{/block}