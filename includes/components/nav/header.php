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
      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
<path d="M13.2528 5.81542C13.187 5.74903 13.1086 5.69633 13.0223 5.66037C12.936 5.62441 12.8434 5.6059 12.7499 5.6059C12.6564 5.6059 12.5638 5.62441 12.4775 5.66037C12.3912 5.69633 12.3128 5.74903 12.247 5.81542L9.00283 9.05958C8.93698 9.12597 8.85864 9.17867 8.77232 9.21463C8.686 9.25059 8.59342 9.2691 8.49991 9.2691C8.4064 9.2691 8.31382 9.25059 8.2275 9.21463C8.14119 9.17867 8.06284 9.12597 7.99699 9.05958L4.75283 5.81542C4.68698 5.74903 4.60864 5.69633 4.52232 5.66037C4.436 5.62441 4.34342 5.6059 4.24991 5.6059C4.1564 5.6059 4.06382 5.62441 3.9775 5.66037C3.89118 5.69633 3.81284 5.74903 3.74699 5.81542C3.61507 5.94813 3.54102 6.12766 3.54102 6.31479C3.54102 6.50192 3.61507 6.68145 3.74699 6.81417L6.99824 10.0654C7.39668 10.4634 7.93678 10.6869 8.49991 10.6869C9.06304 10.6869 9.60314 10.4634 10.0016 10.0654L13.2528 6.81417C13.3848 6.68145 13.4588 6.50192 13.4588 6.31479C13.4588 6.12766 13.3848 5.94813 13.2528 5.81542Z" fill="#79808C"/>
</svg>
      <svg style="rotate: 180deg;" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
<path d="M13.2528 5.81542C13.187 5.74903 13.1086 5.69633 13.0223 5.66037C12.936 5.62441 12.8434 5.6059 12.7499 5.6059C12.6564 5.6059 12.5638 5.62441 12.4775 5.66037C12.3912 5.69633 12.3128 5.74903 12.247 5.81542L9.00283 9.05958C8.93698 9.12597 8.85864 9.17867 8.77232 9.21463C8.686 9.25059 8.59342 9.2691 8.49991 9.2691C8.4064 9.2691 8.31382 9.25059 8.2275 9.21463C8.14119 9.17867 8.06284 9.12597 7.99699 9.05958L4.75283 5.81542C4.68698 5.74903 4.60864 5.69633 4.52232 5.66037C4.436 5.62441 4.34342 5.6059 4.24991 5.6059C4.1564 5.6059 4.06382 5.62441 3.9775 5.66037C3.89118 5.69633 3.81284 5.74903 3.74699 5.81542C3.61507 5.94813 3.54102 6.12766 3.54102 6.31479C3.54102 6.50192 3.61507 6.68145 3.74699 6.81417L6.99824 10.0654C7.39668 10.4634 7.93678 10.6869 8.49991 10.6869C9.06304 10.6869 9.60314 10.4634 10.0016 10.0654L13.2528 6.81417C13.3848 6.68145 13.4588 6.50192 13.4588 6.31479C13.4588 6.12766 13.3848 5.94813 13.2528 5.81542Z" fill="#79808C"/>
</svg>
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

