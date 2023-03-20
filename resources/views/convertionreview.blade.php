@extends('layouts.main')

@section('container')
    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
        <div class="flex flex-col lg:flex-col justify-end items-center ">
            <div class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                Bank Sampah Faida Cendikia
            </div>

            <div
                class="w-full mb-0 p-4 text-left bg-white border border-gray-200 rounded-2xl shadow sm:p-8 dark:bg-gray-800 flex flex-col gap-4">
                <div class="flex flex-col gap-10 items-center">
                    <div> <img src="/img/kitchen-scales.png" alt="" class="w-20 h-20"></div>
                    <div>
                        <div class="">
                            <h5 class="mb-2 text-1xl font-bold font-mono text-gray-900 dark:text-white">Transaksi
                                Konversi Nasabah</h5>
                        </div>
                    </div>

                    <div x-data="{ allChecked: false }" class="">
                        <form action="{{ route('convertion_review_store') }}" method="post">
                            @csrf
                            <div class="flex flex-row items-center justify-center gap-2">
                                <div
                                    class="border border-gray-300 p-2 rounded-lg flex items-center bg-[#15C972] hover:bg-[#016b38]">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-green-500" x-model="allChecked"
                                        x-on:click="allChecked ? uncheckAll() : checkAll()">
                                    <div class="ml-3 text-gray-700 font-mono text-white">
                                        Pilih Semua
                                    </div>

                                </div>
                                <div>
                                    <button type="submit" id="submit-btn" name="action" value="approve" disabled
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Setujui
                                    </button>
                                </div>
                                <div>
                                    <button type="submit" name="action" value="reject"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Tolak
                                    </button>
                                </div>
                            </div>

                            @foreach ($convertions as $index => $item)
                            
                                <div
                                    class="border border-gray-300 p-4 rounded-lg flex items-center mb-4 bg-[#15C972] hover:bg-[#016b38]">
                                    <input type="checkbox" name="id[]" value="{{$item->id}}"
                                        class="form-checkbox h-5 w-5 text-green-500"
                                        x-model="checkedItems[{{ $index }}]">
                                        <div>
                                    <div class="ml-3 text-gray-700 font-mono text-white">
                                         Nama : {{ $item->user->name }}
                                    </div>
                                   
                                    <div class="ml-3 text-gray-700 font-mono text-white">
                                      
                                    </div>
                                    
                                       
                                        <div class="ml-3 text-gray-700 font-mono text-white">
                                            Konversi senilai : @currency($item->pay_total)
                                       
                                    </div>
                                        
                                   
                                </div>
                                </div>
                            @endforeach


                        </form>

                    </div>

                    <script>
                        const checkedItems = @json(array_fill(0, count($convertions), false));
                        const inputs = document.querySelectorAll('.form-checkbox');
                        const submitBtn = document.getElementById('submit-btn');

                        inputs.forEach(input => {
                            input.addEventListener('input', () => {
                                const hasValue = Array.from(inputs).some(input => input.value);
                                submitBtn.disabled = !hasValue;
                            });
                        });
                        

                        function checkAll() {
                            checkedItems.forEach((item, i) => {
                                checkedItems[i] = true;
                            });
                        }

                        function uncheckAll() {
                            checkedItems.forEach((item, i) => {
                                checkedItems[i] = false;
                            });
                        }
                    </script>


                </div>
            </div>


        </div>
    @endsection
