<div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Dashboard</h2>
	                                <div>
	                                <!-- <div class="page-header-tools">
	                                    <a class="btn btn-gradient-01" href="#">Add Widget</a>
	                                </div> -->
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <!-- Begin Row -->
                        <div class="row flex-row">
                            <!-- Begin Facebook -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="widget widget-12 has-shadow">
                                    <div class="widget-body">
                                        <div class="media">
                                            <div class="align-self-center ml-5 mr-5">
                                                <i class="ion-person-stalker text-facebook"></i>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="title text-facebook">Total Patient</div>
                                                <div class="number"><?=count($patient);?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Facebook -->
                            <!-- Begin Twitter -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="widget widget-12 has-shadow">
                                    <div class="widget-body">
                                        <div class="media">
                                            <div class="align-self-center ml-5 mr-5">
                                                <i class="ion-social-dropbox text-twitter"></i>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="title text-twitter">Total Services</div>
                                                <div class="number"><?=count($services);?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Twitter -->
                            <!-- Begin Linkedin -->
                            <div class="col-xl-4 col-md-6 col-sm-6">
                                <div class="widget widget-12 has-shadow">
                                    <div class="widget-body">
                                        <div class="media">
                                            <div class="align-self-center ml-5 mr-5">
                                                <i class="ion-medkit text-linkedin"></i>
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="title text-linkedin">Total Admission</div>
                                                <div class="number"><?=count($admission);?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Linkedin -->
                        </div>
                        <!-- End Row -->                                               
                          <?php
                        if($this->session->success){
                        ?>
                        <div class="alert alert-success" role="alert">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <strong><?=$this->session->success;?></strong>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if($this->session->failed){
                        ?>
                        <div class="alert alert-danger" role="alert">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <strong><?=$this->session->failed;?></strong>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="row flex-row">
                            <div class="col-xl-12">
                                <!-- Begin Widget 07 -->
                                <div class="widget widget-07 has-shadow">  
                                  <!-- Begin Widget Header -->
                                    <div class="widget-header bordered d-flex align-items-center">
                                        <h2>Active Patient</h2>                                        
                                    </div>
                                    <!-- End Widget Header -->                                  
                                    <!-- Begin Widget Body -->
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0" id="sorting-table">
                                                <thead>
                                                    <tr>                                                        
                                                        <th>Caseno</th>
                                                        <th>Patient Name</th>
                                                        <th>Service Requested</th>                                                        
                                                        <th><span style="width:100px;">Status</span></th>
                                                        <th><span style="width:100px;">Action</span></th>                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach($active_patient as $item){
                                                        $services=$this->Clinic_model->getAllServicesRendered($item['caseno']);
                                                        $rendered="";
                                                        foreach($services as $serv){
                                                            $rendered .=$serv['service_description']."<br>";
                                                        }
                                                        echo "<tr>";
                                                            echo "<td>$item[caseno]</td>";
                                                            echo "<td>$item[lastname], $item[firstname] $item[middlename]</td>";
                                                            echo "<td>$rendered</td>";
                                                            echo "<td>$item[status]</td>";
                                                            ?>
                                                            <td><a href="<?=base_url('view_billing/'.$item['caseno']);?>" class="btn btn-success btn-sm"><i class="la la-calendar"></i> Billing</a></td>
                                                            <?php
                                                        echo "</tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- End Widget Body -->                                  
                                </div>
                                <!-- End Widget 07 -->
                            </div>
                        </div>                        
                        <!-- End Row -->                                                                    
                    </div>
                    <!-- End Container -->