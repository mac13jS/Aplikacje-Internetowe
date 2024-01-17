{extends file="main.tpl"}

{block name=top}
    <div class="bottom-margin">
        <form action="{$conf->action_root}calendarSave" method="post" class="pure-form pure-form-aligned">
            <fieldset>
                <legend>Dane rundy</legend>
                <div class="pure-control-group">
                    <label for="name">Nazwa rundy</label>
                    <input id="name" type="text" placeholder="nazwa" name="name" value="{$form->name}">
                </div>
                <div class="pure-control-group">
                    <label for="circuit">Tor</label>
                    <input id="circuit" type="text" placeholder="tor" name="circuit" value="{$form->circuit}">
                </div>
                <div class="pure-control-group">
                    <label for="date">Data</label>
                    <input id="date" type="text" placeholder="data" name="date" value="{$form->date}">
                </div>
                <div class="pure-control-group">
                    <label for="round">Numer rundy</label>
                    <input id="round" type="text" placeholder="numer rundy" name="round" value="{$form->round}">
                </div>
                <div class="pure-controls">
                    <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                    <a class="pure-button button-secondary" href="{$conf->action_root}calendar/{$form->id}">Powrót</a>
                </div>
            </fieldset>
            <input type="hidden" name="id" value="{$form->id}">
        </form>	
    </div>
{/block}