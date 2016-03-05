<?php
/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>   
 * @copyright   (C) Alpha-Sys 2008-2016
 * @version     05.03.2016  2.0
 */

/**
 * Voucher generating class.
 */
class asy_voucherserie_generate extends oxAdminDetails {

    /**
     * used admin template
     * @var String 
     */
    protected $_sThisTemplate = "asy_voucherserie_generate.tpl";

    /**
     * Generates vouchercodes from array
     */
    public function generateVoucherBatch() {
        //get vouchercodes from textarea
        $oConfig = oxRegistry::getConfig();
        $sVouchercodes = $oConfig->getRequestParameter("voucher_codes");
        //transform to array
        $aVouchercodes = explode("\n", $sVouchercodes);
        if (is_array($aVouchercodes) && count($aVouchercodes) > 0) {
            $sVoucherserie = $oConfig->getRequestParameter("oxid");
            if ($sVoucherserie) {
                $iCount = 0;
                foreach ($aVouchercodes as $sCode) {
                    if ($sCode != '' && strlen($sCode) <= 255) {
                        //add new voucher
                        $oNewVoucher = oxNew("oxvoucher");
                        $oNewVoucher->oxvouchers__oxvoucherserieid = new oxField($sVoucherserie);
                        $oNewVoucher->oxvouchers__oxvouchernr = new oxField(trim($sCode));
                        $oNewVoucher->save();
                        $iCount++;
                    }
                }
                $oLang = oxRegistry::getLang();
                $this->_aViewData["sGenerate_Success_Message"] = $iCount++ . $oLang->translateString('ASY_VOUCHER_GENERATED'); //" Codes erfolgreich generiert!";
            }
        }
    }

    /**
     * generates vouchers with specified characters
     */
    public function generateVoucherRandom() {
        $oConfig = oxRegistry::getConfig();
        $iVoucherCount = $oConfig->getRequestParameter("voucher_count");
        if (!$iVoucherCount) {
            $iVoucherCount = 1;
        }

        $iVoucherLength = $oConfig->getRequestParameter("voucher_length");
        $sVoucherserie = $oConfig->getRequestParameter("oxid");
        $sCharacters = $oConfig->getRequestParameter("voucher_characters");
        $sVoucherPrefix = $oConfig->getRequestParameter("voucher_prefix");
        if ($sCharacters && $iVoucherLength && $sVoucherserie) {
            for ($i = 0; $i < $iVoucherCount; $i++) {
                $sCode = $sVoucherPrefix . $this->_generateRandomString($iVoucherLength, $sCharacters);
                if ($sCode != '' && strlen($sCode) <= 255) {
                    //add new voucher
                    $oNewVoucher = oxNew("oxvoucher");
                    $oNewVoucher->oxvouchers__oxvoucherserieid = new oxField($sVoucherserie);
                    $oNewVoucher->oxvouchers__oxvouchernr = new oxField($sCode);
                    $oNewVoucher->save();
                    $iCount++;
                }
            }
            $oLang = oxRegistry::getLang();
            $this->_aViewData["sGenerate_Random_Success_Message"] = $iCount++ . $oLang->translateString('ASY_VOUCHER_GENERATED'); //" Codes erfolgreich generiert!";
        }
    }

    /**
     * generates random string
     */
    protected function _generateRandomString($iLength, $sCharacters) {
        $string = '';
        for ($p = 0; $p < $iLength; $p++) {
            $string .= $sCharacters[mt_rand(0, strlen($sCharacters)-1)];
        }

        return $string;
    }

}