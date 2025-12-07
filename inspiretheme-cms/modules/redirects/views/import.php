<?php

$tabImportContent = '<p id="import-csv-msg"></p>
  <table width="100%" border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="130"><label for="csv_file_path">Redirect CSV File:</label></td>
      <td>
          <input name="csv_file_path" type="text" value="" 
           style="width:300px;" id="csv_file_path" readonly autocomplete="off">
          <input type="button" value="browse" onclick="openCKFileBrowser(\'csv_file_path\')"> 
          <input type="button" value="clear" onclick="clearValue(\'csv_file_path\')"><br>
      </td>
      <td valign="top">
        <a class="btn btn-default import-csv" href="#" id="import-csv-btn">
          <i class="glyphicon glyphicon-floppy-save"></i> Import
        </a>
      </td>
    </tr>
  </table>
  <div id="import-warning"></div>';

$extraScripts .=  '<script type="text/html" id="redirect-tmpl">
    <% if(items.length > 0) { %>
      <hr class="content-hr">
      <p>
        <strong><%= itemMsg %></strong>
      </p>
      <table width="100%" border="0" cellspacing="0" cellpadding="6">
        <thead>
          <tr>
            <th width="450">Old URL</th>
            <th>New URL</th>
          </tr>
        </thead>
        <tbody>
        <% _.each( items, function( item ) { %>
          <tr>
            <td width="450"><%= item.old %></td>
            <td><%= item.new %></td>
          </tr>
        <% }) %>
        </tbody>
      </table>
      <% } %>
   </script>';
?>