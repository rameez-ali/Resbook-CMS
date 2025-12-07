<?php

$extraStyles .= '<link href="/'.ADMIN_DIR.'/css/form-builder.min.css?v='.time().'" rel="stylesheet">';
$extraStyles .= '<link href="/'.ADMIN_DIR.'/form-render.min.css?v='.time().'" rel="stylesheet">';
$extraScripts .= '<script src="/'.ADMIN_DIR.'/js/libs/form-builder.min.js"></script>';
$extraScripts .= '<script src="/'.ADMIN_DIR.'/js/libs/form-render.min.js"></script>';
$extraScripts .= '<script src="/'.ADMIN_DIR.'/js/form-builder.js?v='.time().'"></script>';

$tabFieldsContent = '<div id="build-wrap" class="build-wrap"></div>
<textarea id="formData" style="display: none;">'.$jsonData.'</textarea>';