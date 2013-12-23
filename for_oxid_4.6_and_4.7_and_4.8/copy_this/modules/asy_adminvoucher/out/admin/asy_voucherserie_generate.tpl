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
    <input type="hidden" name="cl" value="asy_voucherserie_generate">
</form>



<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr>
    <td valign="top" class="edittext" width="355">    
<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
[{ $oViewConf->getHiddenSid() }]
<input type="hidden" name="cl" value="asy_voucherserie_generate">
<input type="hidden" name="fnc" value="generateVoucherBatch">
<input type="hidden" name="oxid" value="[{$oxid}]">
<input type="hidden" name="editval[oxvoucherseries__oxid]" value="[{$oxid}]">

        <table cellspacing="2" cellpadding="0" border="0">
        [{block name="asy_voucherserie_generate_batch"}]
            <tr>
                <td class="edittext"></td>
                <td class="edittext"><strong>[{ oxmultilang ident="ASY_VOUCHER_BATCH_TITLE" }]</strong>[{ oxinputhelp ident="HELP_ASY_VOUCHER_BATCH" }]</td>
            </tr>
            <tr>
                <td class="edittext"></td>
                [{if $sGenerate_Success_Message}]
                <td class="edittext" style="color: #00B910; padding-left: 8px"><img src="/img/asy_tick.png" alt="success" title="success">[{$sGenerate_Success_Message}]</td>
                [{else}]
                <td class="edittext"></td>
                [{/if}]
            </tr>
            <tr>
                <td class="edittext" style="vertical-align: top;" width="80">
                [{ oxmultilang ident="ASY_VOUCHER_CODES" }]
                </td>
                <td class="edittext" width="240" style="border-right: 1px solid #CECECE">
                <textarea class="editinput" name="voucher_codes" cols="30" rows="10"></textarea>
                [{ oxinputhelp ident="HELP_ASY_VOUCHER_CODES" }]
                </td>
            </tr>
            
        [{/block}]
        <tr>
            <td class="edittext">
            </td>
            <td class="edittext"><br>
            <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="ASY_VOUCHER_BATCH_GENERATE" }]" [{ $readonly }] onClick="Javascript:changeFnc('generateVoucherBatch');">
            </td>
        </tr>
        </table>

</form>

    </td>   
    <td style="vertical-align: top;">
    <form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="cl" value="asy_voucherserie_generate">
    <input type="hidden" name="fnc" value="generateVoucherRandom">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="editval[oxvoucherseries__oxid]" value="[{$oxid}]">
        <table cellspacing="2" cellpadding="0" border="0">
        [{block name="asy_voucherserie_generate_random"}]
            <tr>
                <td class="edittext"></td>
                <td class="edittext"><strong>[{ oxmultilang ident="ASY_VOUCHER_RANDOM_TITLE" }]</strong>[{ oxinputhelp ident="HELP_ASY_VOUCHER_RANDOM" }]</td>
            </tr>
            <tr>
                <td class="edittext"></td>
                [{if $sGenerate_Random_Success_Message}]
                <td class="edittext" style="color: #00B910; padding-left: 8px"><img src="[{$oViewConf->getModuleUrl('asy_adminvoucher')}]/out/admin/img/asy_tick.png" alt="success" title="success">[{$sGenerate_Random_Success_Message}]</td>
                [{else}]
                <td class="edittext"></td>
                [{/if}]
            </tr>
            <tr>
                <td class="edittext" style="vertical-align: top;" width="80">
                [{ oxmultilang ident="ASY_VOUCHER_COUNT" }]
                </td>
                <td class="edittext" width="195">
                <input class="editinput" type="text" name="voucher_count" size="4" value="0">
                [{ oxinputhelp ident="HELP_ASY_VOUCHER_COUNT" }]
                </td>
            </tr>
            <tr>
                <td class="edittext" style="vertical-align: top;" width="80">
                [{ oxmultilang ident="ASY_VOUCHER_LENGTH" }]
                </td>
                <td class="edittext" width="195">
                <input class="editinput" type="text" name="voucher_length" size="4" value="0">
                [{ oxinputhelp ident="HELP_ASY_VOUCHER_LENGTH" }]
                
                </td>
            </tr>
            <tr>
                <td class="edittext" style="vertical-align: top;" width="80">
                [{ oxmultilang ident="ASY_VOUCHER_PREFIX" }]
                </td>
                <td class="edittext" width="195">
                <input class="editinput" type="text" name="voucher_prefix" size="15" value="">
                [{ oxinputhelp ident="HELP_ASY_VOUCHER_PREFIX" }]
                
                </td>
            </tr>
            <tr>
                <td class="edittext" style="vertical-align: top;">
                [{ oxmultilang ident="ASY_VOUCHER_CHARACTERS" }]
                </td>
                <td class="edittext" width="195">
                <input class="editinput" type="text" name="voucher_characters" size="50" value="0123456789abcdefghijklmnopqrstuvwxyz">
                [{ oxinputhelp ident="HELP_ASY_VOUCHER_CHARACTERS" }]
                
                </td>
            </tr>
            
        [{/block}]
        <tr>
            <td class="edittext">
            </td>
            <td class="edittext"><br>
            <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="ASY_VOUCHER_BATCH_GENERATE" }]" [{ $readonly }] onClick="Javascript:changeFnc('generateVoucherRandom');">
            </td>
        </tr>
        </table>
        </form>    
    </td>
    </tr>
</table>
<div id="asy_background" style="text-align: right; right: 5px; bottom: 5px;">
    <a href="http://www.alpha-sys.de" target="_blank" title="Alpha-Sys"><img src="[{$oViewConf->getModuleUrl('asy_adminvoucher')}]/out/admin/img/alpha-sys.jpg" alt="Alpha-Sys" title="Alpha-Sys"></a>
</div>
[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]
