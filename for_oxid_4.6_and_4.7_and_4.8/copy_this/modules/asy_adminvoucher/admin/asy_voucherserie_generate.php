<?php

/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>   
 * @copyright   (C) Alpha-Sys 2008-2012
 * @version     OXID eShop PE, EE
 * @version     14.01.2011  1.1
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
        $sVouchercodes = oxConfig::getParameter("voucher_codes");
        //transform to array
        $aVouchercodes = explode("\n", $sVouchercodes);
        if (is_array($aVouchercodes) && count($aVouchercodes) > 0) {
            $sVoucherserie = oxConfig::getParameter("oxid");
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
                $this->_aViewData["sGenerate_Success_Message"] = $iCount++ . " Codes erfolgreich generiert!";
            }
        }
    }

    /**
     * generates vouchers with specified characters
     */
    public function generateVoucherRandom() {
        $iVoucherCount = oxConfig::getParameter("voucher_count");
        if (!$iVoucherCount) {
            $iVoucherCount = 1;
        }

        $iVoucherLength = oxConfig::getParameter("voucher_length");
        $sVoucherserie = oxConfig::getParameter("oxid");
        $sCharacters = oxConfig::getParameter("voucher_characters");
        $sVoucherPrefix = oxConfig::getParameter("voucher_prefix");
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
            $this->_aViewData["sGenerate_Random_Success_Message"] = $iCount++ . " Codes erfolgreich generiert!";
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