<?php
/** Generate item table list */

function generateTable()
{
  global $do, $listType, $modMsgLabel, $moduleSubHeading;
  $rowitems           = (empty($rowitems)) ? '' : $rowitems;
  $sql = "SELECT `id`,
      `name`,
      `show_on_gallery_page`,
      `rank`
    FROM `gallery`
    ORDER BY `rank`";
 
 $arrItems = DB::fetchAll($sql);

  if(!empty($arrItems)) {
    
    foreach ($arrItems as $item) {

      $itemId            = $item['id'];
      $itemName          = $item['name'];
      $itemOnGalleryPage = $item['show_on_gallery_page'];
      $itemRank          = $item['rank'];
  
      $itemLabel = $itemName ?: 'Untitled-'.$itemId;

      $itemSelect = '<label class="custom-check">
          <input type="checkbox" name="item_select[]"
           class ="checkall" value="'.$itemId.'"><span></span>
        </label>';

      $itemOnGalleryPage = ($itemOnGalleryPage === FLAG_YES) 
        ? '<span class="label label-primary">Yes</span>' 
        : '<span class="label label-default">No</span>';
    
      $itemRankElm = '';

      if ($listType != FLAG_DELETED) {

        $itemRankElm = '<input type="text" name="item_rank['.$itemId.']" value="'.$itemRank.'" 
          title="Rank for '.$itemLabel.'"
          class="input--rank">';

      }
  
      $rowitems .= '<tr>
        <td width="20">'.$itemSelect.'</td>
        <td>
          '.$itemRankElm.'
          <a href="'.ADMIN_BASE_URL.'/?do='.$do.'&action=edit&id='.$itemId.'">'.$itemLabel.'</a>
        </td>
        <td width="200">'.$itemOnGalleryPage.'</td>
        </tr>';
    }

  } else {

    $moduleLabel = strtolower((string) $modMsgLabel);

    $rowitems .= '<tr>
      <td colspan="3" align="center" class="no-data">No '.$moduleLabel.' available.</td>
    </tr>';

  }

  return $rowitems;
}
?>