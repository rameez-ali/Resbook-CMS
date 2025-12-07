<?php
$action = '';
global $formSubmitBtnCls, $formSubmitBtnAttr, $captchaErrorClass;

if( !empty($formFields) )
{

    $formFieldsView = '';

    foreach ($formFields as $formField)
    {

        $formFieldLabel         = $formField['label'] ?? null;
        $formFieldType          = $formField['type'] ?? null;
        $formFieldValue         = $formField['value'] ?? null;
        $formFieldIsRequired    = $formField['required'] ?? null;
        $formFieldDescription   = $formField['description'] ?? null;
        $formFieldClass         = $formField['className'] ?? null;
        $formFieldName          = $formField['name'] ?? null;
        $formFieldSubtype       = $formField['subtype'] ?? null;
        $formFieldValues        = $formField['values'] ?? null;
        $formFieldIsToggle      = $formField['toggle'] ?? null;
        $formFieldIsMultiple    = $formField['multiple'] ?? null;
        $formFieldType          = $formField['type'] ?? null;
        $formFieldPlaceholder   = $formField['placeholder'] ?? null;

        $isText     = ($formFieldType == 'text');
        $isEmail    = ($formFieldType == 'email');
        $isSelect   = ($formFieldType == 'select');
        $isTextarea = ($formFieldType == 'textarea');
        $isRadio    = ($formFieldType == 'radio-group');
        $isCheckbox = ($formFieldType == 'checkbox-group');
        $isHeader   = ($formFieldType == 'header');
        $isDate     = ($formFieldType == 'date');

        $formFieldPlaceholderAttr = ($formFieldPlaceholder) ? ' placeholder="'.$formFieldPlaceholder.'"' : '';
        $formFieldIsRequiredElm  = ($formFieldIsRequired == true) ? '<span class="text-danger"><small><em>&#42;</em></small></span>' : '';

        $formFieldOptionsView = '';

        $fieldError = ( $formFieldIsRequired == true && $_POST ) ? $formValidation->getError($formFieldName) : '';

        if ($isHeader) {
            $formFieldsView .= ' <div class="form__group">
                <h2 class="'.$formFieldClass.'">'.$formFieldLabel.'</h2>
            </div>';
        } elseif ($isText || $isEmail ||  $isDate) {
            $fieldValue      = ($_POST !== []) ? validateInput($formFieldName) : $formFieldValue;
            $formFieldClass .= ( $isDate ) ? ' date-control' : '';
            $formFieldType   = ( $isDate ) ? 'text ' : $formFieldType;
            $formFieldCalSVG = ( $isDate ) ? '<div class="form_calender"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
              </svg></div>' : '';
            $formFieldType   = ( $isText ) ? $formFieldSubtype : $formFieldType;
            $formFieldsView .= <<<TEXTEMAILDATE
                <div class="form__group">
                    <label for="$formFieldName" class="form__label">$formFieldLabel $formFieldIsRequiredElm</label>
                    <input type="$formFieldType" id="$formFieldName" value="$fieldValue" 
                        class="$formFieldClass" name="$formFieldName" 
                        $formFieldPlaceholderAttr   
                    >
                    <small class="form-group-help">
                        $formFieldDescription
                    </small>
                    $formFieldCalSVG
                    $fieldError
                </div>
            TEXTEMAILDATE;
        } elseif( $isSelect && !empty($formFieldValues) )
        {
            foreach ($formFieldValues as $formFieldSingleValue)
            {
                $formFieldOptionValue = $formFieldSingleValue['value'];
                $formFieldOptionLabel = $formFieldSingleValue['label'];
                $formFieldOptionSelected = $formFieldSingleValue['selected'] ?? null;
               
                if (!empty($_REQUEST[$formFieldName])) {
                    $isSelected = ($formFieldOptionValue == $_REQUEST[$formFieldName])? ' selected="selected"' : '';
                }else {
                    $isSelected = '';
                } 
                $formFieldOptionsView .= '<option value="'.$formFieldOptionValue.'"'.$isSelected.'>'.$formFieldOptionLabel.'</option>';
            }

            $isMultipled      = (($formFieldIsMultiple == true)) ? ' multiple="multiple"' : '';

            $formFieldsView .= <<< SELECT
                <div class="form__group form_dropdown">
                    <label for="$formFieldName" class="form__label">$formFieldLabel $formFieldIsRequiredElm</label>
                    <div class="custom-dropdown">
                    <select id="$formFieldName" class="$formFieldClass" name="$formFieldName"  $isMultipled >
                        <option value=""> $formFieldPlaceholder </option>
                        $formFieldOptionsView
                    </select>
                    <i class="fas fa-chevron-down pr-2"></i>
                    </div>
                    <small class="form-group-help">
                        $formFieldDescription
                    </small>
                    $fieldError
                </div>
            SELECT;
        } elseif( $isTextarea )
        {
            $fieldValue = ($_POST !== []) ? validateInput($formFieldName) : $formFieldValue;
            
            $formFieldsView .= <<< TEXTAREA
                <div class="form__group">
                    <label for="$formFieldName" class="form__label">$formFieldLabel $formFieldIsRequiredElm</label>
                    <textarea id="$formFieldName" class="$formFieldClass" name="$formFieldName" $formFieldPlaceholderAttr >$fieldValue</textarea>
                    $fieldError
                </div>
            TEXTAREA;
        } elseif( ($isCheckbox || $isRadio) )
        {
            $formFieldsView .= ' <div class="form__group">';

            $selectionType = ($formFieldType === 'checkbox-group') ? 'checkbox' : 'radio';

            if( $formFieldType === 'checkbox-group' || $formFieldType === 'radio-group' )
            {
                $formFieldsView .= '<label class="form__label">'.$formFieldLabel.' '.$formFieldIsRequiredElm.'</label><div class="control-group">';

                $elmWrapperCls = ($isCheckbox && $formFieldIsToggle == true) ? ' switch' : '';
                $elmSwitch     = ($isCheckbox && $formFieldIsToggle == true) ? '<span class="toggle__switch round"></span>' : '';
                $elmLabelCls  = ($isCheckbox && $formFieldIsToggle == true) ? 'toggle__switch__label' : '';

                foreach ($formFieldValues as $formFieldSingleValue)
                {
                    $formFieldOptionValue = $formFieldSingleValue['value'];
                    $formFieldOptionLabel = $formFieldSingleValue['label'];
                    $formFieldOptionSelected = $formFieldSingleValue['selected'] ?? null;
                
                    if (!empty($_POST[$formFieldName]) && is_array($_POST[$formFieldName])) {
                        $isSelected = in_array($formFieldOptionValue, $_POST[$formFieldName]) ? ' checked' : '';
                    } else {
                        $isSelected = ($formFieldOptionSelected === true) ? ' checked' : '';
                    }
                
                    $formFieldsView .= <<< CHECKBOXRADIOGROUP
                        <label class="$selectionType-inline$elmWrapperCls">
                            <input type="$selectionType" id="$formFieldName" name="{$formFieldName}[]" value="$formFieldOptionValue"  $isSelected> 
                            $elmSwitch
                            <span class="$elmLabelCls"> $formFieldOptionLabel</span>
                        </label>
                    CHECKBOXRADIOGROUP;
                }

                $formFieldsView .= "$fieldError</div>";
                // '. ((empty($elmSwitch)) ? $formFieldOptionLabel.$formFieldIsRequiredElm : '').'
            }
            else
            {
                $formFieldsView .= <<< HTMLBLOCK
                    <label class="$formFieldType-inline">
                        <input type="$formFieldType" id="$formFieldName" name="$formFieldName" value="$formFieldValue" > $formFieldLabel $formFieldIsRequiredElm
                    </label> $fieldError
                HTMLBLOCK;
            }

            $formFieldsView .= '</div>';
        }
    }

    if( $hasTermsAndConditions )
    {

        $termsLink = '<label class="checkbox-inline">
            <input type="checkbox" name="tc" id="tc" value="1" '.$tcChecked.'> 
            <a href="#tc-modal" class="trigger-tc-modal"><u>Click here to read and accept the terms and conditions</u></a>
        </label>';
    }
    else
    {
        $termsLink = '';
    }
    $form = <<< H

    <div class="row justify-content-center comp-form">
        <form action="{$action}" method="post" role="form" class="custom-form col-10">
            <div class="w-100" style="margin-bottom:50px;">
                {$formFieldsView}

                <div class="form__group">
                    {$termsLink}
                    {$tcErrorMsg}
                </div>
                
                <div class="form__group {$captchaErrorClass}">
                <label></label>
                <div class="controls">
                    <div class="g-recaptcha" data-sitekey="{$gcSiteKey}"></div>
                    <span class="text-danger">{$captchaErrorMsg}</span>
                </div>
                </div>
                <div class="form__group text-center">
                    <button type="submit" class="btn btn--primary {$formSubmitBtnCls} booking-btn" id="form-submit-btn" name="continue" value="continue"{$formSubmitBtnAttr}>Submit <svg xmlns="http://www.w3.org/2000/svg" width="17.88" height="11.88" viewBox="0 0 29.117 29.117" class="btn-arrow-icon">
                        <path id="arrow_forward_FILL0_wght400_GRAD0_opsz48" d="M174.559,285.117l-1.911-1.956,11.237-11.237H160v-2.73h23.885l-11.237-11.237L174.559,256l14.559,14.559Z" transform="translate(-160 -256)" fill="#fff"/>
                        </svg></button>
                </div>

            </div>
        </form>
    </div>
<script src="https://www.google.com/recaptcha/api.js"></script>
H;


if ($hasTermsAndConditions) {
    $templateTags['body_html'] .= <<< H

<div class="modal fade" id="tc-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Terms & Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {$termsAndConditions}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--light-blue accept-tc" data-dismiss="modal">I ACCEPT</button>
              </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
H;
}
}

?>