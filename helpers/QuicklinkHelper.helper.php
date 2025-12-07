<?php

/**
 * NETZONE CMS Class for Quicklink elements.
 *
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 2.0
 */

class QuicklinkHelper
{

    /**
 	* @var mixed - Type of quicklinks
 	*/
  //static $defaultStyle 		= array("C" => "Carousel Style", "F" => "Fullscreen Style");

  /**
	 * to get view for Quicklinks Tab
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function getQuickLinksData($itemKey, int $itemId = null, $moduleLabel)
	{
    $output		= '';

    if(!empty($itemKey)) {

      $moduleLabel             = strtolower($moduleLabel);

      $output		.= self::fetchQuickSectionContent($itemKey, $itemId);
      $output		.= self::fetchQuickLinkStyle($itemKey, $itemId, $moduleLabel);
      $output		.= self::fetchQuickLinkList($itemKey, $itemId, $moduleLabel);

    }

    return $output;
  }

  /**
	 * to get list options for Quicklinks
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function fetchQuickSectionContent($itemKey, $itemId = null)
	{
		$output		= '';

		if(!empty($itemKey)) {

			$sql = "SELECT `heading`,
          `description`
				FROM `page_quicklink_section`
				WHERE `item_key` = '".$itemKey."'
					AND `item_id` = '".$itemId."'
				LIMIT 1";

      $qlSectionContent = DB::fetchRow($sql);

      $itemQlSectionHeading     =  $qlSectionContent['heading'];
      $itemQlSectionDescription =  $qlSectionContent['description'];

      $output = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td colspan="2">
                <h2 class="form-section-heading">Quicklinks Introduction</h2>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <strong>
                  You can add an introduction heading and description that will be displayed above the quicklinks.
                  </strong>
              </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
              <td width="160">
                <label for="quicklink_section_heading">Heading:</label>
              </td>
              <td>
                <input type="text" name="quicklink[heading]" id="quicklink_section_heading"
                value="'.$itemQlSectionHeading.'" style="width:550px;" />
              </td>
            </tr>
            <tr>
              <td valign="top">
                <label for="quicklink_section_Description">Description:</label>
              </td>
              <td>
                <textarea name="quicklink[description]" id="quicklink_section_Description"
                style="width:550px;height:80px;resize: none;"
                maxlength="250" class="check-max">'.$itemQlSectionDescription.'</textarea>
                <br><span class="text-muted"><small>Max 250 characters (including spaces) <em></em></small></span>
              </td>
            </tr>
        </table>';

		}

		return $output;

	}

	/**
	 * to get list options for Quicklinks
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function fetchQuickLinkStyle($itemKey, int $itemId = null, $moduleLabel)
	{
		$output		= ''; $qlStyleOptions   = '';

		if(!empty($itemKey)) {

      /** GET DEFAULT QUICKLINK STYLE */
      $sqlQuickLinkDefaultStyles = "SELECT `id`
        FROM `quicklink_style`
        WHERE `status` = '".FLAG_ACTIVE."'
          AND `is_default` = '".FLAG_YES."'
        LIMIT 1";

      $qlDefaultStyleId = DB::fetchValue($sqlQuickLinkDefaultStyles);

      /** GET SELECTED QUICKLINK STYLE */
      $sql = "SELECT `quicklink_style_id`
				FROM `page_quicklink_section`
				WHERE `item_key` = '".$itemKey."'
					AND `item_id` = '".$itemId."'
				LIMIT 1";

      $qlSelectedStyleId = DB::fetchValue($sql);

      /** SET QUICKLINK STYLE */
      $qlSelectedStyleId = (!empty( $qlSelectedStyleId )) ?  $qlSelectedStyleId : $qlDefaultStyleId;

      $sqlQuickLinkStyles = "SELECT `id`,
          `title`,
          `thumb_path`
        FROM `quicklink_style`
				WHERE `status` = '".FLAG_ACTIVE."'
        ORDER BY `rank`,`title`";

      $arrQuickLinkStyles = DB::fetchAll($sqlQuickLinkStyles);

