<?php

/**
 * NETZONE CMS Class for Hightlight elements.
 *
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 2.0
 */

class HighlightHelper
{

    /**
 	* @var mixed - Type of Highlight
 	*/
  //static $defaultStyle 		= array("C" => "Carousel Style", "F" => "Fullscreen Style");
  /**
	 * to get view for Highlight Tab
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function getHighlightData($itemKey, int $itemId = null, $moduleLabel)
	{
    $output		= '';

    if(!empty($itemKey)) {

      $moduleLabel             = strtolower($moduleLabel);

      $output		.= self::fetchHighlightContent($itemKey, $itemId);
      $output		.= self::fetchHighlightStyle($itemKey, $itemId, $moduleLabel);
      $output		.= self::fetchHighlightList($itemKey, $itemId, $moduleLabel);
      $output   .= self::fetchFeaturedHighlightList($itemKey, $itemId, $moduleLabel);


    }

    return $output;
  }

  /**
	 * to get list options for Highlights
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function fetchHighlightContent($itemKey, $itemId = null)
	{
		$output		= '';

		if(!empty($itemKey)) {

			$sql = "SELECT `heading`,
          `description`,
          `url`,
          `buttontext`
				FROM `page_highlight_section`
				WHERE `item_key` = '".$itemKey."'
					AND `item_id` = '".$itemId."'
				LIMIT 1";

      $hlSectionContent = DB::fetchRow($sql);

      $itemHlSectionHeading     =  $hlSectionContent['heading'];
      $itemHlSectionDescription =  $hlSectionContent['description'];
      $itemHlSectionUrl         =  $hlSectionContent['url'];
      $itemHlSectionbuttontext  =  $hlSectionContent['buttontext'];

      $output = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
            <tr>
              <td colspan="2">
                <h2 class="form-section-heading">Highlight Introduction</h2>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <strong>
                  You can add an introduction heading and description that will be displayed above the highlights.
                  </strong>
              </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
              <td width="160">
                <label for="highlight_section_heading">Heading:</label>
              </td>
              <td>
                <input type="text" name="highlight[heading]" id="highlight_section_heading"
                value="'.$itemHlSectionHeading.'" style="width:550px;" />
              </td>
            </tr>
            <tr>
              <td valign="top">
                <label for="highlight_section_Description">Description:</label>
              </td>
              <td>
                <textarea name="highlight[description]" id="highlight_section_Description"
                style="width:550px;height:80px;resize: none;"
                maxlength="250" class="check-max">'.$itemHlSectionDescription.'</textarea>
                <br><span class="text-muted"><small>Max 250 characters (including spaces) <em></em></small></span>
              </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
              <td width="160">
                <label for="highlight_section_url">Url:</label>
              </td>
              <td>
                <input type="text" name="highlight[url]" id="highlight_section_url"
                value="'.$itemHlSectionUrl.'" style="width:250px;" />
              </td>
            </tr>
            <tr>
              <td valign="top">
                <label for="highlight_section_buttontext">Button Text:</label>
              </td>
              <td>
              <input type="text" name="highlight[buttontext]" id="highlight_section_buttontext"
              value="'.$itemHlSectionbuttontext.'" style="width:250px;" />
              </td>
            </tr>

        </table>';

		}

		return $output;

	}

	/**
	 * to get list options for Highlight
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function fetchHighlightStyle($itemKey, int $itemId = null, $moduleLabel)
	{
		$output		= ''; $qlStyleOptions   = '';

		if(!empty($itemKey)) {

      /** GET DEFAULT HIGHLIGHT STYLE */
      $sqlHighlightDefaultStyles = "SELECT `id`
        FROM `highlight_style`
        WHERE `status` = '".FLAG_ACTIVE."'
          AND `is_default` = '".FLAG_YES."'
        LIMIT 1";

      $hlDefaultStyleId = DB::fetchValue($sqlHighlightDefaultStyles);

      /** GET SELECTED HIGHLIGHT STYLE */
      $sql = "SELECT `highlight_style_id`
				FROM `page_highlight_section`
				WHERE `item_key` = '".$itemKey."'
					AND `item_id` = '".$itemId."'
				LIMIT 1";

      $hlSelectedStyleId = DB::fetchValue($sql);

      /** SET HIGHLIGHT STYLE */
      $hlSelectedStyleId = (!empty( $hlSelectedStyleId )) ?  $hlSelectedStyleId : $hlDefaultStyleId;

