<?php

/**
 * NETZONE CMS Class perform Database Operations.
 *
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 2.0
 */
class DBHelper
{

  /**
  * fetch data for pages set as important page
  * @param  int  $pageId
  * @return mixed
  */
  public static function fetchImpPageData($pageId = null) 
  {
    $impPages = [];
    $sql = "SELECT gp.`id` AS pg_id,
        pmd.`url`, 
        pmd.`full_url`,
        pmd.`name` AS menu_name, 
        pmd.`menu_label`,
        pmd.`footer_menu`,  
        pmd.`title`
      FROM `general_pages` gp
      LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
      WHERE gp.`id` = '{$pageId}'
        AND pmd.`status` = '".FLAG_ACTIVE."'
        AND pmd.`url` != ''
      LIMIT 1";  
      
    $resultQuery = DB::runQuery($sql);

    while ($array = mysqli_fetch_assoc($resultQuery)) {

      $impPages = (object) ['menu_label'        => ($array['menu_label'] ?: $array['menu_name']), 'footer_menu_label' => ($array['footer_menu'] ?: $array['menu_name']), 'url'               => $array['url'], 'full_url'          => $array['full_url'], 'abs_full_url'      => Helper::getFullUrl( $array['full_url']), 'id'                => $array['pg_id'], 'title'             => $array['title']];
    }

    return $impPages;
  }

  /**
  * fetch data for pages set as important page from module settings table
  * @param  string  $targetModuleTable
  * @return mixed
  */
  public static function fetchModuleImpPageData($targetModuleTable = null) 
  {
    if (!empty($targetModuleTable)) {

      $sql = "SELECT `option_value` 
        FROM `".$targetModuleTable."` 
        WHERE `option_name` = 'imp_page' 
        LIMIT 1";

      $impPageId = DB::fetchValue($sql);

      if (!empty($impPageId)) {

        $impPageData = self::fetchImpPageData($impPageId);

        if (!empty($impPageData )) {
          
          return $impPageData;

        } 
      }      
    }
    return false;
  }

  /**
  * Creates options for important Pages
  * @param  string  $sql
  * @return string
  */
  public static function createImpPageList($parentId = null, $selectedPageId = null) 
  {
    global $step;

    $output  = '';
    $hellip  = '';
    $step++;
	
    $sql = "SELECT gp.`id`, 
        pmd.`name`, 
        gp.`parent_id`
      FROM `general_pages` gp
      LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
      WHERE pmd.`status` != '".FLAG_DELETED."'
      AND gp.`parent_id`".((empty($parentId)) ? " IS NULL" : " = '{$parentId}'")."
      ORDER BY pmd.`rank`";
    
    $pages  = fetchAll($sql);

    if ((is_countable($pages) ? count($pages) : 0) > 0) {

      for ($i=1; $i < $step; $i++) { 
        
        $hellip .= '&hellip;&hellip;'; 
      
      }
      
      foreach ($pages as $page) {

        $pageId = $page['id'];
        
        $optionLabel      = $hellip.($page['name'] ?: 'Untitled '.$pageId);
        $isOptionSelected = ($pageId == $selectedPageId) ? ' selected="selected"' : '';
        
        $output .= '<option value="'.$pageId.'"'.$isOptionSelected.'>';
				$output .= $optionLabel;
				$output .= '</option>';
        $output .= self::createImpPageList($pageId, $selectedPageId);
      }
    }
    
    $step--;

    return $output;
  }

  /**
	 * Generates and Returns the full url for the page 
	 *
	 * @param string $pageId, Description - int of Page Id
	 * @param string $reset, Description - bool
	 *
	 * @return string
	*/
	public static function buildPageUrl($pageId, $reset = false) {

    static $urls = [];
    static $count = 0;

    if ($pageId !== '' && $pageId !== '0') {

      $gpSql = "SELECT gp.`parent_id`, 
          pmd.`url`
        FROM `general_pages` gp
        LEFT JOIN `page_meta_data` pmd
          ON(pmd.`id` = gp.`page_meta_data_id`)
        WHERE gp.`id` ".((is_null($pageId)) ? " IS NULL" : " = {$pageId}")."
        LIMIT 1";

      $gpData = fetchRow($gpSql);
      
      if ($gpData) {

        $pgUrl = (in_array($gpData['url'], ['/', 'home'])) ? '' : $gpData['url'];

        array_unshift($urls, $pgUrl);

        $parentId = $gpData['parent_id'];

        if (!is_null($parentId)) {
          self::buildPageUrl($parentId);

        }
      }
    }

    $csv = implode('/', $urls);

    if ($reset == true) {

      $urls = [];

    }

    return $csv;
  }
  
}