			if(!empty($arrQuickLinkStyles)) {

				foreach ($arrQuickLinkStyles AS $quickLinkStyle) {

            $qlStyleId          = $quickLinkStyle['id'];
            $qlStyleLabel       = $quickLinkStyle['title'];
            $qlStyleImagePath   = $quickLinkStyle['thumb_path'];
            $smallLabel         = '';
            if($qlStyleLabel == 'Default') {
              $smallLabel = 'Recommended Image size: 450px x 550px';
            }elseif ($qlStyleLabel == 'Tile') {
              $smallLabel = 'Recommended Image size: 420px x 250px';
            }elseif ($qlStyleLabel == 'Icon') {
              $smallLabel = 'Recommended Image size: 64px x 64px';
            }elseif($qlStyleLabel == 'Cover') {
              $smallLabel = 'Recommended Image size: 700px x 450px';
            }

						$isChecked      = ($qlStyleId === $qlSelectedStyleId) ? ' checked="checked"' : '';

						$qlStyleOptions .= '<li class="itemsel itemsel--alt">
								<label class="checkbox-inline sel">
										<input class="do-sel" type="radio" name="quicklink[style]" value="'.$qlStyleId.'"'.$isChecked.'>
										'.$qlStyleLabel.'
								</label>
								<img src="'.ADMIN_BASE_URL.'/'.$qlStyleImagePath.'" style="padding:10px 0px;max-width:210px;"/>
                <small>'.$smallLabel.'</small>
						</li>';

        }

        $output = '<hr class="content-hr">
          <h2 class="form-section-heading">Choose Quicklink Style</h2>
          <p><strong>Choose the style of quicklinks you want to display on your '.$moduleLabel.'.</strong></p>
          <ul class="selection-box padded">'.$qlStyleOptions.'</ul>';

			}
		}

		return $output;

  }

  /**
	 * to get list options for Quicklinks
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function fetchQuickLinkList($itemKey, int $itemId = null, $moduleLabel)
	{
		$output		= '';

		if(!empty($itemKey)) {

		 $sqlQuickLinks = "SELECT `id`,
          `name`,
          `heading`
        FROM quicklinks
				WHERE `status` != '".FLAG_DELETED."'
        ORDER BY `rank`,`name`";

      $arrQuicklinks = DB::fetchAll($sqlQuickLinks);

      if (!empty($arrQuicklinks)) {

        $csvSelectedQuicklinks = DB::fetchValue("SELECT GROUP_CONCAT(`quicklink_id`)
          FROM `page_has_quicklinks`
          WHERE `item_key` = '".$itemKey."'
            AND `item_id` = '".$itemId."'");

        $sqlSelectedQuicklinksRank = "SELECT `quicklink_id` AS opKey,
            `rank` AS opValue
            FROM `page_has_quicklinks`
            WHERE `item_key` = '".$itemKey."'
              AND `item_id` = '".$itemId."'";

        $arrSelectedQuicklinkRank = DB::fetchPairs($sqlSelectedQuicklinksRank);

        $arrSelectedQuicklinks = (!empty($csvSelectedQuicklinks)) ? explode(',', $csvSelectedQuicklinks) : array();

        foreach ($arrQuicklinks as $quicklink) {

          $quicklinkId  = $quicklink['id'];
          $qlLabel      = $quicklink['name'];
          $qlIsChecked  = (in_array($quicklinkId, $arrSelectedQuicklinks)) ? ' checked="checked"' : '';
          $qlRank       = ($qlIsChecked) ? $arrSelectedQuicklinkRank[$quicklinkId] : '';

          $output .= '<li class="itemsel sel-rank">
            <input type="number" class="input-xxs rank" min="1" name="item_quicklink_rank['.$quicklinkId.']"
              value="'.$qlRank.'" placeholder="Rank" >
            <label class="checkbox-inline sel">
              <input'.$qlIsChecked.' type="checkbox" class="do-sel"
                value="'.$quicklinkId.'" name="item_quicklink_id[]">
                <span>'.$qlLabel.'</span>
            </label>
          </li>';

        }

        $output = '<hr class="content-hr">
          <h2 class="form-section-heading">Choose Quicklinks</h2>
          <p><strong>Choose the quicklinks you want to display on your '.$moduleLabel.'.</strong></p>
          <ul class="selection-box padded">'.$output.'</ul>';
      }
		}
		return $output;

  }

  /**
	 * to get view for Quicklinks Tab
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 * @param mixed $itemSection, Description - array of section data
	 * @param mixed $itemQuicklinkIds, Description - array of quicklink ids
	 * @param mixed $itemQuicklinkRank, Description - array of quicklink ranks
	 *
	 * @return bool
	*/
	public static function saveQuicklinks($itemKey, $itemId, $itemSection, $itemQuicklinkIds, $itemQuicklinkRank)
	{

    if(!empty($itemKey) && !empty($itemId)) {

      $sql = "SELECT `id`
        FROM `page_quicklink_section`
        WHERE `item_key` = '".$itemKey."'
          AND `item_id` = '".$itemId."'
        LIMIT 1";

      $qlSectionId = DB::fetchValue($sql);

       /** GET DEFAULT QUICKLINK STYLE */
      $sqlQuickLinkDefaultStyles = "SELECT `id`
        FROM `quicklink_style`
        WHERE `status` = '".FLAG_ACTIVE."'
          AND `is_default` = '".FLAG_YES."'
        LIMIT 1";

      $qlDefaultStyleId = DB::fetchValue($sqlQuickLinkDefaultStyles);

      $arrSectionData = array();

      $arrSectionData['heading'] = htmlspecialchars($itemSection['heading'], ENT_QUOTES, 'UTF-8');
      $arrSectionData['description'] = htmlspecialchars($itemSection['description'], ENT_QUOTES, 'UTF-8');
      $arrSectionData['quicklink_style_id'] = (!empty($itemSection['style'])) ? $itemSection['style'] : $defaultStyleId;

      if (!empty($qlSectionId)) {

        /** Update quicklink section data for item  */
        DB::updateRow($arrSectionData, 'page_quicklink_section', "WHERE id = '{$qlSectionId}' LIMIT 1");

      } else {

        /** Add New quicklink section data for item */

        $arrSectionData['item_key'] = $itemKey;
        $arrSectionData['item_id']  = $itemId;

        DB::insertRow($arrSectionData, 'page_quicklink_section');

      }

      /** Save  quicklinks for item */

      DB::runQuery("DELETE FROM `page_has_quicklinks` WHERE `item_id` = '{$itemId}' AND `item_key` = '{$itemKey}'");

      if (!empty($itemQuicklinkIds)) {

        $insQuery = '';

        foreach ($itemQuicklinkIds AS $itemQuicklinkId) {

          $quicklinkId     = $itemQuicklinkId;
          $quicklinkRank   = $itemQuicklinkRank[$quicklinkId];
          $quicklinkRank   = (!empty($quicklinkRank)) ? $quicklinkRank : 'null';

          $insQuery .= ',("'.$itemKey.'",'.$itemId.','.$quicklinkId.','.$quicklinkRank.')';
        }

        $insQuery = ltrim($insQuery, ',');

        if ($insQuery) {

          $sqlItemQuicklinks ="INSERT INTO `page_has_quicklinks`(`item_key`, `item_id`, `quicklink_id`, `rank`)
            VALUES {$insQuery}";

          DB::runQuery($sqlItemQuicklinks);

        }
      }

    }

    return true;
  }

  /**
	 * to get Quicklinks data for frontend
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function fetchPageQuicklinksContent($itemKey, $itemId)
	{
		$output		= '';

		if(!empty($itemKey) && !empty($itemId)) {

      $arrQlSectionContent = array();

			$sqlQlSectionData = "SELECT `heading`,
          `description`,
          `quicklink_style_id`
				FROM `page_quicklink_section`
				WHERE `item_key` = '".$itemKey."'
					AND `item_id` = '".$itemId."'
				LIMIT 1";

      $arrQlSectionContent = DB::fetchRow($sqlQlSectionData);

      $sqlQuicklinks = "SELECT q.`id`,
          q.`name`,
          q.`heading`,
          q.`description`,
          q.`photo_path`,
          q.`thumb_photo_path`,
          q.`photo_alt_text`,
          q.`page_id`,
          q.`url`,
          pmd.`full_url` AS page_url,
          q.`button_text`
        FROM `page_has_quicklinks` phq
        LEFT JOIN `quicklinks` q
          ON (q.`id` = phq.`quicklink_id`)
        LEFT JOIN `general_pages` AS gp
          ON (gp.`id` = q.`page_id`)
        LEFT JOIN `page_meta_data` AS pmd
          ON (pmd.`id` = gp.`page_meta_data_id`)
        WHERE phq.`item_key` = '".$itemKey."'
          AND phq.`item_id` = '".$itemId."'
          AND q.`status` = '".FLAG_ACTIVE."'
        ORDER BY phq.`rank`, q.`rank`";

      $arrQuicklinks = DB::fetchAll($sqlQuicklinks);

      $arrQlSectionContent['quicklinks'] = (!empty($arrQuicklinks)) ? $arrQuicklinks : array();

      $output = $arrQlSectionContent;
		}

		return $output;

	}

}