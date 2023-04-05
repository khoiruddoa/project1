@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">

        </div>

        <div class="bg-blue-500 text-white rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Laporan</h2>
            <div class="grid md:grid-cols-3 grid-cols-2 gap-4 ">
                
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-gray-100 mb-2">Laporan Transaksi</p>
                    </div>
                    <ul class="text-sm text-white dark:text-gray-300">

                        <li>

                            <form action="{{ route('print_transaction') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                <div class="flex space-x-2">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="start_date">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="end_date">
                                 
                                </div>
                                <button type="submit"
                                class="w-full mt-4 flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Print</span>
                                </button>
                              </form>
                           
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Save</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-gray-100 mb-2">Laporan Konversi</p>
                    </div>
                    <ul class="text-sm text-white dark:text-gray-300">

                        <li>

                            <form action="{{ route('print_convertion') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                <div class="flex space-x-2">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="start_date">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="end_date">
                                 
                                </div>
                                <button type="submit"
                                class="w-full mt-4 flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Print</span>
                                </button>
                              </form>
                           
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Save</span>
                            </a>
                        </li>

                    </ul>
                </div>
                
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-gray-100 mb-2">Laporan Keuntungan</p>
                    </div>
                    <ul class="text-sm text-white dark:text-gray-300">

                        <li>

                            <form action="{{ route('print_profit') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                <div class="flex space-x-2">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="start_date">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="end_date">
                                 
                                </div>
                                <button type="submit"
                                class="w-full mt-4 flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Print</span>
                                </button>
                              </form>
                           
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Save</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-gray-100 mb-2">Laporan Pengeluaran</p>
                    </div>
                    <ul class="text-sm text-white dark:text-gray-300">

                        <li>

                            <form action="{{ route('print_expend') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                <div class="flex space-x-2">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="start_date">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="end_date">
                                 
                                </div>
                                <button type="submit"
                                class="w-full mt-4 flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Print</span>
                                </button>
                              </form>
                           
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Save</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-gray-100 mb-2">Laporan Bagi Hasil Pengurus</p>
                    </div>
                    <ul class="text-sm text-white dark:text-gray-300">

                        <li>

                            <form action="{{ route('print_manage') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                <div class="flex space-x-2">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="start_date">
                                  <input type="date" required class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500" name="end_date">
                                 
                                </div>
                                <button type="submit"
                                class="w-full mt-4 flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Print</span>
                                </button>
                              </form>
                           
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Save</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-gray-100 mb-2">Daftar Perolehan Emas</p>
                    </div>
                    <ul class="text-sm text-white dark:text-gray-300">

                        <li>
                            <a href="{{ route('print_gold') }}" target="_blank"
                                class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Print</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z"
                                        fill-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Save</span>
                            </a>
                        </li>

                    </ul>
                </div>
               
            </div>
        </div>


    </div>
@endsection
