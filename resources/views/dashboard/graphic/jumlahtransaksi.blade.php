@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">

        </div>
        <div class="bg-grey-500 text-grey rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Jumlah Transaksi Nasabah Per Bulan</h2>
            <div>
                <canvas id="myChart"></canvas>
                <script>
                    const ctx = document.getElementById('myChart');
                  
                    new Chart(ctx, {
                      type: 'bar',
                      data: {
                        labels: {!! json_encode($months) !!},
                        datasets: [{
                          label: 'Jumlah Transaksi',
                          data: {!! json_encode($totals) !!},
                          borderWidth: 1
                        }]
                      },
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>
              </div>
            
        </div>
       
          

    </div>
@endsection
