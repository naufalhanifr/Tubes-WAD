@extends('admin.templates.default')

@section('content')
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Pendapatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($data['pendapatan']) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Lokasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['lokasi'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Spot</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['spot'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kendaraan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['kendaraan'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['transaksi'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['user'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">5 Transaksi Terakhir</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <tr>
                          <th>#</th>
                          <th>Kode</th>
                          <th>Nama</th>
                          <th>Total Bayar</th>
                          <th>Status</th>
                      </tr>
                      @foreach ($transaksi as $item)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->kode }}</td>
                              <td>{{ $item->user->name }}</td>
                              <td>{{number_format($item->total_bayar) }}</td>
                              <td>
                                @if ($item->status_id == 1)
                                <span class="badge badge-primary">BOOKING</span>
                                @elseif($item->status_id == 2)
                                    <span class="badge badge-success">PEMBAYARAN SUCCESS</span>
                                @elseif($item->status_id == 3)
                                    <span class="badge badge-secondary">PARKIR SELESAI</span>
                                @elseif ($item->status_id == 4)
                                    <span class="badge badge-warning">PERINGATAN</span>
                                @elseif ($item->status_id == 5)
                                    <span class="badge badge-danger">GAGAL</span>
                                @elseif ($item->status_id == 6)
                                    <span class="badge badge-info">MENUNGGU VALIDASI</span>
                                @endif
                              </td>
                          </tr>
                      @endforeach
                  </table>
              </div>
          </div>
      </div>
  </div>

  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div
              class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                  <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Success
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Pending
                  </span>
                  <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Failed
                  </span>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection

@push('afterScripts')
<!-- Page level plugins -->
<script src="{{ asset('assets/sbadmin/vendor/chart.js/Chart.min.js') }}"></script>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Success", "Pending", "Failed"],
        datasets: [{
        data: [{{ $pie['success'] }}, {{ $pie['pending'] }}, {{ $pie['failed'] }}],
        backgroundColor: ['#1cc88a', '#f6c23e', '#e74a3b'],
        hoverBackgroundColor: ['#1cc88a', '#f6c23e', '#e74a3b'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        },
        legend: {
        display: false
        },
        cutoutPercentage: 80,
    },
    });

</script>
@endpush