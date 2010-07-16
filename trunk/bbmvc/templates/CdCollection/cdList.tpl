{if $status}
	<p class="status">{$_statusMsg[$status]}</p>
{elseif $error}
	<p class="error">{$_errorMsg[$error]}</p>
{/if}

<table>
<tr>	<th>Cd Title</th>
		<th>Year</yh>
		<th>Artist</th>
		<th>&nbsp;</th>
{section name=i loop=$cd}
	<tr>	<td>{a module=CdCollection action=cdEdit cd_id=$cd[i].cd_id seo_cd_title=$cd[i].cd_title_seo}{$cd[i].cd_title}{/a}</td>
			<td>{$cd[i].cd_year}</td>
			<td>{$cd[i].cd_artist}</td>
			<td>{a module=CdCollection action=cdDelete cd_id=$cd[i].cd_id}delete{/a}</td></tr>
{sectionelse}
	<tr>	<td colspan="3">No CDs in collection</td></tr>			
{/section}
</table>
<br /><br />
{a module=CdCollection}Home{/a} | 
{a module=CdCollection action=cdNew}Add new cd{/a}