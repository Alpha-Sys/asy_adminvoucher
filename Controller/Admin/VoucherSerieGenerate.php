<?php
/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>   
 * @copyright   (C) Alpha-Sys 2008-2018
 * @version     16.08.2018 3.0.0
 */

namespace AlphaSys\AsyAdminVoucher\Controller\Admin;

/**
 * Voucher generating class.
 */
class asy_voucherserie_generate extends \OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController {

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
        $oConfig = \OxidEsales\Eshop\Core\Registry::getConfig();
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
                $oLang = \OxidEsales\Eshop\Core\Registry::getLang();
                $this->_aViewData["sGenerate_Success_Message"] = $iCount++ . $oLang->translateString('ASY_VOUCHER_GENERATED'); //" Codes erfolgreich generiert!";
            }
        }
    }

    /**
     * generates vouchers with specified characters
     */
    public function generateVoucherRandom() {
        $oConfig = \OxidEsales\Eshop\Core\Registry::getConfig();
        $iVoucherCount = $oConfig->getRequestParameter("voucher_count");
        if (!$iVoucherCount) {
            $iVoucherCount = 1;
        }

        $iVoucherLength = $oConfig->getRequestParameter("voucher_length");
        $sVoucherserie = $oConfig->getRequestParameter("oxid");
        $sCharacters = $oConfig->getRequestParameter("voucher_characters");
        $sVoucherPrefix = $oConfig->getRequestParameter("voucher_prefix");
        $iCount = 0;
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