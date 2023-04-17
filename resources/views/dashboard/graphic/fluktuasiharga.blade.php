@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">

        </div>
        <div class="bg-grey-500 text-grey rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Fluktuasi Harga {{ preg_replace('/\d+\./', '', $categories->category_name) }}</h2>
            <div>
                <canvas id="myChart"></canvas>
                <script>
                    const ctx = document.getElementById('myChart');
                  
                    new Chart(ctx, {
                      type: 'bar',
                      data: {
                        labels: {!! json_encode($months) !!},
                        datasets: [{
                          label: 'Fluktuasi Harga',
                          data: {!! json_encode($priceList) !!},
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
