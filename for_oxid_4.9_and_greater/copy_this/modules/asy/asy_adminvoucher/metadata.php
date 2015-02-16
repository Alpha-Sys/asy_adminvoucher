<?php
/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>   
 * @copyright   (C) Alpha-Sys 2008-2015
 * @version     OXID eShop PE, EE
 * @version     03.01.2015  1.8
 */

/**
 * Module information
 */
$aModule = array(
    'id'           => 'asy_adminvoucher',
    'title'        => '<img src="../modules/asy/module_logo.png" alt="Alpha-Sys" title="Alpha-Sys"> Gutscheincode-Generierung',
    'description'  => 'Mit diesem Modul koennne Sie einstellen wie generierte Gutscheincodes aussehen sollen.',
    'thumbnail'    => 'module_adminvoucher.png',
    'version'      => '1.8',
    'author'       => 'Alpha-Sys',
    'email'        => 'fabian.kunkler@alpha-sys.de',
    'url'          => 'http://www.alpha-sys.de',
    'extend'       => array(
    ),
    'files'        => array(
        'asy_voucherserie_generate'     => 'asy/asy_adminvoucher/controllers/admin/asy_voucherserie_generate.php'
    ),
    'templates' => array(
        'asy_voucherserie_generate.tpl' => 'asy/asy_adminvoucher/views/admin/asy_voucherserie_generate.tpl'
    )
);