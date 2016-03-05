[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{ if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<script type="text/javascript">
<!--
function changeFnc( fncName )
{
    var langvar = document.myedit.elements['fnc'];
    if (langvar != null )
        langvar.value = fncName;
}
//-->
</script>

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="asy_voucherserie_export">
</form>



<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr>
    <td valign="top" class="edittext" width="355">    
<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
[{ $oViewConf->getHiddenSid() }]
<input type="hidden" name="cl" value="asy_voucherserie_export">
<input type="hidden" name="fnc" value="exportUsedVouchers">
<input type="hidden" name="oxid" value="[{$oxid}]">
<input type="hidden" name="editval[oxvoucherseries__oxid]" value="[{$oxid}]">

        <table cellspacing="2" cellpadding="0" border="0">
        [{if $sMessage}]
            <tr>
                <td class="edittext">
                </td>
                <td class="edittext">
                    [{$sMessage}]
                </td>
            </tr>
        [{/if}]
        <tr>
            <td class="edittext">
            </td>
            <td class="edittext"><br>
            <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="ASY_VOUCHER_EXPORT_USED" }]" [{ $readonly }] onClick="Javascript:changeFnc('exportUsedVouchers');">
            </td>
        </tr>
        </table>

</form>

    </td>   
    <td style="vertical-align: top;">
    
    </td>
    </tr>
</table>
<div id="asy_background" style="text-align: right; right: 5px; bottom: 5px;">
    <a href="http://www.alpha-sys.de" target="_blank" title="Alpha-Sys"><img src="[{$oViewConf->getModuleUrl('asy_adminvoucher')}]views/admin/img/alpha-sys.jpg" alt="Alpha-Sys" title="Alpha-Sys"></a>
</div>
[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]
