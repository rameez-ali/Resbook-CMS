<?php 

/**
 * NETZONE CMS Class for Form elements.
 *
 * @package    NetZone Base CMS 2.0
 * @author     Pinal Desai <pinal@tomahawk.co.nz>, Tomahawk Brand Management
 * @copyright  Tomahawk Brand Management Ltd.
 * @version    2.0
 * @since      File available since Release 2.0
 */

class FormHelper
{
	/**
	 * to get list options based on array
	 *
	 * @param mixed $arrItems, Description - Array items
	 *
	 * @return string
	*/
	public static function createListFromArray(mixed $arrItems, $selected = null)
	{
		
		$output = '';

		if(!empty($arrItems)) {

			foreach ($arrItems as $itemInd => $itemLabel) {

				$isSelected = ($itemInd == $selected) ? ' selected="selected"' : '';

				$output .= '<option value="'.$itemInd.'"'.$isSelected.'>';
				$output .= $itemLabel;
				$output .= '</option>';

			}
		}

		return $output;

	}

	/**
	 * to get list options based on array
	 *
	 * @param mixed $arrItems, Description - Array items
	 *
	 * @return string
	*/
	public static function createRadioOptions(mixed $arrItems, $name , $selected = null, $class = '')
	{
		
		$output = '';

		if(!empty($arrItems)) {

			foreach ($arrItems as $itemInd => $itemLabel) {

				$isSelected = ($itemInd == $selected) ? ' checked="checked"' : '';

				$output .= '<label class="'.$class.'">';
				$output .= '<input type="radio" name="'.$name.'" id="'.$name.'-'.$itemInd.'" value="'.$itemInd.'"'.$isSelected.'> '.$itemLabel;
				$output .= '</label>';

			}
		}

		return $output;

	}

	/**
	 * to get color radio buttons based on array options
	 *
	 * @param mixed $arrItems, Description - Array items
	 *
	 * @return string
	*/
	public static function createColorRadioOptions(mixed $arrItems, $name , $selected = null, $class = '')
	{
		
		$output = '';

		if(!empty($arrItems)) {

			foreach ($arrItems as $item) {

				$itemInd 				= $item['key'];
				$itemColorHex 	= $item['hex'];
				$itemLabel 			= $item['label'];

				$isSelected = ($itemInd == $selected) ? ' checked="checked"' : '';

				$output .= '<label class="'.$class.'">
						<input type="radio" name="'.$name.'" id="'.$name.'-'.$itemInd.'" value="'.$itemInd.'"'.$isSelected.'> 
						<span class="color-box" style="background-color:'.$itemColorHex.';">&nbsp;</span>'
						.$itemLabel.
					'</label>';

			}
		}

		return $output;

	}

	/**
	 * to get list options based on array
	 *
	 * @param mixed $arrItems, Description - Array items
	 *
	 * @return string
	*/
	public static function createCheckboxOptions(mixed $arrItems, $name , $selected = null, $class = '')
	{
		
		$output = '';

		if(!empty($arrItems)) {

			$arrSelected = (empty($selected)) ? [] : explode(',', (string) $selected);

			foreach ($arrItems as $itemInd => $itemLabel) {

				$isSelected = (in_array($itemInd,$arrSelected)) ? ' checked="checked"' : '';

				$output .= '<label class="'.$class.'">';
				$output .= '<input type="checkbox" name="'.$name.'" value="'.$itemInd.'"'.$isSelected.'> '.$itemLabel;
				$output .= '</label>';
				
			}
		}

		return $output;

	}

	/**
	 * to get list options based on array
	 *
	 * @param mixed $arrItems, Description - Array items
	 * @param string $name, Description - name of the checkbox
	 * @param string $selected, Description - selected values in csv
	 *
	 * @return string
	*/
	public static function createCheckboxGroupOptions(mixed $arrItems, $name , $selected = null, $labelCls = null)
	{
		
		$output = '';

		$labelCls = (empty($labelCls)) ? '' : $labelCls;

		if(!empty($arrItems)) {

			$arrSelected = (empty($selected)) ? [] : explode(',', $selected);

			foreach ($arrItems as $itemInd => $itemLabel) {

				$isSelected = (in_array($itemInd,$arrSelected)) ? ' checked="checked"' : '';

				$output .= '<li class="itemsel">
						<label class="checkbox-inline sel '.$labelCls.'">
							<input class="do-sel" type="checkbox" name="'.$name.'" value="'.$itemInd.'"'.$isSelected.'> '.$itemLabel.'
						</label>
					</li>';
				
			}
		}

		return $output;

	}
	
}


