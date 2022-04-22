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
     {if $page lte 1}
         <a href="{url action='bookListUser' page=$page-1 title=$searchTitle}" class="button small disabled"><</a>
     {else}
         <a href="{url action='bookListUser' page=$page-1 title=$searchTitle}" class="button small"><</a>
     {/if}
     <a href="{url action='bookListUser' page=$page title=$searchTitle}" class="button primary small">{$page}</a>

     {if $oneMorePage}
         <a href="{url action='bookListUser' page=$page+1 title=$searchTitle}" class="button small">{$page+1}</a>
     {/if}

     {if $twoMorePages}
         <a href="{url action='bookListUser' page=$page+2 title=$searchTitle}" class="button small">{$page+2}</a>
     {/if}

     {if $limit gt $page}
         <a href="{url action='bookListUser' page=$page+1 title=$searchTitle}" class="button small">></a>
     {else}
         <a href="{url action='bookListUser' page=$page+1 title=$searchTitle}" class="button small disabled">></a>
     {/if}
 </div>