

<main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <h4 class="c-grey-900 mT-10 mB-30">View List</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                    <!--<h4 class="c-grey-900 mB-20">Simple Table</h4>-->
                                    <a href="<?=base_url()?>master/job_type/" id="back-btn" class="btn cur-p btn-primary pull-right">Back</a>
                                    <br><br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="table_bg" scope="col">Job Type</th>
                                                <td scope="col"><?php echo $result->job_type;?></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th  class="table_bg" scope="row">Status</th>
                                                <td><?php echo $result->status;?></td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
			