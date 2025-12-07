<?php 

/**
 * NETZONE CMS Helper Class for SEO.
 *
 * @package    NetZone Base CMS 3.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    1.0
 * @since      File available since Release 1.0
 */

class SeoHelper
{

  /**
	 * to get view for Meta Data
	 *
	 * @param int $itemId, Description - page meta data id
	 * @param string $moduleLabel, Description - module label 
	 *
	 * @return string
	*/
	public static function getSeoData(int $itemId = null, $moduleLabel, $isMarkup = true, $isRobots = true)
	{		
    $output		= '';

    $sql = "SELECT pmd.`title`,
          pmd.`meta_description`,
          pmd.`og_title`,
          pmd.`og_meta_description`,
          pmd.`og_image`,
          pmd.`page_code_head_close`,
          pmd.`page_code_body_open`,
          pmd.`page_code_body_close`,
          pmd.`page_structure_data_markup`,
          pmd.`page_meta_index_id`,
          pmd.`page_custom_code`
      FROM `page_meta_data` pmd
      WHERE pmd.`id` = '{$itemId}'
      LIMIT 1";

    $results = DB::fetchRow($sql);

    $output .= self::generateMetaDataView($results, $moduleLabel);
    $output .= self::generateTemplateCodeView($results, $moduleLabel);
    $output .= (!empty($isMarkup)) ? self::generateSchemaMarkupView($results, $moduleLabel) : '';
    $output .= (!empty($isRobots)) ? self::generateRobotTagsView($results, $moduleLabel) : '';
  
    if (!empty($output)) {

      $output = '<table width="100%" border="0" cellspacing="0" cellpadding="6" >'. $output.'</table>';

    }
    
    return $output;
  
  }

