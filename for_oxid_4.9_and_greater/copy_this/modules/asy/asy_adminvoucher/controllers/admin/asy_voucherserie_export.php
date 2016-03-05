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
class asy_voucherserie_export extends oxAdminDetails {

    /**
     * used admin template
     * @var String 
     */
    protected $_sThisTemplate = "asy_voucherserie_export.tpl";

    protected $_sSeperator = ";";
    
    /**
     * Export file extension
     *
     * @var string
     */
    public $sExportFileType = "csv";

    public function exportUsedVouchers(){
        $oConfig = oxRegistry::getConfig();
        $sVoucherserie = $oConfig->getRequestParameter("oxid");
        $aData = $this->_getUsedVouchers($sVoucherserie);
        if (isset($aData) && is_array($aData) && count($aData) > 0) {
            $this->_generateCsvFile($aData);
        }else{
            $oLang = oxRegistry::getLang();
            $this->_aViewData["sMessage"] = $oLang->translateString('ASY_VOUCHER_NO_ORDERS'); //"Keine Bestellungen mit Gutscheinen vorhanden!";
        }
    }
    
    protected function _getUsedVouchers($sVoucherserie){
        $aData = array();
        $sVoucherView = getViewName("oxvouchers");
        $sOrderView = getViewName("oxorder");
        $sSelect = "Select v.oxvouchernr, o.oxordernr, o.oxorderdate, o.oxbillcompany, o.oxbillfname, o.oxbilllname, o.oxbillemail, o.oxbillstreet, o.oxbillstreetnr, o.oxbillzip, o.oxbillcity, o.oxtotalordersum, v.oxdiscount, o.oxtotalbrutsum "
                . "from $sVoucherView v left join $sOrderView o on v.oxorderid = o.oxid "
                . "where v.oxvoucherserieid = '$sVoucherserie' and v.oxorderid != ''";
        
        $oDb = oxDb::getDb();
        $oDb->SetFetchMode(ADODB_FETCH_ASSOC);
        $rs = $oDb->Execute($sSelect);
        if ($rs !== false && $rs->recordCount() > 0) {
            while (!$rs->EOF) {
                array_push($aData, $rs->fields);
                $rs->MoveNext();
            }
        }
        
        return $aData;
    }
    
    protected function _generateCsvFile($aData){
        $sCSVLine = "Gutschein-Code;Bestellnummer;Bestelldatum;Firma;Vorname;Nachname;Email;Straße;Hausnummer;PLZ;Ort;Artikelsumme (nicht rabattiert);Bestellsumme;Gutscheinwert;\n";
        foreach($aData as $sDataLine){
            $sCSVLine .= $sDataLine['oxvouchernr'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxordernr'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxorderdate'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxbillcompany'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxbillfname'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxbilllname'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxbillemail'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxbillstreet'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxbillstreetnr'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxbillzip'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxbillcity'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxtotalbrutsum'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxtotalordersum'] . $this->_sSeperator;
            $sCSVLine .= $sDataLine['oxdiscount'] . $this->_sSeperator;
            $sCSVLine .= "\n";
        }
        // output as csv file
        header("Content-Type: text/csv");
        //header("charset=iso-8859-1");
        header("Content-Length: " . strlen($sCSVLine));
        header("Content-Disposition: attachment; filename=voucher_export.csv");

        // this print is needed to open up the download window
        print $sCSVLine;

        exit();
    }
}