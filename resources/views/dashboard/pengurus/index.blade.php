@extends('dashboard.layouts.main')

@section('container')
<div class="">
    <h1 class="text-3xl text-black pb-6">Tabel Pengurus</h1>
</div>
    <div class="flex flex-row gap-4">
       

        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Pengurus
            </button>

            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
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
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Nama Nasabah</h3>
                            <form class="space-y-6" action="{{route('pengurus_update')}}" method="POST">
                                @csrf
                                
                              
                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Nasabah</label>
                                <select id="anggota" name="anggota"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>



                                <div class="flex justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">

                                        </div>

                                    </div>

                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Input</button>
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div>

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal2" data-modal-toggle="authentication-modal2"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Bagi Hasil
            </button>

            <!-- Main modal -->
            <div id="authentication-modal2" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                            data-modal-hide="authentication-modal2">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Bagi Hasil Nasabah</h3>


                            <h3 class="mb-4 text-l font-medium text-gray-900 dark:text-white">Pendapatan @currency($income)</h3>
                            <h3 class="mb-4 text-l font-medium text-gray-900 dark:text-white">Keuntungan untuk Pengurus @currency($profit)</h3>

                            <form class="space-y-6" action="{{route('bagihasil')}}" method="POST">
                                @csrf
                                
                            <table class="w-full bg-white">
                                <thead class="bg-sidebar text-white w-full">
                                    <tr>
                                        <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama Pengurus</th>
                                        
                                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Bagi Hasil</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($manages as $manage)
                                    <input type="hidden" name="user_id[]" value="{{$manage->id}}">
                                    <input type="hidden" name="income_id[]" value="{{$income}}">
                                        <tr>
                                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $manage->name }}</td>
                                            <td class="sm:text-left py-3 px-4">
                                                <input type="text"  name="profit[]" id="profit"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bagi Hasil</button>
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="w-full mt-6">
        <div class="overflow-auto max-h-[300px]">
            <table class="w-full bg-white">
                <thead class="bg-sidebar text-white w-full">
                    <tr>
                        <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Nama Pengurus</th>
                        
                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($manages as $manage)
                        <tr>
                            <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $manage->name }}</td>
                            <td class="sm:text-left py-3 px-4">
                                <div class="flex flex-row justify-center items-center gap-2">
                                
                                <div>
                                    <a href="{{route('pengurus_delete',['id' => $manage->id])}}" onclick="return confirm('Apa Anda Yakin Ingin Menghapus data ini?')"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</a>
                                </div>
                        
                            </div>
                        
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
