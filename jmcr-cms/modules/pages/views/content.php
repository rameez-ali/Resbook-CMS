<?php
/** Details tab content */

$ddMaxCoulmns = generateNumberDropdown(1, MAX_COLUMNS);

$contentRows = fetchAll("SELECT `id`, `rank`
  FROM `content_row`
  WHERE `page_meta_data_id` = '{$pageMetaDataId}'
  ORDER BY `rank`");

$contentView = '';

if (!empty($contentRows)) {

  foreach ($contentRows as $rowIndex => $contentRow) {

    $contentView .= '<div class="row sortable-item clear" 
      id="row-'.$rowIndex.'">';

    $rank = $rowIndex + 1;

    $rowColumns = fetchAll("SELECT `content`, 
        `css_class`, 
        `rank` 
      FROM `content_column` 
      WHERE `content_row_id` = '{$contentRow['id']}' 
      ORDER BY `rank`");

    foreach ($rowColumns as $colIndex => $rowColumn) {
      
      $contentView .= '<div id="col-'.$rowIndex.'-'.$colIndex.'"
        class="'.$rowColumn['css_class'].' res-col sortable-item">
          <ul class="action">
            <li><input type="checkbox" class="col-merge" value="1"><li/>
            <li>
              <a href="#" title="Drag to change the rank" class="move-col">
                <i class="glyphicon glyphicon-move"></i>
              </a>
            <li/>
            <li>
              <a href="#" data-to-remove=".res-col" title="Remove section"
              class="remove-col">
                <i class="glyphicon glyphicon-remove"></i>
              </a>
            <li/>
          </ul>
          <div class="editable-column-content" 
           title="Click to edit this content section.">
            <div class="content-editor" data-ref="content-'.$rowIndex.'-'.$colIndex.'">
            '.$rowColumn['content'].'</div>
            <textarea style="display: none" id="content-'.$rowIndex.'-'.$colIndex.'" name="content-'.$rowIndex.'-text[]" class="ckinline-textarea">'.$rowColumn['content'].'</textarea>
          </div>
          <input type="hidden" class="col-rank" value="'.$rowColumn['rank'].'" 
           name="content-'.$rowIndex.'-rank[]">
          <input type="hidden" class="col-cls"
           value="'.$rowColumn['css_class'].'"
           name="content-'.$rowIndex.'-class[]">
      </div>';
    }

    $contentView .= '<input type="hidden" name="row-index[]"
       value="'.$rowIndex.'">
      <input type="hidden" name="row-rank[]" class="row-rank"
       value="'.$contentRow['rank'].'">
      <div class="clear"></div>
      <ul class="roww action">
        <li>
          <a href="#" title="add new column to this row" class="add-col">
            <i class="glyphicon glyphicon-plus-sign"></i>
          </a>
        <li/>
        <li>
          <a href="#" title="drag to change the rank" class="move-col">
            <i class="glyphicon glyphicon-move"></i>
          </a>
        <li/>
        <li>
          <a href="#" title="click to remove row" data-to-remove=".row"
           class="remove-col">
            <i class="glyphicon glyphicon-remove"></i>
          </a>
        <li/>
      </ul>
      </div>';
  }
}

$tabContentContent = '<label>Heading</label>
  <p style="margin-bottom:20px;">
    <input name="heading" type="text" id="heading" value="'.$pageHeading.'" 
     style="width:800px;" />
  </p>
  <label>Introduction</label>  
  <p style="margin-bottom:20px;">
    <textarea name="introduction" id="introduction"
     style="width:800px;height:150px;resize:none;">'.$pageIntroduction
     .'</textarea>
  </p>
  <p>Add new row with &nbsp;
    <select name="column-num" id="column-num" class="column-num">
      '.$ddMaxCoulmns.'
    </select> &nbsp;columns. 
    <button type="button" class="add-row">Go</button>
  </p>
  <div id="grid-holder" class="grid-holder">
    '.$contentView.'
  </div>';


?>