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
 * Module information
 */
$aModule = array(
    'id'           => 'asy_adminvoucher',
    'title'        => '<img src="../modules/asy/module_logo.png" alt="Alpha-Sys" title="Alpha-Sys"> Gutscheincode-Generierung',
    'description'  => 'Mit diesem Modul koennne Sie einstellen wie generierte Gutscheincodes aussehen sollen.',
    'thumbnail'    => 'module_logo.png',
    'version'      => '2.0',
    'author'       => 'Alpha-Sys',
    'email'        => 'fabian.kunkler@alpha-sys.de',
    'url'          => 'http://www.alpha-sys.de',
    'extend'       => array(
    ),
    'files'        => array(
        'asy_voucherserie_export'       => 'asy/asy_adminvoucher/controllers/admin/asy_voucherserie_export.php',
        'asy_voucherserie_generate'     => 'asy/asy_adminvoucher/controllers/admin/asy_voucherserie_generate.php'
    ),
    'templates' => array(
        'asy_voucherserie_export.tpl'   => 'asy/asy_adminvoucher/views/admin/tpl/asy_voucherserie_export.tpl',
        'asy_voucherserie_generate.tpl' => 'asy/asy_adminvoucher/views/admin/tpl/asy_voucherserie_generate.tpl'
    )
);