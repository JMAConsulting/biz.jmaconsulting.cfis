<?php

require_once 'cfis.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function cfis_civicrm_config(&$config) {
  _cfis_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function cfis_civicrm_xmlMenu(&$files) {
  _cfis_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function cfis_civicrm_install() {
  _cfis_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function cfis_civicrm_uninstall() {
  _cfis_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function cfis_civicrm_enable() {
  _cfis_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function cfis_civicrm_disable() {
  _cfis_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function cfis_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _cfis_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function cfis_civicrm_managed(&$entities) {
  _cfis_civix_civicrm_managed($entities);
}

function cfis_cdntaxreceipts_writeReceipt(&$pdf, $pdf_variables, $receipt) {
  $filePath = sprintf("%s/org.civicrm.cdntaxreceipts/cdntaxreceipts.functions.inc",
    CRM_Core_Config::singleton()->extensionsDir
  );
  if (file_exists($filePath)) {
    require_once $filePath;
    $mymargin_top = $pdf_variables['mymargin_top'];
    $pdf_variables["is_duplicate"] = FALSE;
     _cdntaxreceipts_writeReceipt($pdf, $pdf_variables);
    $pdf->AddPage();
    $pdf_variables["is_duplicate"] = TRUE;
    _cdntaxreceipts_writeReceipt($pdf, $pdf_variables);
    $pdf->AddPage();
    $pdf_variables["is_duplicate"] = TRUE;
    _cdntaxreceipts_writeReceipt($pdf, $pdf_variables);
    return array(TRUE);
  }
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function cfis_civicrm_caseTypes(&$caseTypes) {
  _cfis_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function cfis_civicrm_angularModules(&$angularModules) {
_cfis_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function cfis_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _cfis_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function cfis_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function cfis_civicrm_navigationMenu(&$menu) {
  _cfis_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'biz.jmaconsulting.cdntaxreceipts.cfis')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _cfis_civix_navigationMenu($menu);
} // */
