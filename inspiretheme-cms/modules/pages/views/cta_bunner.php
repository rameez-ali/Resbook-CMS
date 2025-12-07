<?php

/** Page Module - CTA Bunner Tab */

$tabCTABunnerContent ='<table width="100%" border="0" cellspacing="0" cellpadding="6">
	<tr>
		<td colspan="2">
			<h2 class="form-section-heading">CTA Banner</h2>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="160">
			<label for="cta_bunner_title">Title:</label>
		</td>
		<td>
			<input type="text" name="cta_bunner_title" id="cta_bunner_title" value="'.$ctaBunnerTitle.'" style="width:550px;" />
		</td>
	</tr>
	<tr>
		<td valign="top">
			<label for="cta_bunner_description">Description:</label>
		</td>
		<td>
			<textarea name="cta_bunner_description" id="cta_bunner_description"
              style="width:550px;height:80px;resize: none;" maxlength="250" class="check-max">'.$ctaBunnerDescription.'
			</textarea>
			<br>
			<span class="text-muted">
				<small>Max 250 characters (including spaces)
					<em></em>
				</small>
			</span>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="160">
			<label for="cta_bunner_primary_url">Primary Button Link:</label>
		</td>
		<td>
			<input type="text" name="cta_bunner_primary_url" id="cta_bunner_primary_url" value="'.$ctaBunnerPrimaryUrl.'" style="width:250px;" />
		</td>
	</tr>
	
	<tr>
		<td valign="top">
			<label for="cta_bunner_primary_button_text">Button Text:</label>
		</td>
		<td>
			<input type="text" name="cta_bunner_primary_button_text" id="cta_bunner_primary_button_text" value="'.$ctaBunnerPrimaryButtonText.'" style="width:250px;" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="160">
			<label for="cta_bunner_secondary_url">Secondary Button Link:</label>
		</td>
		<td>
			<input type="text" name="cta_bunner_secondary_url" id="cta_bunner_secondary_url" value="'.$ctaBunnerSecondaryUrl.'" style="width:250px;" />
		</td>
	</tr>
	
	<tr>
		<td valign="top">
			<label for="cta_bunner_secondary_button_text">Button Text:</label>
		</td>
		<td>
			<input type="text" name="cta_bunner_secondary_button_text" id="cta_bunner_secondary_button_text" value="'.$ctaBunnerSecondaryButtonText.'" style="width:250px;" />
		</td>
	</tr>
</table>';