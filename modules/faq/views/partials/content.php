<?php

$iconExpand    = (empty($fsIconExpand)) ? 'fa-angle-down' : $fsIconExpand;
$iconCollapse  = (empty($fsIconCollapse)) ? 'fa-angle-up' : $fsIconCollapse;

$jsVars['faq']['iconExpand']    = $iconExpand;
$jsVars['faq']['iconCollapse']  = $iconCollapse;
$jsVars['faq']['defaultState']  = $fsDefaultState == 'E';

?>