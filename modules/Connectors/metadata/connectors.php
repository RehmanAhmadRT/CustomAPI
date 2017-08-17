<?php
// created: 2017-08-16 11:30:50
$connectors = array (
  'ext_rest_twitter' => 
  array (
    'id' => 'ext_rest_twitter',
    'configured' => false,
    'name' => 'Twitter',
    'enabled' => true,
    'directory' => 'modules/Connectors/connectors/sources/ext/rest/twitter',
    'eapm' => 
    array (
      'enabled' => true,
    ),
    'modules' => 
    array (
      0 => 'Accounts',
      1 => 'Contacts',
      2 => 'Leads',
      3 => 'Prospects',
    ),
  ),
  'ext_eapm_google' => 
  array (
    'id' => 'ext_eapm_google',
    'configured' => false,
    'name' => 'Google',
    'enabled' => true,
    'directory' => 'modules/Connectors/connectors/sources/ext/eapm/google',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_gotomeeting' => 
  array (
    'id' => 'ext_eapm_gotomeeting',
    'configured' => false,
    'name' => 'GoToMeeting',
    'enabled' => true,
    'directory' => 'modules/Connectors/connectors/sources/ext/eapm/gotomeeting',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_ibmsmartcloud' => 
  array (
    'id' => 'ext_eapm_ibmsmartcloud',
    'configured' => false,
    'name' => 'IBM SmartCloud',
    'enabled' => true,
    'directory' => 'modules/Connectors/connectors/sources/ext/eapm/ibmsmartcloud',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_webex' => 
  array (
    'id' => 'ext_eapm_webex',
    'configured' => true,
    'name' => 'WebEx',
    'enabled' => true,
    'directory' => 'modules/Connectors/connectors/sources/ext/eapm/webex',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_lotuslive' => 
  array (
    'id' => 'ext_eapm_lotuslive',
    'configured' => false,
    'name' => 'LotusLive',
    'enabled' => true,
    'directory' => 'modules/Connectors/connectors/sources/ext/eapm/lotuslive',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_rest_dnb' => 
  array (
    'id' => 'ext_rest_dnb',
    'configured' => false,
    'name' => 'D&B',
    'enabled' => true,
    'directory' => 'modules/Connectors/connectors/sources/ext/rest/dnb',
    'eapm' => 
    array (
      'enabled' => true,
    ),
    'modules' => 
    array (
      0 => 'Accounts',
    ),
  ),
);