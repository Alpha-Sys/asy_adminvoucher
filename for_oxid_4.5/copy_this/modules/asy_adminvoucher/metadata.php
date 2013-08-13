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
 * @version     20.05.2012  1.0
 */

/**
 * Module information
 */
$aModule = array(
    'id'           => 'asy_adminvoucher',
    'title'        => 'Gutscheincode-Generierung',
    'description'  => 'Mit diesem Modul koennne Sie einstellen wie generierte Gutscheincodes aussehen sollen.',
    'thumbnail'    => '',
    'version'      => '1.5',
    'author'       => 'Alpha-Sys',
    'email'        => 'fabian.kunkler@alpha-sys.de',
    'url'          => 'http://www.alpha-sys.de',
    'extend'       => array(
        'voucherserie_main' => 'asy_adminvoucher/admin/asy_adminvoucher__voucherserie_main'
    )
);