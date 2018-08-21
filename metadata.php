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
 * @version     21.08.2018 3.0.1
 */

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'asy_adminvoucher',
    'title'        => '<img src="../modules/asy/asy_adminvoucher/module_icon.png" alt="Alpha-Sys" title="Alpha-Sys"> Gutscheincode-Generierung',
    'description'  => 'Mit diesem Modul koennne Sie einstellen wie generierte Gutscheincodes aussehen sollen.',
    'thumbnail'    => 'module_logo.png',
    'version'      => '3.0.1',
    'author'       => 'Alpha-Sys',
    'email'        => 'fabian.kunkler@alpha-sys.de',
    'url'          => 'http://www.alpha-sys.de',
    'extend'       => array(
    ),
    'controllers' => array(
        'asy_voucherserie_generate'      => \AlphaSys\AsyAdminVoucher\Controller\Admin\VoucherSerieGenerate::class,
        'asy_voucherserie_export'        => \AlphaSys\AsyAdminVoucher\Controller\Admin\VoucherSerieExportExtended::class
    ),
    'templates' => array(
        'asy_voucherserie_export.tpl'   => 'asy/asy_adminvoucher/views/admin/tpl/asy_voucherserie_export.tpl',
        'asy_voucherserie_generate.tpl' => 'asy/asy_adminvoucher/views/admin/tpl/asy_voucherserie_generate.tpl'
    )
);