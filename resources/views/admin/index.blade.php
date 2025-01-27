@extends('admin.master')
@section('title','Dashboard')
@section('content')
<!-- Modal Input Shift -->
<div class="modal fade" id="shiftModal" tabindex="-1" aria-labelledby="shiftModalLabel" aria-hidden="true"
     data-backdrop="static" data-keyboard="false" 
     @if($showModal) style="display:block;" @endif>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shiftModalLabel">Input Shift</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('shift.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="shift">Shift</label>
                        <input type="text" class="form-control" id="shift" name="shift" required>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" class="form-control" id="hari" name="hari" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Shift</button>
                </form>
            </div>
        </div>
    </div>
</div>


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
      <script>
        // Pastikan modal tampil ketika halaman dimuat
        $(document).ready(function() {
            $('#modalShift').modal('show');
        });
    </script>
@endsection
