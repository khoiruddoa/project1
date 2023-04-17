@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">

        </div>
        <div class="bg-blue-500 text-white rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Graphic dan Chart</h2>
            <div class="grid md:grid-cols-3 grid-cols-1 gap-4 ">
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-gray-100 mb-2">Fluktuasi Harga</p>
                    </div>
                    <ul class="text-sm text-white dark:text-gray-300">

                    <li>

                            <form action="{{ route('fluktuasi_harga') }}" method="GET" class="mb-3 mt-3">
                                
                               
                                <div x-data="{ searchText: '' }">
                                    <input type="text" id="simple-search" x-model="searchText"
                                    class="mb-4 mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search">

                                    
                                    <select id="type" name="category_id"
                                        class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach($categories as $category)
                                        <template
                                        x-if="searchText === '' || '{{ strtolower($category->category_name) }}'.includes(searchText.toLowerCase())">
                                          
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        </template>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    
                                    <select id="type" name="year"
                                        class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach($tahuns as $tahun)
                                        <option value="{{$tahun->tahun}}">{{$tahun->tahun}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <button type="submit"
                                class="w-full mt-4 flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z"
                                    fill-rule="evenodd"></path>
                            </svg>
                                <span class="text-sm font-medium">Show</span>
                            </button>
                            </form>

                        </li>

                    </ul>
                </div>
                <div class="text-center bg-blue-600 hover:bg-blue-800 rounded-xl p-4">
                    <div>
                        <p class="text-sm text-gray-100 mb-2">Transaksi</p>
                    </div>
                    <ul class="text-sm text-white dark:text-gray-300">

                    <li>

                            <form action="{{ route('jumlah_transaksi') }}" method="GET" class="mb-3 mt-3">
                                
                               
                               

                                <div>
                                    
                                    <select id="type" name="year"
                                        class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @foreach($tahuns as $tahun)
                                        <option value="{{$tahun->tahun}}">{{$tahun->tahun}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <button type="submit"
                                class="w-full mt-4 flex items-center px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z"
                                    fill-rule="evenodd"></path>
                            </svg>
                                <span class="text-sm font-medium">Show</span>
                            </button>
                            </form>

                        </li>

                    </ul>
                </div>



            </div>
        </div>


    </div>
@endsection
