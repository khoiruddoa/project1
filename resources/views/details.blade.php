@extends('layouts.main')

@section('container')
    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
        <div class="flex flex-col lg:flex-col justify-end items-center ">
            <div class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                Bank Sampah Faida Cendikia
            </div>

            <div class="flex flex-col gap-10 items-center">

                @include('saldo')

                <div
                    class="w-full mb-0 p-4 text-left bg-white border border-gray-200 rounded-2xl shadow sm:p-8 dark:bg-gray-800 flex flex-col gap-4">
                    <div class="flex flex-row gap-2">
                        <div> <img src="{{ asset('public/img/documents.png') }}" alt="" class="w-20 h-20"></div>
                        <div>
                            <div class="">
                                <h5 class="mb-2 text-1xl font-bold font-mono text-gray-900 dark:text-white">Detail Transaksi
                                    Anda</h5>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-col gap-2 max-h-60 overflow-y-auto">

                        <div
                            class="bg-[#15C972] hover:bg-[#016b38] font-mono text-xs md:text-md font-bold p-2 w-full text-white rounded-xl">
                            <div>
                                Transaksi Tanggal: {{ $transaction->created_at->format('d-m-Y') }}</div>
                            @php
                                $total = 0;
                            @endphp
                            @if(count($details) > 0)
                            <table class="border-collapse w-full">
                                <thead>
                                  <tr class="bg-gray-800 text-white">
                                    <th class="py-2 px-4 border border-gray-400 font-bold uppercase text-sm">Kategori</th>
                                    <th class="py-2 px-4 border border-gray-400 font-bold uppercase text-sm">Jumlah Barang</th>
                                    <th class="py-2 px-4 border border-gray-400 font-bold uppercase text-sm">Harga</th>
                                    <th class="py-2 px-4 border border-gray-400 font-bold uppercase text-sm">Jumlah Harga</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($details as $detail)
                                  <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border border-gray-400">{{ preg_replace('/\d+\./', '', $detail->category->category_name) }}</td>
                                    <td class="py-2 px-4 border border-gray-400">{{ $detail->qty }} {{ $detail->category->uom }}</td>
                                    <td class="py-2 px-4 border border-gray-400">@currency($detail->price)</td>
                                    <td class="py-2 px-4 border border-gray-400">@currency($detail->price * $detail->qty)</td>
                                    @php
                                        $total += $detail->price * $detail->qty; // tambahkan nilai baru ke total
                                    @endphp
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              
                            @endif
                            
                            @if (empty($transaction->information))
                                <div class="mt-2">Total : @currency($total)</div>
                                @php
                                    $jumlah = $detail->qty * $detail->price;
                                @endphp


                                @if ($jumlah - $transaction->pay_total > 0)
                                    <div>
                                        Jasa Angkut @currency($jumlah - $transaction->pay_total)
                                    </div>
                                    <div>
                                        Pengangkut : @foreach($pengangkuts as $pengangkut)
                                        {{$pengangkut->user->name}},
                                        @endforeach
                                    </div>
                                @endif
                            @else
                               
                                    <div>Pendapatan jasa angkut sebesar @currency($transaction->pay_total)</div>
                               
                            @endif
                        </div>
                    </div>



                </div>


            </div>

        </div>
    </div>
@endsection
