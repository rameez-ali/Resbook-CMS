<?php
/** Identify module for Settings */
$modName     = 'FAQ';

$faqSettings = ModuleSettings::fetchSettings($modName);

if (!empty($faqSettings)) {

  /** define vars */
  $fsType            = $faqSettings['type'];
  $fsIconExpand      = $faqSettings['icon_expand'];
  $fsIconCollapse    = $faqSettings['icon_collapse'];
  $fsDefaultState    = $faqSettings['default_state'];    
  $fsImpPageId       = $faqSettings['imp_page'];

  $impPageFaqs       = DBHelper::fetchImpPageData($fsImpPageId);
}

?>