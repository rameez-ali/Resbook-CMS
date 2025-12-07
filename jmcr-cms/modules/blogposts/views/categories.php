<?php
/** View for blog categories Tab */

$tabBlogCategoriesContent = '';
$categoryView             = '';


$arrCategories = DB::fetchPairs("SELECT bc.`id` AS opKey, 
    pmd.`name` AS opValue
  FROM `blog_category` bc
  LEFT JOIN `page_meta_data` pmd
    ON(pmd.`id` = bc.`page_meta_data_id`)
  WHERE pmd.`status` != '".FLAG_DELETED."'
  ORDER BY pmd.`name`");

if (!empty($arrCategories)) {
  
  $attCategories = fetchValue("SELECT GROUP_CONCAT(`category_id`)
    FROM `blog_post_has_category`
    WHERE `post_id` = '{$itemId}'");

  $categoryView = FormHelper::createCheckboxGroupOptions($arrCategories, 'category_id[]', $attCategories);
  
  $tabBlogCategoriesContent = '<p>
      <strong>Choose categories to display on page</strong>
    </p>
    <ul class="selection-box padded">
      '.$categoryView.'
    </ul>';
}

?>