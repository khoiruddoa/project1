@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Tabel Anggota</h1>
            <div class="m-4">
            @error('name')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('email')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('phone_number')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('address')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('password')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            @error('role')
                <p class="text-red-500 text-lg italic">{{ $message }}</p>
            @enderror
            </div>

        </div>

        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Anggota
            </button>

            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar
                             dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="px-6 py-6 lg:px-4">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Data Nasabah</h3>
                            <form class="space-y-6" action="/dashboard/nasabah" method="POST">
                                @csrf
                                <div class="flex flex-row gap-4">
                                    <div>
                                        <label for="name"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                        <input type="text" name="name" id="name"
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="small-input"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">No.
                                            HP</label>
                                        <input type="number" name="phone_number" id="small-input"
                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>


                                </div>
                                <div class="flex flex-row gap-4">
                                    <div>
                                        <label for="email"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            placeholder="name@company.com" required>
                                    </div>

                                    <div>
                                        <label for="password"
                                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password" placeholder="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                    </div>
                                </div>

                                <label for="address"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea id="address" name="address" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required></textarea>


                                <label for="role"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                <select id="role" name="role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    <option value="1">Nasabah</option>
                                    <option value="2">Pengepul</option>
                                    <option value="3">Admin</option>
                                </select>


                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftarkan</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="w-full mt-10 bg-white border border-gray-200 rounded-lg shadow dark:bg-sidebar
     dark:border-gray-700">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-sidebar
        "
            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <li class="mr-2">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                    aria-selected="true"
                    class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-sidebar
                     dark:hover:bg-gray-700 dark:text-blue-500">Nasabah</button>
            </li>
            <li class="mr-2">
                <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                    aria-controls="services" aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Pengepul</button>
            </li>
            <li class="mr-2">
                <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab"
                    aria-controls="statistics" aria-selected="false"
                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Admin</button>
            </li>
        </ul>
        <div id="defaultTabContent">
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-sidebar
            " id="about" role="tabpanel"
                aria-labelledby="about-tab">
                <div class="w-full mt-6">
                    <div class="overflow-auto max-h-[300px]">
                        <table class="w-full bg-white">
                            <thead class="bg-sidebar
                             text-white w-full">
                                <tr>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama
                                    </th>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Status
                                    </th>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Saldo
                                    </th>
                                    <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Riwayat
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $user->name }}</td>

                                        @if(isset($user->transactions()->latest('created_at')->first()->created_at))
                                        @if (strtotime($user->transactions()->latest('created_at')->first()->created_at) < strtotime('-3 months'))
                                        <td class="w-1/3 sm:w-auto bg-red-700 text-white text-left py-3 px-4">Aktif {{ $user->transactions()->latest('created_at')->first()->created_at->diffForHumans()}}</td>
                                        @elseif(strtotime($user->transactions()->latest('created_at')->first()->created_at) < strtotime('-2 months'))
                                        <td class="w-1/3 sm:w-auto bg-purple-600 text-white text-left py-3 px-4">Aktif {{ $user->transactions()->latest('created_at')->first()->created_at->diffForHumans()}}</td>
                                        @else
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4 bg-green-600 text-white">Aktif {{ $user->transactions()->latest('created_at')->first()->created_at->diffForHumans()}}</td>
                                        @endif
                                        
                                        @else
                                        @if (strtotime($user->created_at) < strtotime('-3 months'))
                                        <td class="w-1/3 sm:w-auto bg-red-700 text-left text-white py-3 px-4">Belum Melakukan Transaksi dari {{ $user->created_at->diffForHumans()}}</td>
                                        @elseif(strtotime($user->created_at) < strtotime('-2 months'))
                                        <td class="w-1/3 sm:w-auto bg-Purpel-700 text-left text-white py-3 px-4">Belum Melakukan Transaksi dari {{ $user->created_at->diffForHumans()}}</td>
                                        @else
                                        <td class="w-1/3 sm:w-auto bg-green-700 text-left text-white py-3 px-4">Belum Melakukan Transaksi dari {{ $user->created_at->diffForHumans()}}</td>
                                        @endif
                                        @endif



                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($user->transactions->where('pay_status', 2)->sum('pay_total') - $user->convertions->where('pay_status', 3)->sum('pay_total'))</td>
                                        <td class="sm:text-left py-3 px-4">
                                            <a href="{{ route('nasabah_detail', ['user_id' => $user->id]) }}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       
                    </div>


                </div>
            </div>
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-sidebar
            " id="services" role="tabpanel"
                aria-labelledby="services-tab">
                <div class="w-full mt-6">
                    <div class="overflow-auto max-h-[300px]">
                        <table class="w-full bg-white">
                            <thead class="  w-1/2">
                                <tr>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                        Nama</th>

                                    
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($collectors as $collector)
                                    <tr>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $collector->name }}</td>

                                       
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-sidebar
            " id="statistics" role="tabpanel"
                aria-labelledby="statistics-tab">
                <div class="w-full mt-6">
                    <div class="overflow-auto max-h-[300px]">
                        <table class="w-full bg-white">
                            <thead class="  w-1/2">
                                <tr>
                                    <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                        Nama</th>

                                    
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $admin->name }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
