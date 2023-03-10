@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Tabel Nasabah</h1>
            @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
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
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Data Nasabah</h3>
                            <form class="space-y-6" action="/dashboard/nasabah" method="POST">
                                @csrf
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                        @error('name')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
                                </div>
                                <div>
                                    <label for="phone_number"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.HP</label>
                                    <input type="number" name="phone_number" id="phone_number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                        @error('phone_number')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="name@company.com" required>
                                        @error('email')
      <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                </div>

                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea id="address" name="address" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required></textarea>

                                <div class="flex justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            
                                        </div>
                                        
                                    </div>
                                   
                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftarkan</button>
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="w-full mt-6">
        <div class="overflow-x-auto">
            <table class="w-full bg-white">
              <thead class="bg-gray-800 text-white w-full">
                <tr>
                  <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                  <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Saldo</th>
                  <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Riwayat Transaksi</th>
                </tr>
              </thead>
              <tbody class="text-gray-700"> 
                @foreach ($users as $user)

                <tr>
                  <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $user->name}}</td>
                  <td class="w-1/3 sm:w-auto text-left py-3 px-4">500000</td>
                  <td class="sm:text-left py-3 px-4">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          

    </div>
@endsection
