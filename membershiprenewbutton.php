<?php

require_once 'membershiprenewbutton.civix.php';
// phpcs:disable
use CRM_Membershiprenewbutton_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function membershiprenewbutton_civicrm_config(&$config) {
  _membershiprenewbutton_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function membershiprenewbutton_civicrm_xmlMenu(&$files) {
  _membershiprenewbutton_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function membershiprenewbutton_civicrm_install() {
  _membershiprenewbutton_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function membershiprenewbutton_civicrm_postInstall() {
  _membershiprenewbutton_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function membershiprenewbutton_civicrm_uninstall() {
  _membershiprenewbutton_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function membershiprenewbutton_civicrm_enable() {
  _membershiprenewbutton_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function membershiprenewbutton_civicrm_disable() {
  _membershiprenewbutton_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function membershiprenewbutton_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _membershiprenewbutton_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function membershiprenewbutton_civicrm_managed(&$entities) {
  _membershiprenewbutton_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function membershiprenewbutton_civicrm_caseTypes(&$caseTypes) {
  _membershiprenewbutton_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function membershiprenewbutton_civicrm_angularModules(&$angularModules) {
  _membershiprenewbutton_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function membershiprenewbutton_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _membershiprenewbutton_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function membershiprenewbutton_civicrm_entityTypes(&$entityTypes) {
  _membershiprenewbutton_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function membershiprenewbutton_civicrm_themes(&$themes) {
  _membershiprenewbutton_civix_civicrm_themes($themes);
}

/**
 * Implements hook_civicrm_alterSettingsMetaData().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsMetaData
 */
function membershiprenewbutton_civicrm_alterSettingsMetaData(&$settingsMetadata, $domainID, $profile) {
  $settingsMetadata['membershiprenewbutton_link'] = [
    'group_name' => CRM_Core_BAO_Setting::MEMBER_PREFERENCES_NAME,
    'group' => 'member',
    'name' => 'membershiprenewbutton_link',
    'type' => 'String',
    'quick_form_type' => 'Element',
    'html_type' => 'text',
    'html_attributes' => [
      'size' => 2,
      'maxlength' => 8,
    ],
    'default' => '',
    'add' => '5.35',
    'title' => ts('Renewal Button link'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => '',
    'help_text' => NULL,
  ];
}

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 */
function membershiprenewbutton_civicrm_preProcess($formName, &$form) {
  if ('CRM_Admin_Form_Preferences_Member' == $formName) {
    $vars = $form->getVar('_settings');
    $vars['membershiprenewbutton_link'] = CRM_Core_BAO_Setting::MEMBER_PREFERENCES_NAME;
    $form->setVar('_settings', $vars);
    $form->setVar('settingsMetadata', '');
  }
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 */
function membershiprenewbutton_civicrm_buildForm($formName, &$form) {
  if ('CRM_Admin_Form_Preferences_Member' == $formName) {
    $form->add('text', 'membershiprenewbutton_link', ts('Renewal Button link'), ['size' => 50]);
    $form->assign('fields', $form->getVar('settingsMetadata'));
  }
}


/**
 * Implements hook_civicrm_pageRun().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_pageRun
 */
function membershiprenewbutton_civicrm_pageRun(&$page) {
  if (get_class($page) == 'CRM_Contact_Page_View_UserDashBoard'
  ) {

    $renewalLink = Civi::settings()->get('membershiprenewbutton_link');
    if (empty($renewalLink)) {
      return;
    }

    foreach (['activeMembers', 'inActiveMembers'] as $name) {
      $members = $page->get_template_vars($name);
      if (is_array($members) && !empty($members)) {
        foreach ($members as &$member) {
          unset($member['renewPageId']);
        }
      }
      $members = $page->assign($name, $members);
    }

    $buttonName = ts('Renew Now');
    $link = "<a href='{$renewalLink}'>[ {$buttonName} ]</a>";

    CRM_Core_Resources::singleton()->addScript(
      "CRM.$(function($) {
        var trClass = 'tr.crm-dashboard-civimember table tr';
        $(trClass).each(function(index, tr) {
          $(tr).find('td:last').html(\"$link\");
        });
      });"
    );
  }
}
