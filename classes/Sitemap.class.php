<?php

/**
 * Sitemap Class to generate the sitemap for the website.
 * 
 * @author Ameya Aklekar <ameya@tomahawk.co.nz>
 * 
 */
class Sitemap 
{
  /**
   * Generates the site map and stores in an XML file in the root.
   * Also updates the robots file, if exist or creates a new robots file.
   * 
   * @return string
   */
  public static function generate() {

    global $sitemapGenerations, $pages;
    
    $sitemapGenerations = 10;   
    $sitemapContent     = '';
    $sitemapStatus      = '';
 
    $self               = new self();
    $pages              = $self->getPages($pages);

    foreach($pages as $key => $pageArr) {

      foreach($pageArr as $page) {

        $pageUrl = Helper::getFullUrl($page['full_url']);

        $updatedOn = new DateTime($page['updated_on']);
        $updatedOn = $updatedOn->format('Y-m-d');
        $priority = $key/10;

        $sitemapContent .= '<url>
              <loc>'.$pageUrl.'</loc>
              <lastmod>'.$updatedOn.'</lastmod>
              <changefreq>daily</changefreq>
              <priority>'.$priority.'</priority>
            </url>';
      }

    }

    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>
      <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        '.$sitemapContent.'
      </urlset>';

    
    $xmlFile = fopen(BASE_PATH.'/sitemap.xml', 'w');
    $fileWritten = fwrite($xmlFile, $sitemap);
    fclose($xmlFile);

    /**
     * Update Robots File
     */
    $self->updateRobotsFile();

    /**
     * Sending XML to Google
     */

    file_get_contents("http://www.google.com/webmasters/tools/ping?sitemap=".BASE_URL."/sitemap.xml");
    
    
    if($fileWritten) {

      $arrSettings = [];

      $arrSettings['set_sitemapupdated'] = date('Y-m-d H:i:s');

      updateRow($arrSettings , 'general_settings', "WHERE `id` = '1'");

      $sitemapStatus = true; 
     
    } else {

      $sitemapStatus = false;

    }

    return $sitemapStatus;

  }

  /**
   * Function to create/update the robots file everytime the Sitemap is generated.
   */
  public function updateRobotsFile(){

    $robotsFilePath    = BASE_PATH.'/robots.txt';
    $robotsFilesizeLength = filesize($robotsFilePath);
    $robotsFile        = fopen($robotsFilePath, 'w');
    
    $robotsFileContent = @fread($robotsFile, $robotsFilesizeLength);
    
    $robotsFileContent .= 'Sitemap: '.BASE_URL.'/sitemap.xml';

    fwrite($robotsFile,$robotsFileContent);
    fclose($robotsFile);

  }

  /**
   * Recursive function to fetch all the pages and the child pages.
   * 
   * @param array $activePages
   * @param int $parentPageId
   * 
   * @return array
   */
  public function getPages($activePages,$parentPageId = null) {

    global $sitemapGenerations;

    $exParentId = ((empty($parentPageId)) ? " IS NULL" : " = '{$parentPageId}'");

    $pages = runQuery("SELECT gp.`id`,
        gp.`parent_id`,
        pmd.`full_url`,
        pmd.`date_updated`AS updated_on
      FROM `general_pages` gp
      LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
      WHERE pmd.`url` != ''
        AND pmd.`status` = '".FLAG_ACTIVE."'
        AND pmd.`page_meta_index_id` IN (1,3)
        AND gp.`parent_id`".$exParentId."
      ORDER BY pmd.`rank`");

    --$sitemapGenerations;
    
    while($page = mysqli_fetch_assoc($pages)) {

      $pageId          = $page['id'];      
      
      $activePages[$sitemapGenerations][] = $page;
      
      /** 
       * Get all of the children of this page.
       */
      $activePages = $this->getPages($activePages,$pageId);

    }

    ++$sitemapGenerations;
    
    return $activePages;
  }

}
