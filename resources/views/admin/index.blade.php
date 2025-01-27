@extends('admin.master')
@section('title','Dashboard')
@section('content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Welcome to {{Auth::user()->name}}</p>
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
                                              <h4 class="text-c-purple">{{$operator}}</h4>
                                              <h6 class="text-muted m-b-0">Jumlah Operator</h6>
                                          </div>
                                          <div class="col-4 text-right">
                                              <i class="fa fa-user f-28"></i>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer bg-c-purple">
                                      <div class="row align-items-center">
                                          <div class="col-9">
                                              <p class="text-white m-b-0">Lihat Selengkapnya</p>
                                          </div>
                                          <div class="col-3 text-right">
                                              <i class="fa fa-right-arrows text-white f-16"></i>
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
                                              <h4 class="text-c-green">{{$unitPopulasi}}</h4>
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
                                              <p class="text-white m-b-0">Lihat Detail</p>
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
                                    Absensi Team Operator Hari ini
                                    <small class="d-block">{{ now()->format('d F Y') }}</small>
                                </div>
                                <div class="card-body">
                                    <div class="row status-row">
                                        <div class="col text-green">
                                            <div>{{ $dfit }}</div>
                                            <div class="status-label">Dfit</div>
                                        </div>
                                        <div class="col text-orange">
                                            <div>{{ $sakit }}</div>
                                            <div class="status-label">Sakit</div>
                                        </div>
                                        <div class="col text-blue">
                                            <div>{{ $stb }}</div>
                                            <div class="status-label">Stb</div>
                                        </div>
                                        <div class="col text-red">
                                            <div>{{ $mp_exp }}</div>
                                            <div class="status-label">Alfa</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-8">
                            <div class="card">
                                <div class="card-header" style="background-color: #58E6Fb">
                                    Unit Running Hari Ini
                                    <small class="d-block">{{ now()->format('d F Y') }}</small>
                                </div>
                                <div class="card-body">
                                    <div class="row status-row">
                                        <div class="col text-green">
                                            <div>{{ $unitRunning }}</div>
                                            <div class="status-label">Berjalan</div>
                                        </div>
                                        <div class="col text-green">
                                            <div>{{ $breakdown }}</div>
                                            <div class="status-label">Breakdown</div>
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
