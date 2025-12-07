<?php 

/**
 * NETZONE CMS Helper Class for Url.
 *
 * @package    NetZone Base CMS 3.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    1.0
 * @since      File available since Release 1.0
 */

class UrlValidation
{
  /**
	 * to get view for Meta Data
	 *
	 * @param mixed $arrSegments, Description - Url Segments of current request URL
	 * @param string $ignoreUrls, Description - Set of Url to ignore validation 
	 *
	 * @return string
	*/
	public static function validateUrl (mixed $arrSegments, $reservedUrls = [], $reservedSlugs = [])
	{		
    $pageInd = null;
    global $impPageHome, $impPage404, $impPageBlog;

    $output		  = [];
    $is404Page  = false;
    $pageIndex  = false;
    $hasBlog    = !empty($impPageBlog);

    $requestUri = '/'.implode('/', $arrSegments);

    if (!empty($arrSegments)) {

      $arrPossibleUrls  = [];
      $totalUriSegments = is_countable($arrSegments) ? count($arrSegments) : 0;
     
      for ($i = ($totalUriSegments -1); $i >= 0; $i--) {

        $possibleUrl = '';
  
        foreach ($arrSegments as $j => $uriSegment) {
          if ($j <= $i) {
            $possibleUrl .= '/'.$uriSegment;
          }
        }
  
        $arrPossibleUrls[] = $possibleUrl;
      }
     
      $sql = "SELECT gp.`id`,
          pmd.`url`,
          pmd.`full_url`,
          gp.`parent_id`,
          gp.`page_meta_data_id`
        FROM `general_pages` gp
        LEFT JOIN `page_meta_data` pmd
            ON(gp.`page_meta_data_id` = pmd.`id`)
        LEFT JOIN `page_meta_index` pmi
            ON(pmi.`id` = pmd.`page_meta_index_id`)
        WHERE pmd.`status` = '".FLAG_ACTIVE."' 
          AND pmd.`full_url` IN ('".implode("','", $arrPossibleUrls)."')
        ORDER BY FIELD(pmd.`full_url`, '".implode("','", $arrPossibleUrls)."') ";

      $resSql    = DB::runQuery($sql);
      $totalPages = mysqli_num_rows($resSql);

      if ($totalPages > 0) {

        $pageData = [];
        $pageIndex = false;

        while ($arrPage = mysqli_fetch_assoc($resSql)) {

          $fullUrl   = $arrPage['full_url'];
          $pageInd   = $arrPage['id'];
          $pageIndex = array_search($fullUrl, $arrPossibleUrls);

          if ($pageIndex !== false) {
              $pageData = $arrPage;
              $pageData['urlIndex'] = $pageIndex;
              break;
          }
         
        }
        
        if ($pageData !== []) {
          /** Get valid page url */
          $pageDataFullURL = $pageData['full_url'];
          $pageURI = '/'.preg_quote($pageDataFullURL, '/').'/';
          $pageURIRemaningSegments = ltrim(preg_replace($pageURI, '', $requestUri, 1) , '/');

          /** Get remaining url segments for validation */
          $arrRemaningSegments = (empty($pageURIRemaningSegments)) ? [] : explode('/' , $pageURIRemaningSegments);

          $remaningSegments = array_diff($arrRemaningSegments, $reservedSlugs);

          if ($arrRemaningSegments !== [] && in_array($pageDataFullURL, $reservedUrls)) {
            
            $segOption1 = $arrRemaningSegments[0] ?? null;
            $segOption2 = $arrRemaningSegments[1] ?? null;
            $segOption3 = $arrRemaningSegments[2] ?? null;
            
            /** CHECK IF BLOG HAS VALID REMAINING SEGMENTS */
            if (!empty($hasBlog) && $pageInd == $impPageBlog->id) {

              $blogCategorySlugs = self::getBlogCategorySlugs();
              $blogPostSlugs     = self::getBlogPostSlugs();
              $blogUserSlugs     = self::getUserSlugs();             
              
              if( $segOption1 === 'archive') {

                $blogYearSlugs     = self::getYearRange();
                $blogMonthSlugs    = self::getMonthRange();  
                
                $remaningSegments  = array_diff($remaningSegments, $blogYearSlugs, $blogMonthSlugs);
                
                /** 404 IF ARCHIVE HAS REMAINING SEGMENTS OR NO SEGMENTS FOUND*/
                if (empty($segOption2)) {
                    /** 404 IF ARCHIVE HAS INVALID SLUG FOR YEARLY ARCHIVE*/
                    $is404Page = true;
                } elseif (!empty($segOption2) && !in_array($segOption2, $blogYearSlugs)) {
                    /** 404 IF ARCHIVE HAS INVALID SLUG FOR YEARLY ARCHIVE*/
                    $is404Page = true;
                } elseif (!empty($segOption3) && !in_array($segOption3, $blogMonthSlugs)) {
                    /** 404 IF ARCHIVE HAS INVALID SLUG FOR MONTHLY ARCHIVE*/
                    $is404Page = true;
                } elseif($remaningSegments !== [] || count($arrRemaningSegments) > 3) {
                  /** 404 IF ARCHIVE HAS MORE REMAINING or INVALID SEGMENTS*/
                  $is404Page = true;
                }

              } elseif( $segOption1 === 'author') {

                /** 404 IF AUTHOR HAS REMAINING SEGMENTS OR AUTHOR SLUG IS NOT FOUND IN RESERVED SLUGS */
                $remaningSegments  = array_diff($remaningSegments, $blogUserSlugs);

                if(!in_array($segOption2, $blogUserSlugs) || count($arrRemaningSegments) > 2) {
                  $is404Page = true;
                } 

              } elseif( $segOption1 === 'category') {
               
                /** 404 IF CATEGORY HAS REMAINING SEGMENTS OR CATEGORY SLUG IS NOT FOUND IN RESERVED SLUGS */
                $remaningSegments  = array_diff($remaningSegments, $blogCategorySlugs);
               
                if(!in_array($segOption2, $blogCategorySlugs) || count($arrRemaningSegments) > 2) {
                  $is404Page = true;
                } 
               
              } elseif( $segOption1 === 'post') {
                
                /** 404 IF POST HAS REMAINING SEGMENTS OR POST SLUG IS NOT FOUND IN RESERVED SLUGS */
                $remaningSegments  = array_diff($remaningSegments, $blogPostSlugs);
               
                if(!in_array($segOption2, $blogPostSlugs) || count($arrRemaningSegments) > 2) {
                  $is404Page = true;
                }  
  
              }
            }
          } 
        
          if ($remaningSegments !== [] && empty($is404Page)) {
            
            $remaningSegmentsURI  = implode("','", $remaningSegments);

            $csvActivePageIds = DB::fetchValue("SELECT GROUP_CONCAT(DISTINCT(pmd.`id`))
              FROM `general_pages` gp
              LEFT JOIN `page_meta_data` pmd
                ON(gp.`page_meta_data_id` = pmd.`id`)
              WHERE pmd.`status` = '".FLAG_ACTIVE."'
              ORDER BY pmd.`rank` ");

            $sqlRemaningSegments = "SELECT COUNT(DISTINCT(pmd.`url`))
                FROM `page_meta_data` pmd
                WHERE `url` IN('".$remaningSegmentsURI."')
                  AND pmd.`id` NOT IN ({$csvActivePageIds})
                  AND pmd.`status` = '".FLAG_ACTIVE."'";

            $totalExtraPages = DB::fetchValue( $sqlRemaningSegments );

            if ($totalExtraPages < count($remaningSegments)) {
              $is404Page = true;  
            }
          }

        } else {          
          $is404Page = true;
        }

      } else {
        $is404Page = true;
      }        

    } elseif (empty($arrSegments) && !empty($_SERVER['REQUEST_URI'])) {

      
      /** @TODO HANDLE PAGE URLS AND 404's */
      $requestUri = trim(parse_url( (string) $_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
     
      if(empty( $requestUri )) {
        $pageInd = $impPageHome->id;
      } else {
        $is404Page = true;
      }
      
    }

    if ($is404Page) {
      $pageInd   = $impPage404->id;
      $output['pageInd']   = $pageInd;      
      $output['pageIndex']   = $pageIndex;
    }
    if (empty($is404Page)) {

      //$pageInd   = $impPage404->id;
      $output['pageInd']   = $pageInd;      
      $output['pageIndex']   = $pageIndex;
      
    }

    $output['isInvalidUrl'] = (empty($is404Page)) ? FLAG_NO : FLAG_YES;
    
    return $output;
  
  }

  /**
	 * to get range of year
	 *
	 * @return mixed
	*/
	public static function getYearRange ()
	{		
    $earliestYear = 2010; 
    $currentYear  = date('Y');

    return range( $currentYear, $earliestYear );
  }

  /**
	 * to get range of months
	 *
	 * @return mixed
	*/
	public static function getMonthRange()
	{		
    $output = [];

    foreach ( range( 1, 12) as $i ) {
      $output[] =  sprintf('%02d', $i);
    }

    return $output;
  }

  /**
	 * to get user as slug
	 *
	 * @return mixed
	*/
  public static function getUserSlugs()
	{		
    $output = [];

    $sql = "SELECT GROUP_CONCAT(DISTINCT(REPLACE(LOWER(TRIM(cu.`user_fname`)), ' ', '-'))) AS authorUrl
      FROM `cms_users` cu";

    $csvAuthors = DB::fetchValue($sql);

    if (!empty($csvAuthors)) {
      $output = explode(',',(string) $csvAuthors);
    }

    return $output;
  }

  /**
	 * to get blog category as slug
	 *
	 * @return mixed
	*/
  public static function getBlogCategorySlugs()
	{		
    $sql = "SELECT bc.`id` AS opKey, pmd.`url` AS opValue
        FROM `blog_category` bc
      LEFT JOIN `page_meta_data` pmd
        ON(pmd.`id` = bc.`page_meta_data_id`)
      WHERE pmd.`status` = '".FLAG_ACTIVE."'
        AND pmd.`menu_label` != ''
      ORDER BY pmd.`rank`";

    $arrSlugs = DB::fetchPairs($sql);

    return (empty($arrSlugs)) ? [] : $arrSlugs;
  }

  /**
	 * to get blog post as slug
	 *
	 * @return mixed
	*/
  public static function getBlogPostSlugs()
	{		
    $sql = "SELECT bp.`id` AS opKey, pmd.`url` AS opValue
        FROM `blog_post` bp
      LEFT JOIN `page_meta_data` pmd
        ON(pmd.`id` = bp.`page_meta_data_id`)
      WHERE pmd.`status` = '".FLAG_ACTIVE."'
      ORDER BY pmd.`rank`";

    $arrSlugs = DB::fetchPairs($sql);

    return (empty($arrSlugs)) ? [] : $arrSlugs;
  }

}