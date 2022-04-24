<table id="tab_users">
    <thead>
    <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Login</th>
        <th>Rola</th>
        <th>Akcje</th>
    </tr>
    </thead>
    <tbody>
    {foreach $users as $u}
        {strip}
            <tr>
                <td>{$u["firstname"]}</td>
                <td>{$u["lastname"]}</td>
                <td>{$u["login"]}</td>
                <td>{$u["role"]}</td>
                <td>
                    <a href="{$conf->action_url}userEdit/{$u['id']}" class="button primary small">Edytuj</a>
                    &nbsp;
                    <a href="{$conf->action_url}userDelete/{$u['id']}" class="button primary small">Usuń</a>
                </td>
            </tr>
        {/strip}
    {/foreach}
    </tbody>
</table>
<div align="center">
    <button onclick="page('{$conf->action_root}userListPart', '1', 'table', '{$searchLastname}')" class="small">Pierwsza strona</button>
    {if $previousPage}
        <button onclick="page('{$conf->action_root}userListPart', '{$page-1}', 'table', '{$searchLastname}')" class="small">{$page-1}</button>
    {/if}
    <button onclick="page('{$conf->action_root}userListPart', '{$page}', 'table', '{$searchLastname}')" class="small primary">{$page}</button>

    {if $oneMorePage}
        <button onclick="page('{$conf->action_root}userListPart', '{$page+1}', 'table', '{$searchLastname}')" class="small">{$page+1}</button>
    {/if}
    <button onclick="page('{$conf->action_root}userListPart', '{$lastPage}', 'table', '{$searchLastname}')" class="small">Ostatnia strona</button>
    {$lastPage}
</div>