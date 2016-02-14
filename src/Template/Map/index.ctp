<style>
	.gr-display, .gr-label{
		line-height: 2.3em;
	}
	.gr-icon-small{
		width:2em; 
		height:2em;
		margin-top: .3em;
		margin-bottom: .3em;
		margin-right: .3em;
	}
	.row{
		border: 1px solid black;
	}
	.row .row{
		border-right: 0px;
		border-top: 0px;
	}
	.row .row:last-child{
		border-bottom:0;
	}
	.gr-outside{
		margin-top: 1em;
	}
	.row.no-pad {
		margin-right:0;
		margin-left:0;
	}
	.row.no-pad > [class*='col-'] {
		padding-right:0;
		padding-left:0;
		text-indent: .5em;
	}
	.gr-outside{
		/*padding-right:0;*/
	}

</style>

<?php //debug($display);?>

<?php
//foreach ($display as $location => $directions) {
//	debug($directions);
//}
//exit;
?>

<?php foreach ($display as $location => $directions) { ?>
	<div class='row no-pad gr-outside'>
		<div class='col-xs-3 gr-label'><?= $location ?></div>
		<div class='col-xs-9 gr-box'>
	<?php foreach ($directions['sd'] as $direction => $types) { ?>
				<div class='row no-pad'>
					<div class='col-xs-2 gr-label'><?= $direction ?></div>
					<div class='col-xs-10 gr-box'>
		<?php foreach ($types as $type => $items) { ?>
							<div class='row no-pad'>
								<div class='col-xs-2 gr-label'><?= $type ?></div>
								<div class='col-xs-10 gr-box'>
			<?php foreach ($items as $item => $grades) { ?>
										<div class='row no-pad'>
											<div class='col-xs-5 gr-label'><?= $item ?></div>
											<div class='col-xs-7 gr-box'>
												<?php
												$idisplay = null;
												$gdisplay = null;
												foreach ($grades as $grade) {
													$idisplay .= "<img src='/files/supplyanddemand/" . $grade['icon'] . ".png' class='gr-icon-small'>";
													$gdisplay .= (!$gdisplay ? $grade['grade'] : " / " . $grade['grade']);
												}
												?>									
												<div class='row no-pad'>
													<div class='col-xs-6 gr-display'><?= $idisplay; ?></div>
													<div class='col-xs-6 gr-display'><?= $gdisplay; ?></div>
												</div>
											</div>
										</div>
			<?php } ?>
								</div>
							</div>
		<?php } ?>
					</div>
				</div>
	<?php } ?>
		</div>
	</div>
<?php } ?>

