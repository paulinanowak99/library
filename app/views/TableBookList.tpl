<table id="tab_books">
    <thead>
    <tr>
        <th>Okładka</th>
        <th>Autor</th>
        <th>Tytuł</th>
        <th>Status</th>
        <th>Akcje</th>
    </tr>
    </thead>
    <tbody>
    {foreach $books as $b}
        {strip}
            <tr>
                <td ><img style="height: 100px; width: 69px" src="{$conf->action_url}/uploads/{$b["file"]}"></td>
                <td style="vertical-align: middle">{$b["author"]}</td>
                <td style="vertical-align: middle">{$b["title"]}</td>
                <td style="vertical-align: middle">{$b["status"]}</td>
                <td style="vertical-align: middle">
                    <a href="{$conf->action_url}bookEdit/{$b['id']}" class="button primary small">Edytuj</a>
                    &nbsp;
                    <a href="{$conf->action_url}bookDelete/{$b['id']}" class="button primary small">Usuń</a>
                </td>
            </tr>
        {/strip}
    {/foreach}
    </tbody>
</table>
<div align="center">
    <button onclick="page('{$conf->action_root}bookListPart', '1', 'table', '{$searchTitle}')" class="small">Pierwsza strona</button>
    {if $previousPage}
        <button onclick="page('{$conf->action_root}bookListPart', '{$page-1}', 'table', '{$searchTitle}')" class="small">{$page-1}</button>
    {/if}
    <button onclick="page('{$conf->action_root}bookListPart', '{$page}', 'table', '{$searchTitle}')" class="small primary">{$page}</button>

    {if $oneMorePage}
        <button onclick="page('{$conf->action_root}bookListPart', '{$page+1}', 'table', '{$searchTitle}')" class="small">{$page+1}</button>
    {/if}
    <button onclick="page('{$conf->action_root}bookListPart', '{$lastPage}', 'table', '{$searchTitle}')" class="small">Ostatnia strona</button>
</div>