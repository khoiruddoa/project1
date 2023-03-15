<div
                    class="lg:w-[500px] w-[300px] p-6 bg-white border border-gray-200 rounded-lg shadow flex md:flex-row justify-between flex-row-reverse gap-10">
                    <div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 font-mono ">Saldo Anda : </p>
                        <p class="mb-6 font-extrabold text-gray-700 lg:text-5xl text-xl  font-mono ">@currency($user->transactions->sum('pay_total'))</p>
                        <a href="#" class=" text-white bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Tukar Emas</a>

                    </div>
                    <div>
                        <img class="w-16 h-16 rounded-full" src="{{ asset('img/dumy.png')}}" alt="user photo">
                        <p class="mb-3 font-extrabold text-center text-gray-700 lg:text-xl text-md  font-mono ">
                            {{ $user->name }}</p>
                    </div>
                </div>
                <div>
                    <div class="flex flex-row lg:gap-10 gap-2 font-mono">

                        <a href="{{route('konversi')}}"
                            class="flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                            <div><img src="{{ asset('img/gold.png')}}" alt="" class="w-10 h-10"></div>
                            <div>Konversi</div>
                        </a>
                        <a href="{{route('transaction')}}"
                            class="flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[20px] py-[10px] bg-white rounded-[35px] shadow-lg">
                            <div><img src="{{ asset('img/garbage.png')}}" alt="" class="w-10 h-10"></div>
                            <div>Transaksi</div>
                        </a>
                        <a href="{{route('dashboard')}}"
                            class="flex flex-col justify-center items-center hover:shadow-2xl hover:bg-blue-600 border-[2px] xl:px-[65px] xl:py-[44px] lg:px-[45px] lg:py-[24px] px-[30px] py-[10px] bg-white rounded-[35px] shadow-lg">
                            <div><img src="{{ asset('img/schedule.png')}}" alt="" class="w-10 h-10"></div>
                            <div> Jadwal</div>
                        </a>

                    </div>
                </div>