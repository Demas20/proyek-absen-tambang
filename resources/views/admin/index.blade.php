@extends('admin.master')
@section('content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Welcome to Mega Able</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
      <div class="pcoded-inner-content">
          <!-- Main-body start -->
          <div class="main-body">
              <div class="page-wrapper">
                  <!-- Page-body start -->
                  <div class="page-body">
                      <div class="row">
                          <!-- task, page, download counter  start -->
                          <div class="col-xl-3 col-md-6">
                              <div class="card">
                                  <div class="card-block">
                                      <div class="row align-items-center">
                                          <div class="col-8">
                                              <h4 class="text-c-purple">$30200</h4>
                                              <h6 class="text-muted m-b-0">Jumlah User</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <i class="fa fa-user f-28"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer bg-c-purple">
                                      <div class="row align-items-center">
                                          <div class="col-9">
                                              <p class="text-white m-b-0">% change</p>
                                          </div>
                                          <div class="col-3 text-right">
                                              <i class="fa fa-line-chart text-white f-16"></i>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-3 col-md-6">
                              <div class="card">
                                  <div class="card-block">
                                      <div class="row align-items-center">
                                          <div class="col-8">
                                              <h4 class="text-c-green">290+</h4>
                                              <h6 class="text-muted m-b-0">Jumlah Unit</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <i class="fa fa-file-text-o f-28"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer bg-c-green">
                                      <div class="row align-items-center">
                                          <div class="col-9">
                                              <p class="text-white m-b-0">% change</p>
                                          </div>
                                          <div class="col-3 text-right">
                                              <i class="fa fa-line-chart text-white f-16"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-3 col-md-6">
                              <div class="card">
                                  <div class="card-block">
                                      <div class="row align-items-center">
                                          <div class="col-8">
                                              <h4 class="text-c-red">145</h4>
                                              <h6 class="text-muted m-b-0">Jumlah Karyawan</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <i class="fa fa-calendar-check-o f-28"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer bg-c-red">
                                      <div class="row align-items-center">
                                          <div class="col-9">
                                              <p class="text-white m-b-0">% change</p>
                                          </div>
                                          <div class="col-3 text-right">
                                              <i class="fa fa-line-chart text-white f-16"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-3 col-md-6">
                              <div class="card">
                                  <div class="card-block">
                                      <div class="row align-items-center">
                                          <div class="col-8">
                                              <h4 class="text-c-blue">500</h4>
                                              <h6 class="text-muted m-b-0">Jumlah Divisi</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <i class="fa fa-hand-o-down f-28"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer bg-c-blue">
                                      <div class="row align-items-center">
                                          <div class="col-9">
                                              <p class="text-white m-b-0">% change</p>
                                          </div>
                                          <div class="col-3 text-right">
                                              <i class="fa fa-line-chart text-white f-16"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                          <!-- task, page, download counter  end -->
                        
                        <div class="col-xl-6 col-md-8">
                            <div class="card">
                                <div class="card-header" style="background-color: #58E6Fb">
                                    Absensi Team Unit Hari ini
                                    <small class="d-block">7 August 2023</small>
                                </div>
                                <div class="card-body">
                                    <div class="row status-row">
                                        <div class="col text-green">
                                            <div>61</div>
                                            <div class="status-label">Hadir</div>
                                        </div>
                                        <div class="col text-orange">
                                            <div>50</div>
                                            <div class="status-label">Sakit</div>
                                        </div>
                                        <div class="col text-blue">
                                            <div>84</div>
                                            <div class="status-label">Izin</div>
                                        </div>
                                        <div class="col text-red">
                                            <div>779</div>
                                            <div class="status-label">Alfa</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-8">
                            <div class="card">
                                <div class="card-header" style="background-color: #FA1D1D; color: wheat">
                                    Absensi Karyawan Hari Ini
                                    <small class="d-block">7 August 2023</small>
                                </div>
                                <div class="card-body">
                                    <div class="row status-row">
                                        <div class="col text-green">
                                            <div>61</div>
                                            <div class="status-label">Hadir</div>
                                        </div>
                                        <div class="col text-orange">
                                            <div>50</div>
                                            <div class="status-label">Sakit</div>
                                        </div>
                                        <div class="col text-blue">
                                            <div>84</div>
                                            <div class="status-label">Izin</div>
                                        </div>
                                        <div class="col text-red">
                                            <div>779</div>
                                            <div class="status-label">Alfa</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                      
                  </div>
                  <!-- Page-body end -->
              </div>
              <div id="styleSelector"> </div>
          </div>
      </div>
@endsection