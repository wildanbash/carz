<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- table card-1 start -->
            <div class="col-md-12 col-xl-4">
                <!-- widget primary card start -->
                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4><?php $query = $this->db->query('select*from transaksi');
								echo $query->num_rows($query)?></h4>
                            <h6>Transaksi</h6>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>
            <!-- table card-1 end -->
            <!-- table card-2 start -->
            <div class="col-md-12 col-xl-4">
                <!-- widget-success-card start -->
                <div class="card flat-card widget-purple-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="col-sm-9">
                            <h4><?php $query = $this->db->query('select*from user');
								echo $query->num_rows($query)?></h4>
                            <h6>User</h6>
                        </div>
                    </div>
                </div>
                <!-- widget-success-card end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>