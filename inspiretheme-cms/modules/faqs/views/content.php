<?php
$tabDetailsContent = '<table width="100%" border="0" cellspacing="0" cellpadding="6">
<tr>
  <td width="130">
    <label for="question">Question:</label>
  </td>
  <td>
    <input type="text" name="question" id="question" value="'.$itemQuestion.'"style="width:700px;"/></td>
</tr>
<tr>
  <td valign="top" colspan="2">
    <label for="answer">Answer:</label>
    <textarea name="answer" id="answer"
      style="width:100%;height:80px;" class="content-editor">'.$itemAnswer.'</textarea>        
  </td>
</tr>
</table>';

?>