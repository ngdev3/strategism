

<main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container-fluid">
                        <h4 class="c-grey-900 mT-10 mB-30">View List</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                                    <!--<h4 class="c-grey-900 mB-20">Simple Table</h4>-->
                                    <a href="<?=base_url()?>master/clients/" id="back-btn" class="btn cur-p btn-primary pull-right">Back</a>
                                    <br><br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="table_bg" scope="col">Template Name</th>
                                                <td scope="col"><?php echo $result->template_name;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="col">Content</th>
                                                <td scope="col"><?php echo $result->content;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="col">Heading</th>
                                                <td scope="col"><?php echo $result->heading;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="col">App ID</th>
                                                <td scope="col"><?php echo $result->app_id;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="col">Big Picture URL</th>
                                                <td scope="col"><?php echo $result->big_picture;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="col">Time</th>
                                                <td scope="col"><?php echo $result->time;?></td>
                                            </tr>
                                            <tr>
                                                <th class="table_bg" scope="col">API Key</th>
                                                <td scope="col"><?php echo $result->api_key;?></td>
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
			