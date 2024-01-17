{extends file="main.tpl"}  

{block name=top}
    <div class="bottom-margin">
        <a class="pure-button button-success" href="{$conf->action_root}seriesAdd">Nowa seria</a>
    </div>

    <div id="table">
        {include file="SeriesList.tpl"}
    </div>
{/block}