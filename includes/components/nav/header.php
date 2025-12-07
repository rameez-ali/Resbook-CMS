<!-- Add the JavaScript code within script tags -->

<?php
$menuUrl = ''; $openNewTab = '';
$currentPage   = $page;
function getPages($parentId = null) {

  $navPagesSql = "SELECT gp.`id`,
      gp.`parent_id`,
      pmd.`menu_label`,
      pmd.`url`,
      pmd.`full_url`,
      pmd.`external_url`,
      pmd.`title`,
      (SELECT GROUP_CONCAT(`mod_id`)
       FROM `module_pages`
       WHERE `page_id` = gp.`id`) AS page_mods
    FROM `general_pages` gp
    LEFT JOIN `page_meta_data` pmd
      ON(gp.`page_meta_data_id` = pmd.`id`)
    WHERE pmd.`menu_label` IS NOT NULL
      AND pmd.`status` = '".FLAG_ACTIVE."'
      AND gp.`parent_id` ".((is_null($parentId)) ? " IS NULL" : " = {$parentId}")."
    ORDER BY pmd.`rank` ";

  return fetchAll($navPagesSql);

}

$navigationView = '';

/** Identify module for Settings */
$accSettings = ModuleSettings::fetchSettings('Accommodation');

if (!empty($accSettings)) {

  /** define vars */
 $accImpPageId   = $accSettings['imp_page'];
 $accMenuDisp    = $accSettings['menu_display'];
 $accArr     = DBHelper::fetchImpPageData($accImpPageId);
}

$arrPages = getPages();

