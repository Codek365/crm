<?php echo $header; ?>
<?php 
$side_left = "9";
$side_right = "3";
 ?>
<div class="page-container margin-top-10">
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content margin-top-10" style="background-color: #E9EAED">
		<div class="container-fluid margin-top-20">
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-xs-<?=$side_left?> col-sm-<?=$side_left?> col-md-<?=$side_left?> col-lg-<?=$side_left?>" style="border-right: 1px solid #ddd;min-height: 550px">
					<div class="row margin-top-20">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<!-- BEGIN PAGE BREADCRUMB -->
							<ul class="page-breadcrumb breadcrumb margin-top-10">
								<?php
									echo '<li>';
												echo '<a  class="text-capitalize" href="'.base_url().'">Home</a>';
									echo "</li>";
									if ($this->uri->segment(1)) {
										echo "<li>";
													echo '<a class="active text-capitalize" href="'.base_url().$this->uri->segment(1).'">'.$this->uri->segment(1).'</a>';
										echo "</li>";
									}
									if ($this->uri->segment(2)) {
										echo "<li>";
													echo '<a class="active text-capitalize" href="'.base_url().$this->uri->segment(1).'/'.$this->uri->segment(2).'">'.$this->uri->segment(2).'</a>';
										echo "</li>";
									}
								?>
							</ul>
							<!-- END PAGE BREADCRUMB -->
						</div>
					</div>
					<div id="content" class="scroller" style="height: 480px;" data-always-visible="1" data-rail-visible="0" data-handle-color="#FF0000">
						<?php echo $main_content; ?>
					</div>
				</div>
				
				<div class="col-xs-<?=$side_right?> col-sm-<?=$side_right?> col-md-<?=$side_right?> col-lg-<?=$side_right?>" >
					<div class="row margin-top-10"  >
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " >
							<div class="portlet light fixedt" >
								<div class="portlet-title tabbable-line">
									<div class="caption caption-md">										
										<span class="caption-subject theme-font bold uppercase">Feeds</span>
										<i class="icon-globe font-green-sharp fa-spin fa-5x"></i>
									</div>									
								</div>
								<div class="portlet-body">
									<!--BEGIN TABS-->
									<div class="tab-content">
										<?php echo Modules::run('timeline/timeline/tab1'); ?>
										<?php echo Modules::run('timeline/timeline/tab2'); ?>
									</div>
									<!--END TABS-->
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT INNER-->
			</div>
		</div>
		<!-- END PAGE CONTENT -->
	</div>
	<style type="text/css">
		.fixedt {
			position: fixed !important;
			top: 9%;
			margin-right: 0px;
			z-index: 99;
			padding: 0 !important;
			    width: 320px;
		}
	</style>
