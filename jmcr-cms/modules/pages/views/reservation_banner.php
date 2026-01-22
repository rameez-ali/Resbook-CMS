<?php

/** Page Module - Reservation Banner Tab */

$tabReservationBannerContent ='<table width="100%" border="0" cellspacing="0" cellpadding="6">
	<tr>
		<td colspan="2">
			<h2 class="form-section-heading">Reservation Banner</h2>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="160">
			<label for="reservation_banner_title">Title:</label>
		</td>
		<td>
			<input type="text" name="reservation_banner_title" id="reservation_banner_title" value="'.$reservationBannerTitle.'" style="width:550px;" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="160">
			<label for="reservation_banner_button_text">Button Text:</label>
		</td>
		<td>
			<input type="text" name="reservation_banner_button_text" id="reservation_banner_button_text" value="'.$reservationBannerButtonText.'" style="width:250px;" />
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="160">
			<label for="reservation_banner_button_url">Button Link:</label>
		</td>
		<td>
			<input type="text" name="reservation_banner_button_url" id="reservation_banner_button_url" value="'.$reservationBannerButtonUrl.'" style="width:350px;" />
			<br>
			<span class="text-muted">
				<small>Enter internal path (e.g., /reserve) or full external URL (e.g., https://example.com)
				</small>
			</span>
		</td>
	</tr>
</table>';