if (!empty($arrPages)) {

  foreach ($arrPages as $menuPage) {

    $menuPageId       = $menuPage['id'];
    $menuParentPageId = $menuPage['parent_id'];
    $menuItemCls      = ($menuPage['url'] === $currentPage) ? 'primary-navigation__item--active': '';
    $menuItemLabel    = $menuPage['menu_label'];
    $menuItemTitle    = $menuPage['title'];
    $menuItemUrl      = $menuPage['full_url'];
    $menuItemExternalUrl      = $menuPage['external_url'];

    $arrPageModules = explode(',', (string) $menuPage['page_mods']);    

    $menuItemUrl      = Helper::getFullUrl($menuItemUrl);
    
    $arrChildPages = getPages( $menuPageId );

    $subNavigation = '';
     
  if(!empty($accImpPageId)) {

   if ($menuPageId == $accImpPageId) { // Get subnav for tour list

     $listCls = 'sub-navigation--acc';

     $accPageSql = "SELECT a.`id`,
         pmd.`url`,
         pmd.`title`,
         pmd.`full_url`,
         pmd.`menu_label`
       FROM `accommodation` a
       LEFT JOIN `page_meta_data` pmd
       ON a.`page_meta_data_id` = pmd.`id`
       WHERE pmd.`menu_label` IS NOT NULL
         AND pmd.`status` = '".FLAG_ACTIVE."'
       ORDER BY pmd.`rank` ";

     $arrAccCatePages = fetchAll($accPageSql);
     
     foreach ($arrAccCatePages as $accPage) {

       $childItemCls      = ($accPage['url'] === $currentPage) ? 'sub-navigation__item--active': '';
       $childItemLabel    = $accPage['menu_label'];
       $childItemTitle    = $accPage['title'];
       $childItemUrl      = $accPage['full_url'];
       $childItemUrl      = Helper::getFullUrl($accArr->full_url.$childItemUrl);

       $subNavigation .= '<li class="sub-navigation__item '.$childItemCls.'">
           <a href="'.$childItemUrl.'"
            data-category="Navigation" data-action="Header Link" data-name="'.$childItemLabel.'">
             '.$childItemLabel.'</a>
         </li>';

     }
   }
  }

   
   /** Identify  Experience module for Settings */
   $expSettings = ModuleSettings::fetchSettings('Experience');

   if (!empty($expSettings)) {

     /** define vars */
    $expImpPageId   = $expSettings['imp_page'];
    $expArr     = DBHelper::fetchImpPageData($expImpPageId);

   }

  if ($menuPageId == $expImpPageId) { // Get subnav for tour list

    $listCls = 'sub-navigation--exp';

    $expPageSql = "SELECT e.`id`,
        pmd.`url`,
        pmd.`title`,
        pmd.`full_url`,
        pmd.`menu_label`
      FROM `experience` e
      LEFT JOIN `page_meta_data` pmd
      ON e.`page_meta_data_id` = pmd.`id`
      WHERE pmd.`menu_label` IS NOT NULL
        AND pmd.`status` = '".FLAG_ACTIVE."'
      ORDER BY pmd.`rank` ";

    $arrExpCatePages = fetchAll($expPageSql);
    
    foreach ($arrExpCatePages as $expPage) {

      $childItemCls      = ($expPage['url'] === $currentPage) ? 'sub-navigation__item--active': '';
      $childItemLabel    = $expPage['menu_label'];
      $childItemTitle    = $expPage['title'];
      $childItemUrl      = $expPage['full_url'];
      $childItemUrl      = Helper::getFullUrl($expArr->full_url.$childItemUrl);

      $subNavigation .= '<li class="sub-navigation__item '.$childItemCls.'">
          <a href="'.$childItemUrl.'"
           data-category="Navigation" data-action="Header Link" data-name="'.$childItemLabel.'">
            '.$childItemLabel.'</a>
        </li>';

    }
  }

    if(!empty($arrChildPages)) {

      foreach ($arrChildPages as $childPage) {

        $childPageId      = $childPage['id'];
        $childItemCls      = ($childPage['url'] === $currentPage) ? 'sub-navigation__item--active': '';
        $childItemLabel    = $childPage['menu_label'];
        $childItemTitle    = $childPage['title'];
        $childItemUrl      = $childPage['full_url'];

        $childItemUrl      = Helper::getFullUrl($childItemUrl);
        $childItemExternalUrl      = $childPage['external_url'];

        $subNavigation .= '<li class="sub-navigation__item '.$childItemCls.'">
            <a href="'.$childItemUrl.'"
             data-category="Navigation" data-action="Header Link" data-name="'.$childItemLabel.'">
              '.$childItemLabel.'</a>
          </li>';

      }
    }
    
    $subNavigationTriggerIcon = '<div class="sub-nav-trigger">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="14.25" viewBox="0 0 25 14.25" opacity="0.5"><path id="arrow_forward_ios_FILL0_wght400_GRAD0_opsz48" d="M249.75,199,248,197.219,258.719,186.5,248,175.781,249.75,174l12.5,12.5Z" transform="translate(199 -248) rotate(90)" fill="#404040"/></svg>
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="14.25" viewBox="0 0 25 14.25" opacity="0.5"><path id="arrow_forward_ios_FILL0_wght400_GRAD0_opsz48" d="M260.5,199l1.75-1.781L251.531,186.5l10.719-10.719L260.5,174,248,186.5Z" transform="translate(199 -248) rotate(90)" fill="#404040"/></svg>
    </div>';
    if(empty($listCls)){
      $listCls='';      
    } else {
      $listCls = $listCls;
    }
    $subNavigationView = (empty($subNavigation)) 
      ? '' 
      : $subNavigationTriggerIcon.'<ul class="sub-navigation '.$listCls.'">'.$subNavigation.'</ul>';

      if(!empty($menuItemExternalUrl)){
        if(strpos($menuItemExternalUrl, "http://") === 0 || strpos($menuItemExternalUrl, "https://") === 0){
          $menuUrl = $menuItemExternalUrl;  
          $openNewTab = 'target="_blank" rel=external ';
        }elseif(strpos($menuItemExternalUrl, "/") === 0){
          $menuUrl = $menuItemExternalUrl;  
          $openNewTab = '';
        }
        else {
          $menuUrl = 'https://'.$menuItemExternalUrl;
          $openNewTab = 'target="_blank" rel=external ';
        }                
      } else {
        $menuUrl = $menuItemUrl;
        $openNewTab = '';
      }

    $navigationView .= '<li class="primary-navigation__item '.$menuItemCls.'">
        <a href="'.$menuUrl.'" '.$openNewTab.' data-category="Navigation" data-action="Header Link" data-name="'.$menuItemLabel.'">'
          .$menuItemLabel.'</a>
          '.$subNavigationView.'
      </li>';
  }    
}

$templateTags['header_nav'] = (empty($navigationView)) 
                              ? '' 
                              : '<ul class="primary-navigation">'.$navigationView.'</ul>'.$bookBtnMobileNavigation;

?>

