<main class="main-content bgc-grey-100">
               <div id="mainContent">
			   <?=get_flashdata();?>
			          <h4 class="c-grey-900 mT-10 mB-30">Dashboard</h4>
                  <div class="row gap-20 masonry pos-r">
                     <div class="masonry-sizer col-md-6"></div>
                     <div class="masonry-item w-100">
                        <div class="row gap-20">
                           <div class="col-md-3 text-center">
                              <a href="<?php echo base_url();?>admin/advertiser">
                                    <div class="layers bd bgc-white p-20">
                              
                                    <div class="layer w-100 mB-20">
                                    
                                          <h6 class="lh-1">Total Advertisers</h6>

                                    </div>
                                    <div class="layer w-100">
                                          <div class="peers ai-sb fxw-nw">
                                          <!--<div class="peer peer-greed"><span id="sparklinedash3"></span></div>-->
                                          <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500"><?php echo $total_advertisers; ?></span></div>
                                          </div>
                                    </div>
                                    </div>
                              </a>
                           </div>
                           <div class=" col-md-3 text-center">
                           <a href="<?php echo base_url();?>admin/publisher/listing">
                              <div class="layers bd bgc-white p-20">
                                 <div class="layer w-100 mB-20">
                                    <h6 class="lh-1">Total Publishers</h6>
                                 </div>
                                 <div class="layer w-100">
                                    <div class="peers ai-sb fxw-nw">
                                       <!--<div class="peer peer-greed"><span id="sparklinedash4"></span></div>-->
                                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500"><?php echo $total_publishers; ?></span></div>
                                    </div>
                                 </div>
                              </div>
                        </a>
                           </div>
                           <div class="col-md-3 text-center">
                              <div class="layers bd bgc-white p-20">
                                 <div class="layer w-100 mB-20">
                                    <h6 class="lh-1">Total Income</h6>
                                 </div>
                                 <div class="layer w-100">
                                    <div class="peers ai-sb fxw-nw">
                                       <!--<div class="peer peer-greed"><span id="sparklinedash3"></span></div>-->
                                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">$ 6000</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" col-md-3 text-center">
                              <div class="layers bd bgc-white p-20">
                                 <div class="layer w-100 mB-20">
                                    <h6 class="lh-1">Total Running Campaigns</h6>
                                 </div>
                                 <div class="layer w-100">
                                    <div class="peers ai-sb fxw-nw">
                                       <!--<div class="peer peer-greed"><span id="sparklinedash4"></span></div>-->
                                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500"><?php echo $total_runningcampaigns; ?></span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
						   <div class="masonry-item col-md-6">
							<div class="bgc-white p-20 bd">
							<p class="my_count">Count</p>
								<h5 class="c-grey-900">Total Monthly Income</h5>
								<div class="mT-30">
									<canvas id="bar-chart" height="220"></canvas>
								</div>
							</div>
							</div>
							<div class="masonry-item col-md-6">
							<div class="bgc-white p-20 bd">
								<h5 class="c-grey-900">Total Campaigns</h5>
								<div class="mT-30">
								<p class="my_count">Count</p>
									<canvas id="bar-chart_1" height="220"></canvas>
								</div>
							</div>
							</div>
                        </div>
                     </div>
                  </div>
               </div>
            </main>
            <script>
		$(document).ready(function(){
		$("#contactInfo_next").click(function(){
			$(".info-tab-contianer:nth-child(1) p").css("border-bottom", "none");
			$(".info-tab-contianer:nth-child(2) p").css("border-bottom", "2px solid #2196f3");
			$(".alpha_num_a").hide();
			$(".alpha_num_b").show();
		});
			$("#companyInfo_back").click(function(){
				$(".info-tab-contianer:nth-child(2) p").css("border-bottom", "none");
				$(".info-tab-contianer:nth-child(1) p").css("border-bottom", "2px solid #2196f3");
				$(".alpha_num_b").hide();
				$(".alpha_num_a").show();
			});
		});
	</script>   