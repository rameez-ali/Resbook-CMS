<?php

$sqlExperienceCategories = "SELECT ec.`id`,
    ec.`name`,
    ec.`menu_label`,
    ec.`status`,
    ec.`rank`
  FROM `experience_category` ec
  LEFT JOIN `experience_has_category` ehc
    ON(ec.`id` = ehc.`experience_category_id`)
  WHERE `status` = '".FLAG_ACTIVE."'
    AND ehc.`experience_id` = '{$experienceId}'
    AND ec.`menu_label` != '' 
  ORDER BY `rank` ASC";

$experienceCategories = DB::fetchAll($sqlExperienceCategories);

if (!empty($experienceCategories)) {

  $categoryItem = '';

  foreach ($experienceCategories AS $category) {

    $categoryLabel = $category['menu_label'];
    $categoryItem .= '<li class="experience-category__item">'.$categoryLabel.'</li>';

  }

  if (!empty($categoryItem)) {

    $categoryList = '<ul class="experience-category__list">
      '.$categoryItem.'
    </ul>';

    $pageSubHeading  .= '<div class="experience-category">'.$categoryList.'</div>';

  }

}