 <table id="tab_books">
        <thead>
        <tr>
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
                    <td>{$b["author"]}</td>
                    <td>{$b["title"]}</td>
                    <td>{$b["status"]}</td>
                    <td>
                        {if $b["status"] eq "dostępna"}
                            <a href="{$conf->action_url}bookRentUser/{$b['id']}" class="button primary small">Wypożycz</a>
                        {/if}
                        {if $b["status"] eq "wypożyczona"}
                            <a class="button primary small disabled">Wypożycz</a>
                        {/if}
                    </td>
                </tr>
            {/strip}
        {/foreach}
        </tbody>
    </table>
 <div align="center">
     <button onclick="page('{$conf->action_root}bookListUserPart', '1', 'table', '{$searchTitle}')" class="small">Pierwsza strona</button>
     {if $previousPage}
     <button onclick="page('{$conf->action_root}bookListUserPart', '{$page-1}', 'table', '{$searchTitle}')" class="small">{$page-1}</button>
     {/if}
     <button onclick="page('{$conf->action_root}bookListUserPart', '{$page}', 'table', '{$searchTitle}')" class="small primary">{$page}</button>

     {if $oneMorePage}
     <button onclick="page('{$conf->action_root}bookListUserPart', '{$page+1}', 'table', '{$searchTitle}')" class="small">{$page+1}</button>
     {/if}
     <button onclick="page('{$conf->action_root}bookListUserPart', '{$lastPage}', 'table', '{$searchTitle}')" class="small">Ostatnia strona</button>
 </div>