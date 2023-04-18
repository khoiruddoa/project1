                @extends('layouts.main')

                @section('container')
                    <div class="container mx-auto p-5 sm:p-10 lg:p-20 bg-[#3d68ff] min-h-screen">
                        <div class="flex flex-col lg:flex-col justify-end items-center ">
                            <div
                                class="font-mono md:text-5xl text-xl font-extrabold text-white text-center lg:mt-6 mt-16 mb-6 ">
                                Bank Sampah Faida Cendikia
                            </div>
                            <div class="bg-blue-500 text-white rounded-lg p-6">
                                <h2 class="text-lg font-semibold mb-4">Laporan</h2>
                                <div class="grid md:grid-cols-3 grid-cols-1 gap-4 ">

                                    <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                                        <div>
                                            <p class="text-sm text-gray-100 mb-2">Laporan Transaksi Keseluruhan</p>
                                        </div>
                                        <ul class="text-sm text-white dark:text-gray-300">
                    
                                        <li>
                    
                                                <form action="{{ route('print_transaction') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                                    <div class="flex space-x-2">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="start_date">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="end_date">
                    
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
                                            <p class="text-sm text-gray-100 mb-2">Laporan Transaksi Per Kategori</p>
                                        </div>
                                        <ul class="text-sm text-white dark:text-gray-300">
                    
                                        <li>
                    
                                                <form action="{{ route('print_transaction_category') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                                    <div class="flex space-x-2">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="start_date">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="end_date">
                    
                                                    </div>
                                                   
                                                    <div>
                                                        
                                                        <select id="type" name="type"
                                                            class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            
                                                            <option value="1">UMUM</option>
                                                            <option value="2">TK</option>
                                                            <option value="3">BIMBEL</option>
                                                            <option value="">KESELURUHAN</option>
                                                        </select>
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
                                            <p class="text-sm text-gray-100 mb-2">Laporan Transaksi Per Item</p>
                                        </div>
                                        <ul class="text-sm text-white dark:text-gray-300">
                    
                                        <li>
                    
                                                <form action="{{ route('print_transaction_item') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                                    <div class="flex space-x-2">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="start_date">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="end_date">
                    
                                                    </div>
                                                   
                                                    <div x-data="{ searchText: '' }">
                                                        <input type="text" id="simple-search" x-model="searchText"
                                                        class="mb-4 mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Search">
                    
                                                        
                                                        <select id="type" name="type"
                                                            class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            @foreach($categories as $category)
                                                            <template
                                                            x-if="searchText === '' || '{{ strtolower($category->category_name) }}'.includes(searchText.toLowerCase())">
                                                              
                                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                            </template>
                                                            @endforeach
                                                        </select>
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
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="start_date">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="end_date">
                    
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
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="start_date">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="end_date">
                    
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
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="start_date">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="end_date">
                    
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
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="start_date">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="end_date">
                    
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
                    
                                    <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                                        <div>
                                            <p class="text-sm text-gray-100 mb-2">Laporan Update Harga Sampah</p>
                                        </div>
                                        <ul class="text-sm text-white dark:text-gray-300">
                    
                                            <li>
                    
                                                <form action="{{ route('print_sampah') }}" target="_blank" method="GET" class="mb-3 mt-3">
                                                    <div class="flex space-x-2">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="start_date">
                                                        <input type="date" required
                                                            class="bg-blue-500 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500"
                                                            name="end_date">
                    
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
                    
                                </div>
                            </div>
                            <a href="/menu"
                                class="mt-4 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Kembali</a>
                        </div>
                    @endsection
