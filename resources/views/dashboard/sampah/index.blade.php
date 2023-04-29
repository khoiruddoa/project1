@extends('dashboard.layouts.main')

@section('container')
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-3xl text-black pb-6">Tabel Category Sampah</h1>
        </div>

        <div class="flex flex-row gap-2">

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modalTambah" data-modal-toggle="authentication-modalTambah"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Category Sampah
            </button>

            <!-- Main modal -->
            <div id="authentication-modalTambah" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                            data-modal-hide="authentication-modalTambah">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Masukkan Category Sampah</h3>
                            <form class="space-y-6" action="/dashboard/sampah" method="POST">
                                @csrf

                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="category_name" id="category_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                </div>

                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock Unit</label>
                                <select id="uom" name="uom"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    <option value="pcs">Pcs</option>
                                    <option value="kg">Kg</option>
                                    <option value="m">Meter</option>
                                </select>



                                <div class="flex justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">

                                        </div>

                                    </div>

                                </div>
                                <button type="submit" onclick="this.disabled=true; this.form.submit();"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Input</button>
                                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <button data-modal-target="authentication-modalUpdate" data-modal-toggle="authentication-modalUpdate"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Update Harga
            </button>

            <!-- Main modal -->
            <div id="authentication-modalUpdate" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                            data-modal-hide="authentication-modalUpdate">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Harga Sampah</h3>



                            <form action="{{ route('updateharga') }}" method="POST">
                                @csrf
                                <div class="md:max-h-80 overflow-y-scroll">
                                    <table class="w-full  bg-white">
                                        <thead class="bg-sidebar text-white w-full">
                                            <tr>
                                                <th
                                                    class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">
                                                    Nama Kategori</th>

                                                <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga
                                                    Beli</th>
                                                <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga
                                                    Jual</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-700">
                                            @foreach ($categories as $category)
                                                <input type="hidden" name="category_id[]" value="{{ $category->id }}">

                                                <tr>
                                                    <td class="w-1/3 sm:w-auto text-left py-3 px-4">
                                                        {{ $category->category_name }}</td>
                                                    <td class="sm:text-left py-3 px-4">
                                                        <input type="number" name="buy[]" id="buy"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            required>

                                                    </td>
                                                    <td class="sm:text-left py-3 px-4">
                                                        <input type="number" name="sell[]" id="sell"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            required>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div> <input type="date" name="created_at" class="my-4" required></div>

                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                                    Harga</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div x-data="{ searchText: '' }" class="w-full mt-6">
        <input type="text" id="simple-search" x-model="searchText"
            class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search">

        <div class="overflow-auto max-h-[300px]">
            <table class="w-full bg-white">
                <thead class="bg-sidebar text-white w-full">
                    <tr>
                        <th class="w-1/3 sm:w-auto text-left py-3 px-4 uppercase font-semibold text-sm">Kategori Sampah
                        </th>
                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga Beli Terakhir</th>
                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Harga Jual Terakhir</th>
                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal Update Terakhir</th>


                        <th class="sm:text-left py-3 px-4 uppercase font-semibold text-sm">action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($categories as $category)
                        <template
                            x-if="searchText === '' || '{{ strtolower($category->category_name) }}'.includes(searchText.toLowerCase())">

                            <tr>
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ $category->category_name }}</td>
                                @if ($category->categoryPrices->count() > 0)
                                    <td class="w-1/3 sm:w-auto text-left py-3 px-4">@currency($category->categoryPrices->last()->buy)
                                    </td>
                                    <td class="w-1/3 sm:w-auto text-left py-3 px-4">
                                        @currency($category->categoryPrices->last()->sell)</td>
                                @else
                                    <td class="w-1/3 sm:w-auto text-left py-3 px-4">
                                        0</td>
                                    <td class="w-1/3 sm:w-auto text-left py-3 px-4">
                                        0</td>
                                @endif
                                <td class="w-1/3 sm:w-auto text-left py-3 px-4">{{ date('d-m-Y', strtotime($category->categoryPrices->last()->created_at)) }}</td>
                                <td class="sm:text-left py-3 px-4">
                                    <div class="flex flex-row justify-center items-center gap-2">
                                        <div>

                                            <!-- Modal toggle -->
                                            <button data-modal-target="authentication-modal{{ $category->category_name }}"
                                                data-modal-toggle="authentication-modal{{ $category->category_name }}"
                                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                Edit
                                            </button>

                                            <!-- Main modal -->
                                            <div id="authentication-modal{{ $category->category_name }}" tabindex="-1"
                                                aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                                <div class="relative w-full h-full max-w-md md:h-auto">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-sidebar dark:hover:text-white"
                                                            data-modal-hide="authentication-modal{{ $category->category_name }}">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        <div class="px-6 py-6 lg:px-8">
                                                            <h3
                                                                class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                                Edit Category Sampah</h3>
                                                            <form class="space-y-6"
                                                                action="{{ route('sampah_update', ['id' => $category->id]) }}"
                                                                method="POST">
                                                                @csrf

                                                                <div>
                                                                    <label for="name"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                                    <input type="text"
                                                                        value="{{ $category->category_name }}"
                                                                        name="category_name" id="category_name"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                        required>
                                                                </div>

                                                                <label for="countries"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                                                                    Unit</label>
                                                                <select id="uom" name="uom"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option value="{{ $category->uom }}" selected>
                                                                        {{ $category->uom }}</option>
                                                                    <option value="pcs">pcs</option>
                                                                    <option value="kg">Kg</option>
                                                                    <option value="m">M </option>
                                                                </select>



                                                                <div class="flex justify-between">
                                                                    <div class="flex items-start">
                                                                        <div class="flex items-center h-5">

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <button type="submit"
                                                                    onclick="this.disabled=true; this.form.submit();"
                                                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                                                                <div
                                                                    class="text-sm font-medium text-gray-500 dark:text-gray-300">

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div>
                                            <a href="{{ route('sampah_delete', ['id' => $category->id]) }}"
                                                onclick="return confirm('Apa Anda Yakin Ingin Menghapus data ini?')"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</a>
                                        </div>

                                    </div>


                                </td>
                            </tr>
                        </template>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