      $sqlHighlightStyles = "SELECT `id`,
          `title`,
          `thumb_path`
        FROM `highlight_style`
				WHERE `status` = '".FLAG_ACTIVE."'
        ORDER BY `rank`,`title`";

      $arrHighlightStyles = DB::fetchAll($sqlHighlightStyles);

			if(!empty($arrHighlightStyles)) {

				foreach ($arrHighlightStyles AS $highlightStyle) {

            $hlStyleId          = $highlightStyle['id'];
            $hlStyleLabel       = $highlightStyle['title'];
            $hlStyleImagePath   = $highlightStyle['thumb_path'];
            $smallLabel         = '';
            if($hlStyleLabel == 'Default') {
              $smallLabel = 'Recommended Image size: 470px x 600/250';
            }elseif ($hlStyleLabel == 'Tile') {
              $smallLabel = 'Recommended Image size: 420px x 250px';
            }elseif ($hlStyleLabel == 'Icon') {
              $smallLabel = 'Recommended Image size: 64px x 64px';
            }

						$isChecked      = ($hlStyleId === $hlSelectedStyleId) ? ' checked="checked"' : '';

						$qlStyleOptions .= '<li class="itemsel itemsel--alt">
								<label class="checkbox-inline sel">
										<input class="do-sel" type="radio" name="highlight[style]" value="'.$hlStyleId.'"'.$isChecked.'>
										'.$hlStyleLabel.'
								</label>
								<img src="'.ADMIN_BASE_URL.'/'.$hlStyleImagePath.'" style="padding:10px 0px;max-width:210px;"/>
                <small>'.$smallLabel.'</small>
						</li>';

        }

        $output = '<hr class="content-hr">
          <h2 class="form-section-heading">Choose Highlight Style</h2>
          <p><strong>Choose the style of highlights you want to display on your '.$moduleLabel.'.</strong></p>
          <ul class="selection-box padded">'.$qlStyleOptions.'</ul>';

			}
		}

		return $output;

  }

  /**
	 * to get list options for Highlight
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function fetchHighlightList($itemKey, int $itemId = null, $moduleLabel)
	{
		$output		= '';

		if(!empty($itemKey)) {

		 $sqlHighlights = "SELECT `id`,
          `name`
        FROM highlight
				WHERE `status` != '".FLAG_DELETED."'
        ORDER BY `rank`,`name`";

      $arrHighlight = DB::fetchAll($sqlHighlights);

      if (!empty($arrHighlight)) {

        $csvSelectedHighlight = DB::fetchValue("SELECT GROUP_CONCAT(`highlight_id`)
          FROM `page_has_highlight`
          WHERE `item_key` = '".$itemKey."'
            AND `item_id` = '".$itemId."' AND `is_featured` = 0");

        $sqlSelectedHighlightRank = "SELECT `highlight_id` AS opKey,
            `rank` AS opValue
            FROM `page_has_highlight`
            WHERE `item_key` = '".$itemKey."'
              AND `item_id` = '".$itemId."'";

        $arrSelectedHighlightRank = DB::fetchPairs($sqlSelectedHighlightRank);

        $arrSelectedHighlight = (!empty($csvSelectedHighlight)) ? explode(',', $csvSelectedHighlight) : array();

        foreach ($arrHighlight as $highlight) {

          $highlightId  = $highlight['id'];
          $qlLabel      = $highlight['name'];
          $qlIsChecked  = (in_array($highlightId, $arrSelectedHighlight)) ? ' checked="checked"' : '';
          $qlRank       = ($qlIsChecked) ? $arrSelectedHighlightRank[$highlightId] : '';

          $output .= '<li class="itemsel sel-rank">
            <input type="number" class="input-xxs rank" min="1" name="item_highlight_rank['.$highlightId.']"
              value="'.$qlRank.'" placeholder="Rank" >
            <label class="checkbox-inline sel">
              <input'.$qlIsChecked.' type="checkbox" class="do-sel"
                value="'.$highlightId.'" name="item_highlight_id[]">
                <span>'.$qlLabel.'</span>
            </label>
          </li>';

        }

        $output = '<hr class="content-hr">
          <h2 class="form-section-heading">Choose Highlights</h2>
          <p><strong>Choose the highlights you want to display on your '.$moduleLabel.'.</strong></p>
          <ul class="selection-box padded">'.$output.'</ul>';
      }
		}
		return $output;

  }

  /**
 * to get list options for Featured Highlights
 *
 * @param string $itemKey, Description - name of the module
 * @param int $itemId, Description - module item id
 * @param string $moduleLabel, Description - label of the module for display
 *
 * @return string
*/
public static function fetchFeaturedHighlightList($itemKey, int $itemId = null, $moduleLabel)
{
	$output = '';

	if(!empty($itemKey)) {

		$sqlHighlights = "SELECT `id`, `name`
						  FROM highlight
						  WHERE `status` != '".FLAG_DELETED."'
						  ORDER BY `rank`,`name`";

		$arrHighlight = DB::fetchAll($sqlHighlights);

		if (!empty($arrHighlight)) {

      $csvSelectedHighlight = DB::fetchValue("SELECT GROUP_CONCAT(`highlight_id`)
              FROM `page_has_highlight`
              WHERE `item_key` = '".$itemKey."'
              AND `item_id` = '".$itemId."' AND `is_featured` = 1");



			$arrSelectedHighlight = (!empty($csvSelectedHighlight)) ? explode(',', $csvSelectedHighlight) : array();

			foreach ($arrHighlight as $highlight) {

				$highlightId  = $highlight['id'];
				$qlLabel      = $highlight['name'];
				$qlIsChecked  = (in_array($highlightId, $arrSelectedHighlight)) ? ' checked="checked"' : '';

				$output .= '<li class="itemsel">
							  <label class="checkbox-inline sel">
								<input'.$qlIsChecked.' type="checkbox" class="do-sel"
									  value="'.$highlightId.'" name="item_highlight_is_featured[]">
									  <span>'.$qlLabel.'</span>
							  </label>
						   </li>';
			}

			$output = '<hr class="content-hr">
					   <h2 class="form-section-heading">Choose Featured Highlights</h2>
					   <p><strong>Choose the featured highlights you want to display on your '.$moduleLabel.'.</strong></p>
             <strong><small>Recommended image size: 1045px x 600px</small></strong>
					   <ul class="selection-box padded">'.$output.'</ul>';
		}
	}
	return $output;
}


  /**
	 * to get view for Highlight Tab
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 * @param mixed $itemSection, Description - array of section data
	 * @param mixed $itemHighlightIds, Description - array of hightlight ids
	 * @param mixed $itemHighlightRank, Description - array of hightlight ranks
   * @param mixed $featuredHighlightIds, Description - array of featured hightlight ids
	 *
	 * @return bool
	*/
	public static function saveHighlights($itemKey, $itemId, $itemSection, $itemHighlightIds, $itemHighlightRank, $featuredHighlightIds)
	{
    if(!empty($itemKey) && !empty($itemId)) {

      $sql = "SELECT `id`
        FROM `page_highlight_section`
        WHERE `item_key` = '".$itemKey."'
          AND `item_id` = '".$itemId."'
        LIMIT 1";

      $qlSectionId = DB::fetchValue($sql);

       /** GET DEFAULT HIGHLIGHT STYLE */
      $sqlHighlightDefaultStyles = "SELECT `id`
        FROM `highlight_style`
        WHERE `status` = '".FLAG_ACTIVE."'
          AND `is_default` = '".FLAG_YES."'
        LIMIT 1";

      $hlDefaultStyleId = DB::fetchValue($sqlHighlightDefaultStyles);

      $arrSectionData = array();

      $arrSectionData['heading'] = htmlspecialchars($itemSection['heading'], ENT_QUOTES, 'UTF-8');
      $arrSectionData['description'] = htmlspecialchars($itemSection['description'], ENT_QUOTES, 'UTF-8');
      $arrSectionData['url'] = htmlspecialchars($itemSection['url'], ENT_QUOTES, 'UTF-8');
      $arrSectionData['buttontext'] = htmlspecialchars($itemSection['buttontext'], ENT_QUOTES, 'UTF-8');
      $arrSectionData['highlight_style_id'] = (!empty($itemSection['style'])) ? $itemSection['style'] : $defaultStyleId;


      if (!empty($qlSectionId)) {

        /** Update highlight section data for item  */
        DB::updateRow($arrSectionData, 'page_highlight_section', "WHERE id = '{$qlSectionId}' LIMIT 1");

      } else {
        /** Add New highlight section data for item */
        $arrSectionData['item_key'] = $itemKey;
        $arrSectionData['item_id']  = $itemId;

        DB::insertRow($arrSectionData, 'page_highlight_section');
      }
      // Merge and de-duplicate both regular and featured highlight IDs
      $allHighlightIds = array_unique(array_merge($itemHighlightIds ?? [], $featuredHighlightIds ?? []));
      /** Save  Highlight for item */
      DB::runQuery("DELETE FROM `page_has_highlight` WHERE `item_id` = '{$itemId}' AND `item_key` = '{$itemKey}'");

      if (!empty($allHighlightIds)) {
          $insQuery = '';
          foreach ($allHighlightIds AS $itemHighlightId) {
              $highlightId     = $itemHighlightId;
              $highlightRank   = $itemHighlightRank[$highlightId] ?? null;  // Using null coalescing operator for cleaner code
              $highlightRank   = (!empty($highlightRank)) ? $highlightRank : 'null';
              $isFeatured = (in_array($highlightId, $featuredHighlightIds ?? [])) ? 1 : 0; // Check if the highlight is featured

              $insQuery .= ',("'.$itemKey.'",'.$itemId.','.$highlightId.','.$highlightRank.','.$isFeatured.')';  // Add the is_featured value
          }

          $insQuery = ltrim($insQuery, ',');

          if ($insQuery) {
              $sqlItemHighlights ="INSERT INTO `page_has_highlight`(`item_key`, `item_id`, `highlight_id`, `rank`, `is_featured`) VALUES {$insQuery}";

              DB::runQuery($sqlItemHighlights);
          }
      }
    }

    return true;
  }

  /**
	 * to get Highlight data for frontend
	 *
	 * @param string $itemKey, Description - name of the module
	 * @param int $itemId, Description - module item id
	 *
	 * @return string
	*/
	public static function fetchPageHighlightContent($itemKey, $itemId)
	{
		$output		= '';

		if(!empty($itemKey) && !empty($itemId)) {

      $arrHlSectionContent = array();

			$sqlHlSectionData = "SELECT `heading`,
          `description`,
          `highlight_style_id`,
          `url` as sectionurl,
          `buttontext`
				FROM `page_highlight_section`
				WHERE `item_key` = '".$itemKey."'
					AND `item_id` = '".$itemId."'
				LIMIT 1";

      $arrHlSectionContent = DB::fetchRow($sqlHlSectionData);

    $sqlFeaturedHighlight = "SELECT h.`id`,
        h.`name`,
        h.`short_description`,
        h.`image_path`,
        h.`thumb_image_path`,
        h.`image_alt_txt`,
        h.`page_id`,
        h.`url`,
        pmd.`full_url` AS page_url,
        h.`button_text`
    FROM `page_has_highlight` phq
    LEFT JOIN `highlight` h
        ON (h.`id` = phq.`highlight_id`)
    LEFT JOIN `general_pages` AS gp
        ON (gp.`id` = h.`page_id`)
    LEFT JOIN `page_meta_data` AS pmd
        ON (pmd.`id` = gp.`page_meta_data_id`)
    WHERE phq.`item_key` = '".$itemKey."'
        AND phq.`item_id` = '".$itemId."'
        AND phq.`is_featured` = '1'
        AND h.`status` = '".FLAG_ACTIVE."'
    ORDER BY phq.`rank`, h.`rank`";

      $featuredHighlight = DB::fetchAll($sqlFeaturedHighlight);

      $arrHlSectionContent['featured'] = $featuredHighlight;

      $sqlHighlights = "SELECT h.`id`,
      h.`name`,
      h.`short_description`,
      h.`image_path`,
      h.`thumb_image_path`,
      h.`image_alt_txt`,
      h.`page_id`,
      h.`url`,
      pmd.`full_url` AS page_url,
      h.`button_text`
    FROM `page_has_highlight` phq
    LEFT JOIN `highlight` h
      ON (h.`id` = phq.`highlight_id`)
    LEFT JOIN `general_pages` AS gp
      ON (gp.`id` = h.`page_id`)
    LEFT JOIN `page_meta_data` AS pmd
      ON (pmd.`id` = gp.`page_meta_data_id`)
    WHERE phq.`item_key` = '".$itemKey."'
      AND phq.`item_id` = '".$itemId."'
      AND phq.`is_featured` = '0'
      AND h.`status` = '".FLAG_ACTIVE."'
    ORDER BY phq.`rank`, h.`rank`";
      $arrHighlights = DB::fetchAll($sqlHighlights);
      $arrHlSectionContent['highlights'] = (!empty($arrHighlights)) ? $arrHighlights : array();

      $output = $arrHlSectionContent;
		}
		return $output;

	}

}