<?php

/** Modules tab content */

$sqlModules = "SELECT m.`mod_id`, 
  m.`mod_name`,
  (SELECT `modpages_rank` 
    FROM `module_pages`
    WHERE `page_id` = '{$id}' 
      AND `mod_id` = m.`mod_id` 
    LIMIT 1
  ) AS mod_rank
  FROM `modules` m
  WHERE mod_showincms = '" . FLAG_YES . "'
  ORDER BY m.`mod_name`";

$result = runQuery($sqlModules);

$modules = "";

while ($row = mysqli_fetch_assoc($result)) {

  $modId = $row['mod_id'];
  $modName = $row['mod_name'];
  $modPageRank = $row['mod_rank'];

  $isSelected = ($modPageRank != "") ? ' checked="checked"' : '';

  $modules .= '<div class="md-row">
      <input type="hidden" name="mod_id[]" value="' . $modId . '" ' . $isSelected . '>
      <label>
        <input type="text" name="mp_rank[]" 
         class="input-text" style="width:35px;" 
         value="' . $modPageRank . '">&nbsp;' . $modName . '
      </label>
    </div>';

}

$tabModulesContent = '<p>
    <strong>
      Select the modules you would like included on this page by entering 
      a rank number for each (Leave those you don\'t want)
    </strong>
  </p>';

$tabModulesContent .= $modules;

$resRankRow = DB::fetchRow("
  SELECT pmd.`reservation_banner_rank`, pmd.`video_rank`, pmd.`faqs_rank`
  FROM `general_pages` gp
  LEFT JOIN `page_meta_data` pmd ON (gp.`page_meta_data_id` = pmd.`id`)
  WHERE gp.`id` = '{$id}'
  LIMIT 1
");
$reservationBannerRank = (int) ($resRankRow['reservation_banner_rank'] ?? 0);
$videoRank = (int) ($resRankRow['video_rank'] ?? 0);
$faqsRank = (int) ($resRankRow['faqs_rank'] ?? 0);

$tabModulesContent .= '
  <div class="md-row md-row--virtual">
    <label>
      <input type="text" name="reservation_module_rank"
        class="input-text" style="width:35px;" 
        value="' . $reservationBannerRank . '">&nbsp;Reservation Banner
    </label>
  </div>';

$tabModulesContent .= '
  <div class="md-row md-row--virtual">
    <label>
      <input type="text" name="video_module_rank"
        class="input-text" style="width:35px;" 
        value="' . $videoRank . '">&nbsp;Video Section
    </label>
  </div>';

$tabModulesContent .= '
  <div class="md-row md-row--virtual">
    <label>
      <input type="text" name="faqs_module_rank"
        class="input-text" style="width:35px;" 
        value="' . $faqsRank . '">&nbsp;FAQs Section
    </label>
  </div>';

?>