  /**
	 * to save for Meta Data
	 *
	 * @param int $itemId, Description - page meta data id
	 * @param mixed $itemData, Description - SEO Data 
	 *
	 * @return bool
	*/
	public static function saveSeoData(int $itemId = null, $itemData)
	{	
    $arrSeoData = array();

    $metaIndexId = (!empty($itemData['robots'])) ? $itemData['robots'] : 1;

    $arrSeoData['title']                      = $itemData['title'];
    $arrSeoData['meta_description']           = $itemData['meta_description'];
    $arrSeoData['og_title']                   = $itemData['og_title'];
    $arrSeoData['og_meta_description']        = $itemData['og_meta_description'];
    $arrSeoData['og_image']                   = $itemData['og_image'];
    
    $arrSeoData['page_code_head_close']       = $itemData['page_code_head_close'];
    $arrSeoData['page_code_body_open']        = $itemData['page_code_body_open'];
    $arrSeoData['page_code_body_close']       = $itemData['page_code_body_close'];
    $arrSeoData['page_code_body_close']       = $itemData['page_code_body_close'];
    $arrSeoData['page_structure_data_markup'] = $itemData['page_structure_data_markup'];

    $arrSeoData['page_meta_index_id']         = $metaIndexId;
    $arrSeoData['page_custom_code']           = $itemData['page_custom_code'];

    DB::updateRow($arrSeoData, 'page_meta_data', "WHERE id = '{$itemId}' LIMIT 1");

    return true;
    //return $true; 
  }
  
  
  /**
	 * to generate Meta Tags View.
	 *
	 * @param mixed $itemData, Description - array of meta data options
	 * @param string $moduleLabel, Description - module label 
	 *
	 * @return string
	*/
  public static function generateMetaDataView(array $itemData = null, $moduleLabel)
	{		
    $output		= '';
    
    $itemTitle                 = $itemData['title'];
    $itemMetaDescription       = $itemData['meta_description'];
    $itemOgTitle               = $itemData['og_title'];
    $itemOgMetaDescription     = $itemData['og_meta_description'];
    $itemOgPhotoPath           = $itemData['og_image'];
    $moduleLabel               = strtolower($moduleLabel);

    $output = '<tr>
        <td colspan="2">
          <h2 class="form-section-heading">Meta Tags</h2>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <strong>
            Add meta data to your '.$moduleLabel.' to help customers find your content through search engines like Google.
             We recommend at least adding a meta title so search engines can find your content 
             and target your desired customer. 
          </strong>
        </td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
      <tr> 
        <td width="190" valign="top"><label for="title">Meta Title:</label>
          <span data-toggle="tooltip" data-placement="right"
           data-title="The title of your '.$moduleLabel.' as it appears on search engine results."></span>
        </td>
        <td>
          <input type="text" name="seo[title]" id="title" class="check-max" value="'.$itemTitle.'" style="width:600px;"
           maxlength="70"><br>
          <span class="text-muted">
            <small>Page titles should be under 65 characters (including spaces)<em></em></small>
          </span>
        </td>     
      </tr>
      <tr>
        <td valign="top">
          <label for="meta_description">Meta Description:</label>
          <span data-toggle="tooltip" data-placement="right"
           data-title="A short summary of the content of your '.$moduleLabel.' as it appears on search engine results.">
          </span>
        </td>
        <td>
          <textarea name="seo[meta_description]" id="meta_description" class="check-max"
           style="width:600px;height:80px;resize:none;" rows="5" maxlength="320">'.$itemMetaDescription.'</textarea>
          <br>
          <span class="text-muted">
            <small>Meta Descriptions should be max 320 characters (including spaces)<em></em></small>
          </span>
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="og_title">OG Title:</label>
          <span data-toggle="tooltip" data-placement="right"
           data-title="The title of your '.$moduleLabel.' when it is shared on social media like Facebook."></span>
        </td>
        <td>
          <input type="text" name="seo[og_title]" id="og_title" class="check-max" value="'.$itemOgTitle.'"
           style="width:600px;" maxlength="70"><br>
          <span class="text-muted">
            <small>Titles should be max 70 characters (including spaces)<em></em></small>
          </span>
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="og_image">OG Image:</label>
          <span data-toggle="tooltip" data-placement="right"
           data-title="This image will appear as the thumbnail when this '.$moduleLabel.' is shared on social media.">
          </span>
        </td>
        <td>
          <input type="text" name="seo[og_image]" id="og_image" 
          value="'.$itemOgPhotoPath.'" style="width:600px;" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openCKFileBrowser(\'og_image\')"> 
          <input type="button" value="clear" onclick="clearValue(\'og_image\')"><br>
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="og_meta_description">OG Description:</label>
          <span data-toggle="tooltip" data-placement="right"
          data-title="A short summary of the content of your '.$moduleLabel.' which appears when the 
            '.$moduleLabel.' is shared on social media."></span>
        </td>
        <td>
          <textarea name="seo[og_meta_description]" id="og_meta_description" class="check-max" 
          style="width:600px;height:80px;resize:none;" rows="5" maxlength="320">'.$itemOgMetaDescription.'</textarea>
          <br>
          <span class="text-muted">
            <small>
              OG Descriptions should be max 320 characters (including spaces)<em></em></small>
          </span>
        </td>
      </tr>';

    return $output;
  }

  /**
	 * To Generate Template Codes View.
	 *
	 * @param mixed $itemData, Description - array of meta data options
	 * @param string $moduleLabel, Description - module label 
	 *
	 * @return string
	*/
  public static function generateTemplateCodeView(array $itemData = null, $moduleLabel)
	{		
    $output		= '';
    
    $itemCodeHeadClose       = $itemData['page_code_head_close'];
    $itemCodeBodyOpen        = $itemData['page_code_body_open'];
    $itemCodeBodyClose       = $itemData['page_code_body_close'];
    $itemCustomCode          = $itemData['page_custom_code'];

    $moduleLabel             = strtolower($moduleLabel);

    $output = '<tr>
        <td colspan="2">
          <hr class="content-hr">
          <h2 class="form-section-heading">Template Codes</h2>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <strong>This is an advanced section where you can add custom code to your '.$moduleLabel.'.</strong>
        </td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
      <tr>
        <td valign="top">
          <label for="page_code_head_close">Head Code:</label>
          <span data-toggle="tooltip" data-placement="right" data-title="Enter code that will be added before the
           closing &lt;/head> tag on your '.$moduleLabel.'."></span>
        </td>
        <td valign="top">
          <textarea name="seo[page_code_head_close]" id="page_code_head_close"
           style="width:600px; height:150px;resize:none;">'.$itemCodeHeadClose.'</textarea>
          <br/>
          <span class="text-muted">
            <small>This code will be added before the closing <b>&lt;/head></b> tag on your '.$moduleLabel.'.</small>
          </span>
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="page_code_body_open">Opening Body Code:</label>
          <span data-toggle="tooltip" data-placement="right" data-title="Enter code that will be added after the
           opening &lt;body> tag on your '.$moduleLabel.'."></span>
        </td>
        <td valign="top">
          <textarea name="seo[page_code_body_open]"  id="page_code_body_open"
           style="width:600px; height:150px;resize:none;">'.$itemCodeBodyOpen.'</textarea>
          <br/>
          <span class="text-muted">
            <small>This code will be added after the opening <b>&lt;body></b> tag on your '.$moduleLabel.'.</small>
          </span>
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="page_code_body_close">Closing Body Code:</label>
          <span data-toggle="tooltip" data-placement="right" data-title="Enter code that will be added before the
           closing &lt;/body> tag on your '.$moduleLabel.'."></span>
        </td>
        <td valign="top">
          <textarea name="seo[page_code_body_close]"  id="page_code_body_close"
           style="width:600px; height:150px;resize:none;">'.$itemCodeBodyClose.'</textarea>
          <br/>
          <span class="text-muted">
            <small>This code will be added before the closing <b>&lt;/body></b> tag on your '.$moduleLabel.'.</small>
          </span>
        </td>
      </tr>
      <tr>
        <td valign="top">
          <label for="page_custom_code">Custom Code:</label>
          <span data-toggle="tooltip" data-placement="right" data-title="Enter code that will be added before the
           footer on your '.$moduleLabel.'."></span>
        </td>
        <td valign="top">
          <textarea name="seo[page_custom_code]"  id="page_custom_code"
           style="width:600px; height:150px;resize:none;">'.$itemCustomCode.'</textarea>
          <br/>
          <span class="text-muted">
            <small>This code will be added before the footer on your '.$moduleLabel.'.</small>
          </span>
        </td>
      </tr>
      ';

    return $output;
  }

  /**
	 * To Generate Structure Data Schema View.
	 *
	 * @param mixed $itemData, Description - array of meta data options
	 * @param string $moduleLabel, Description - module label 
	 *
	 * @return string
	*/
  public static function generateSchemaMarkupView(array $itemData = null, $moduleLabel)
	{		
    $output		= '';
    
    $itemStructureData       = $itemData['page_structure_data_markup'];

    $moduleLabel             = strtolower($moduleLabel);

    $output = '<tr>
        <td colspan="2">
          <hr class="content-hr">
          <h2 class="form-section-heading">Structured Data</h2>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <strong>This is an advanced section where you can add structured data to your '.$moduleLabel
           .' to help search engines understand your content.</strong>
        </td>
      </tr>
      <tr><td colspan="2">&nbsp;</td></tr>
      <tr>
        <td valign="top">
          <label for="page_structure_data_markup">Schema Markup:</label>
          <span data-toggle="tooltip" data-placement="right"
           data-title="Enter schema markup code to help search engines understand the content on your '
            .$moduleLabel.'"></span>
        </td>
        <td valign="top">
          <textarea name="seo[page_structure_data_markup]"  id="page_structure_data_markup"
           style="width:600px; height:250px;resize:none;">'.$itemStructureData.'</textarea>
          <br/>
          <span class="text-muted">
            <small>This code will be added before the closing <b>&lt;/head></b> tag on your '.$moduleLabel.'.</small>
          </span>
        </td>
      </tr>';

    return $output;
  }

  /**
	 * To Generate Robot Tags View.
	 *
	 * @param mixed $itemData, Description - array of meta data options
	 * @param string $moduleLabel, Description - module label 
	 *
	 * @return string
	*/
  public static function generateRobotTagsView(array $itemData = null, $moduleLabel)
	{
    $output		        = ''; $optionsList = '';
    $itemSelected     = $itemData['page_meta_index_id'];
    $moduleLabel      = strtolower($moduleLabel);

    $itemSelected     = (!empty($itemSelected)) ? $itemSelected : 1;

    $robotOptions = DB::fetchAll("SELECT `id`, 
        `name`, 
        `title` 
      FROM `page_meta_index`
      WHERE 1");

    if (!empty($robotOptions)) {

      foreach ($robotOptions as  $option) { 

        $selectedRobot = ($option['id'] == $itemSelected) ? ' checked="checked"' : '';

        $robotTitle = str_ireplace('{mod}', $moduleLabel, $option['title']);

        $optionsList .='<div style="margin-bottom:5px;">
            <label class="checkbox-inline">
              <span data-title="'.$robotTitle.'"
               data-placement="left" data-toggle="tooltip" style="margin-top:2px;">
              </span>
              <input type="radio" name="seo[robots]" value="'.$option['id'].'"
               style="margin:2px 0 0 0px;vertical-align:text-top;" '.$selectedRobot.'> '.$option['name'].'
            </label>
          </div>';
      }

      $output = '<tr>
            <td colspan="2">
              <hr class="content-hr">
              <h2 class="form-section-heading">Privacy</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <strong>This is an advanced section where you can control what search engines can find on your '
               .$moduleLabel.'. Use with care as changing these settings will affect your search results. If in doubt, 
               leave it on the default setting. </strong>
            </td>
          </tr>
          <tr><td colspan="2">&nbsp;</td></tr>
          <tr>
            <td valign="top">
              <label for="robots">Robots</label>
              <span data-toggle="tooltip" data-placement="bottom"
               data-title="Select one of the following options to control what search engines can find on your '
                .$moduleLabel.'.">
              </span>              
            </td>
            <td>'.$optionsList.'</td>
          </tr>';
    }

    return $output;
   
  }

}