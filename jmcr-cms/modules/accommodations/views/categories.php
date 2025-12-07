<?php
/** View for blog categories Tab */

$tabAccommodationCategoriesContent = '';
$categoryView             = '';


$arrCategories = DB::fetchPairs("SELECT ac.`id` AS opKey, 
    pmd.`name` AS opValue
  FROM `accommodation_category` ac
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = ac.`page_meta_data_id`)
  WHERE pmd.`status` != '".FLAG_DELETED."'
  ORDER BY pmd.`name`");

if (!empty($arrCategories)) {
  
  $attCategories = fetchValue("SELECT GROUP_CONCAT(`accommodation_category_id`)
    FROM `accommodation_has_category`
    WHERE `accommodation_id` = '{$itemId}'");

  $categoryView = FormHelper::createCheckboxGroupOptions($arrCategories, 'accommodation_category_id[]', $attCategories);
  
  $tabAccommodationCategoriesContent = '<p>
      <strong>Choose categories to display on page</strong>
    </p>
    <ul class="selection-box padded">
      '.$categoryView.'
    </ul>';
}

?>