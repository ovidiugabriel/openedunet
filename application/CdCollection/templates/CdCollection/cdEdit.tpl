<form action="{url module="CdCollection" action="cdUpdate"}" method="post">
	{include file="CdCollection/cdForm.tpl"}
	<input type="hidden" name="cd_id" value="{$cd.cd_id}" />
	<input type="submit" value="Update" />	
</form>
