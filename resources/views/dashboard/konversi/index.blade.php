@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Tabel Konversi</h1>
            <div class="m-4">
           
            </div>

        </div>

        
    </div>
    <div class="w-full mt-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <li class="mr-2">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                    aria-selected="true"
                    class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Pengajuan</button>
            </li>
            <li class="mr-2">
                <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                    aria-controls="services" aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Disetujui</button>
            </li>
            <li class="mr-2">
                <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab"
                    aria-controls="statistics" aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Berhasil</button>
            </li>
        </ul>
        <div id="defaultTabContent">
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                aria-labelledby="about-tab">
                <div class="w-full mt-6">
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white">
                            <thead class="bg-gray-800 text-white w-full">
                                <tr>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama
                                    </th>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Saldo
                                    </th>
                                    <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Status Transaksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                               @foreach ($convertions as $convertion)
                                    <tr>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{$convertion->user->name}}</td>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($convertion->pay_total)</td>
                                        <td class="sm:text-left py-3 px-4">
                                        </div>
                                        <span class="inline-flex items-center bg-green-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                                            Menunggu Persetujuan
                                        </span>
                                    </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel"
                aria-labelledby="services-tab">
                <div class="w-full mt-6">
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white">
                            <thead class="bg-gray-800 text-white w-full">
                                <tr>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama
                                    </th>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Saldo
                                    </th>
                                    <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Status Transaksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                               @foreach ($convertions as $convertion)
                                    <tr>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{$convertion->user->name}}</td>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($convertion->pay_total)</td>
                                        <td class="sm:text-left py-3 px-4">
                                            <div class="flex flex-row items-center">
                                        <div>
                                        <span class="inline-flex items-center bg-blue-100 text-green-800 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                            <span class="w-2 h-2 mr-1 bg-blue-500 rounded-full"></span>
                                            Disetujui
                                        </span>
                                    </div>

<!-- Modal toggle -->
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Bayar
  </button>
  
  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
      <div class="relative w-full h-full max-w-md md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Pembayaran</h3>
                  <form class="space-y-6" action="{{route('store_konversi',['id'=> $convertion->id])}}" method="post">
                    @csrf
                      <div>
                          <label for="bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bayar</label>
                          <div x-data="{ number: null }">
                            <input type="number" name="pay_total" x-model="number" x-on:input="number = parseFloat($event.target.value)" x-on:blur="$event.target.value = number.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})"
                    
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required>
                    </div>
                          
                      </div>
                      <div>
                          <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah emas</label>
                          <input type="number" step="0.001" name="information" id="information"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                      </div>
                      <input type="hidden" name="pay_status" value="3">
                      
                      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bayar</button>
                      
                  </form>
              </div>
          </div>
      </div>
  </div> 
            </div>  
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel"
                aria-labelledby="statistics-tab">
                <div class="w-full mt-6">
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white">
                            <thead class="  w-1/2">
                                <tr>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                        Nama</th>

                                    <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                
                                    <tr>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4"></td>

                                        <td class="sm:text-left py-3 px-4">
                                            <a href=""
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                        </td>
                                    </tr>
                              
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
