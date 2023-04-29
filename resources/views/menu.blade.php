                @extends('layouts.main')

                @section('container')
                    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
                        <div class="flex flex-col lg:flex-col justify-end items-center ">
                            <div
                                class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                                Bank Sampah Faida Cendikia
                            </div>
                            <div class="flex items-center mt-10">
                                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                    <div>
                                        <a href="{{ route('dashboard_review') }}"
                                            class="w-40 h-32 flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                                            <div><img src="{{ asset('/public/img/dashboard.png') }}" alt="" class="w-10 h-10">
                                            </div>
                                            <div>Dashboard</div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('transaction_review') }}"
                                            class="w-40 h-32 flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                                            <div><img src="{{ asset('public/img/kitchen-scales.png') }}" alt=""
                                                    class="w-10 h-10"></div>
                                            <div>Penimbangan</div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('convertion_review') }}"
                                            class="w-40 h-32 flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[30px] py-[10px] bg-white rounded-[35px] shadow-lg">
                                            <div><img src="{{ asset('/public/img/exchange-money.png') }}" alt=""
                                                    class="w-10 h-10"></div>
                                            <div>Konversi</div>
                                        </a>
                                    </div>

{{-- 
                                    <div>
                                        <a href="{{ route('collector_review') }}"
                                            class="w-40 h-32 flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                                            <div><img src="{{ asset('img/dustbin.png') }}" alt="" class="w-10 h-10">
                                            </div>
                                            <div>Pengepul</div>
                                        </a>
                                    </div> --}}
                                    
                                    <div>
                                        <a href="{{ route('withdraw_review') }}"
                                            class="w-40 h-32 flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                                            <div><img src="{{ asset('/public/img/adjustments.png') }}" alt="" class="w-10 h-10">
                                            </div>
                                            <div>Pencairan Dana</div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('adjust_review') }}"
                                            class="w-40 h-32 flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                                            <div><img src="{{ asset('/public/img/adjustments.png') }}" alt=""
                                                    class="w-10 h-10"></div>
                                            <div>Adjustment</div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('reportreview') }}"
                                            class="w-40 h-32 flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[30px] py-[10px] bg-white rounded-[35px] shadow-lg">
                                            <div><img src="{{ asset('/public/img/schedule.png') }}" alt=""
                                                    class="w-10 h-10"></div>
                                            <div>Laporan</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsection
