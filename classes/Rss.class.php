<?php

/**
 * NETZONE CMS class to generate RSS Feed
 *
 * @package    NetZone Base CMS 3.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    1.0
 * @since      File available since Release 1.0
 */

class Rss 
{
  /**
   * Generates the rss and stores in an XML file in the root.
   *
   */
  public static function generate(): bool {
    $rssFeedChannelData  = '';
    $rssPostData         = '';
    
    self::getChannelData();
    $pageData     = self::getBlogImpPageData();
   
    $pgTitle         = $pageData['title'];
    $pgDescription   = $pageData['meta_description'];
    $pgFullUrl       = Helper::getFullUrl($pageData['full_url']);
   
    if (!empty($pageData)) {

      /** Generate RSS channel content */
      $rssFeedChannelData ='<title>'.$pgTitle.'</title>
        <link>'.$pgFullUrl.'</link>
        <description>'.$pgDescription.'</description>';
      
      $rssFeedChannelData .= self::getChannelData();
      /** Get RSS item content */

      $rssPostData  = self::getRssItems( $pgFullUrl );
      /** Save RSS Feed */
      self::saveRSSFeed($rssFeedChannelData, $rssPostData);
    }   
    
    return true;
  }

  /**
   * Function to Rss Channel Data.
   * 
   * @return string
   */
  private static function getChannelData() {
    
    $output = '';

    $sql = "SELECT `company_name`,
        `start_year`,
        `email_address`,
        `phone_number`,
        `free_phone_number`,
        `address`
      FROM `general_settings`
      WHERE `id` = '1'
      LIMIT 1";

    $siteData = fetchRow($sql); 

    if (!empty($siteData)) {

      $gsCompanyName   = $siteData['company_name'];
      $gsStartYear     = $siteData['start_year'];
  
      /** Generate RSS channel content */
      $output .='<language>en-nz</language>
        <copyright>Copyright '.trim($gsStartYear.' '.$gsCompanyName).'</copyright>
        <lastBuildDate>'.date(DATE_RFC2822).'</lastBuildDate>
        <docs>http://blogs.law.harvard.edu/tech/rss</docs>
        <generator>Netzone CMS by Tomahawk</generator>';
    }

    return $output;
  }

  /**
   * Function to fetch blog Important Page Data.
   * 
   * @return mixed
   */
  public static function getBlogImpPageData() {
    
    $sql = "SELECT ms.`option_value` AS 'pg_id',
        ms.`module_key`,
        pmd.`url`,
        pmd.`full_url`,
        pmd.`name`,
        pmd.`menu_label`,
        pmd.`title`,
        pmd.`meta_description`
      FROM `module_settings` ms
      LEFT JOIN `general_pages` gp
        ON(ms.`option_value` = gp.`id`)
      LEFT JOIN `page_meta_data` pmd
        ON(gp.`page_meta_data_id` = pmd.`id`)
      WHERE `option_name` = 'imp_page'
        AND ms.`language_id` = '".LANGUAGE_ID."'
        AND pmd.`status` = '".FLAG_ACTIVE."'
        AND pmd.`url` != ''
        AND ms.`module_key` = 'Blog'"; 
    
    return fetchRow($sql);
  }

  /**
   * Function to fetch blog Important Page Data.
   * @param string $pgFullUrl, Description - Url of Blog Page
   * @return mixed
   */

  private static function getRssItems( $pgFullUrl = '') {
    
    $output = '';

    $sql = "SELECT bp.`id`,
        bp.`date_posted`,
        pmd.`heading`, 
        pmd.`url`, 
        pmd.`full_url`, 
        pmd.`title`, 
        pmd.`description`, 
        pmd.`short_description`,
        pmd.`photo_path`, 
        pmd.`thumb_photo_path`,
        pmd.`photo_alt_text`,
        IF(bp.`date_posted`, DATE_FORMAT(bp.`date_posted`, '%M %d, %Y'), '') AS postedOn,
        TRIM(CONCAT(cu.`user_fname`, ' ', cu.`user_lname`)) AS author_name,
        REPLACE(LOWER(TRIM(cu.`user_fname`)), ' ', '-') AS author_url,
        cu.`user_email` AS author_email
      FROM `blog_post` bp
      LEFT JOIN `page_meta_data` pmd
        ON(pmd.`id` = bp.`page_meta_data_id`)
      LEFT JOIN `cms_users` cu
        ON(cu.`user_id` = pmd.`updated_by`)
      WHERE pmd.`status` = '".FLAG_ACTIVE."'
        AND bp.`date_posted` is not null
      ORDER BY bp.`date_posted` DESC";

    $postData = DB::fetchAll($sql);

     /** Generate RSS items content */
    foreach ($postData AS $post) {
      $postTitle            = $post['heading'];
      $postUrl              = $post['url'];
      $postShortDescription = $post['short_description'];
      $postAuthorEmail      = $post['author_email'];
      $postPhotoPath        = Helper::getFullUrl($post['thumb_photo_path']);
      $postDate             = Helper::getDateTimeStr($post['date_posted'], DATE_RFC2822);
      
      $rssEnclosure = '';
      if (!empty($post['thumb_photo_path'])) {
        $photoDetails  = @getimagesize(BASE_PATH.$post['thumb_photo_path']);
        $photoLength   = @filesize(BASE_PATH.$post['thumb_photo_path']);
        $photoType     = $photoDetails['mime'];
        
        $rssEnclosure = '<enclosure length="'.$photoLength.'" type="'.$photoType.'" url="'.$postPhotoPath.'"/>';
        $rssDescription = '<description><![CDATA[<img align="left" width="150" height="100" src="'.$postPhotoPath
          .'" />'.$postShortDescription.'<br clear="all">]]></description>';
      } else {
        
        $rssDescription = '<description>'.$postShortDescription.'</description>';
      }
      
      $output .= '<item>
            <title>'.$postTitle.'</title>
            <link>'.$pgFullUrl.'/post/'.$postUrl.'</link>
            '.$rssDescription.'
            <guid isPermaLink="false">'.$postUrl.'</guid>
            <author>'.$postAuthorEmail.'</author>
            <pubDate>'.$postDate.'</pubDate>
            '.$rssEnclosure.'          
          </item>';
    }   
    return $output;
  }

  /**
  * Function to Rss Channel Data.
  * 
  * @return mixed
  */
  private static function saveRSSFeed($channel = '', $items = ''): bool {
    
    $rssFeed = '<?xml version="1.0" encoding="UTF-8" ?>
      <rss version="2.0">
        <channel>
          '.$channel.'
          '.$items.'
        </channel>
      </rss>';

    $rssFeedFile = fopen(BASE_PATH.'/rss.xml', 'w');
    fwrite($rssFeedFile, $rssFeed);
    fclose($rssFeedFile);

    return true;
  }
}