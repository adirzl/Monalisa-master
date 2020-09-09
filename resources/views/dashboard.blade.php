@extends('layouts.admin.dashboard')

@section('content')
<div class="container">

   <div id="ecommerce-offer">

      <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
               <div class="icon">
                  <center><img src="../../../app-assets/images/logo/baseline.png" style="width:35%; height:35%; margin-top:10%"></center>
                  <!-- <i class="ion ion-bag"></i> -->
               </div>
               <div class="inner">
                  <center>
                     <h3>{{ number_format($countBaseline) }}</h3>

                     <p>Baseline</p>
                  </center>
               </div>
               <a href="{{ route('baseline.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <div class="icon">
                  <center><img src="../../../app-assets/images/logo/pelaksana.png" style="width:35%; height:35%; margin-top:10%"></center>
                  <!-- <i class="ion ion-stats-bars"></i> -->
               </div>
               <div class="inner">
                  <center>
                     <h3>{{ number_format($countPelaksana) }}</h3>
                     <p>Pelaksana</p>
                  </center>
               </div>
               <a href="{{ route('pelaksana.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
               <div class="icon">
                  <center><img src="../../../app-assets/images/logo/laporan_mingguan.png" style="width:35%; height:35%; margin-top:10%"></center>
                  <!-- <i class="ion ion-person-add"></i> -->
               </div>
               <div class="inner">
                  <center>
                     <h3>{{ number_format($countWeeklyReport) }}</h3>

                     <p>Laporan Mingguan</p>
                  </center>
               </div>
               <a href="{{ route('projects.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
               <div class="icon">
                  <center><img src="../../../app-assets/images/logo/area.png" style="width:35%; height:35%; margin-top:10%"></center>
                  <!-- <i class="ion ion-pie-graph"></i> -->
               </div>
               <div class="inner">
                  <center>
                     <h3>{{ number_format($countArea) }}</h3>

                     <p>Kelurahan</p>
                  </center>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
      </div>

   </div>
   @if(in_array(auth()->user()->roles->first()->id, [ env('SUPERADMIN_ID'), env('ADMIN_ID') ]))
   <!-- Page Length Options -->

   <!-- /.col -->
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Rekap Progres Baseline</h3><br>
            <h6 class="card-title">Rekap per-provinsi</h6>

            <div class="card-tools">
               <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
               </ul>
            </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body p-0">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>Provinsi</th>
                     <th>Jml Baseline</th>
                     <th>Jml Un-Assign</th>
                     <th>0 %</th>
                     <th>50 %</th>
                     <th>100 %</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($area as $item)
                  <tr>
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->countBaseline }}</td>
                     <td>{{ $item->unAssignBaseline }}</td>
                     <td>{{ $item->p0 }}</td>
                     <td>{{ $item->p50 }}</td>
                     <td>{{ $item->p100 }}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
      <!-- /.card -->
   </div>
   <!-- /.col -->

   @else

   <!--work collections start-->
   <h4 class="header">Detail {{ isset($area->name) ? $area->name : '-' }}</h4>
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title"><i class="fas fa-briefcase"></i>&nbsp;Projects <br></h3><br>
            <p>Informasi Singkat</p>
         </div>
         <!-- /.card-header -->
         <div class="card-body p-0">
            <table class="table">
               <tbody>
                  <tr>
                     <td>Kabupaten Kota :</td>
                     <td><span class="badge bg-info">{{ isset($area->name) ? $area->name : '-' }}</span></td>
                  </tr>
                  <tr>
                     <td>Status Pengadaan :</td>
                     <td><span class="badge bg-danger">{{ $status_proses[1] }} = {{ isset($baseline) ? $baseline->where('pengadaan', 1)->count() : 0 }} | {{ $status_proses[2] }} = {{ isset($baseline) ? $baseline->where('pengadaan', 2)->count() : 0 }} | {{ $status_proses[3] }} = {{ isset($baseline) ? $baseline->where('pengadaan', 3)->count() : 0 }}</span></td>
                  </tr>
                  <tr>
                     <td>Status Pelaksanaan :</td>
                     <td><span class="badge bg-success">{{ $status_proses[1] }} = {{ isset($baseline) ? $baseline->where('pelaksanaan', 1)->count() : 0 }} | {{ $status_proses[2] }} = {{ isset($baseline) ? $baseline->where('pelaksanaan', 2)->count() : 0 }} | {{ $status_proses[3] }} = {{ isset($baseline) ? $baseline->where('pelaksanaan', 3)->count() : 0 }}</span></td>
                  </tr>
                  <tr>
                     <td>Jumlah TS +-50% :</td>
                     <td><span class="badge bg-warning">{{ isset($baseline) ? $baseline->sum('jml_ts_50') : 0 }} Unit</span></td>
                  </tr>
                  <tr>
                     <td>Akumulasi Jumlah TS :</td>
                     <td><span class="badge bg-warning">{{ isset($baseline) ? $baseline->sum('jml_ts_akumulasi') :0 }} Unit</span></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
   </div>
   @endif
</div>
@endsection