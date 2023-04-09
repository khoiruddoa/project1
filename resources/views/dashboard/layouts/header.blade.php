<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
        <div class="w-1/2"></div>
        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <button @click="isOpen = !isOpen"
                class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img src="{{ asset(auth()->user()->photo) }}">
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">

                <!-- Modal toggle -->
                <button data-modal-target="authentication-modal4" data-modal-toggle="authentication-modal4"
                    class="block px-4 py-2 account-link hover:text-white w-full text-left" type="button">
                    Ganti Photo
                </button>

                <!-- Main modal -->
                <div id="authentication-modal4" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-hide="authentication-modal4">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ganti Photo</h3>

                                <div class="flex items-center justify-center w-full h-full flex">

                                    <div x-data="photoUploader()" class="flex flex-col gap-2">

                                        <div>
                                            <form action="{{ route('uploadPhoto') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" id="photo" name="photo"
                                                    @change="previewPhoto">
                                                <div x-show="photoPreview" class="my-2">
                                                    <img :src="photoPreview" alt="Photo Preview" class="my-2">
                                                    <button type="submit"
                                                        class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Upload</button>

                                                </div>

                                            </form>
                                        </div>

                                    </div>


                                </div>

                                <script>
                                    function photoUploader() {
                                        return {
                                            photoPreview: null,

                                            previewPhoto(event) {
                                                const file = event.target.files[0];
                                                const reader = new FileReader();

                                                reader.readAsDataURL(file);

                                                reader.onload = () => {
                                                    this.photoPreview = reader.result;
                                                };
                                            }
                                        };
                                    }
                                </script>

                            </div>

                        </div>
                    </div>
                </div>



                <!-- Modal toggle -->
                <button data-modal-target="authentication-modal5" data-modal-toggle="authentication-modal5"
                    class="block px-4 py-2 account-link hover:text-white w-full text-left" type="button">
                    Ganti Password
                </button>

                <!-- Main modal -->
                <div id="authentication-modal5" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-hide="authentication-modal5">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Ganti Password</h3>
                                <form class="space-y-6" action="{{ route('changePassword') }}" method="post">
                                    @csrf
                                    <div>
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Password Lama</label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>

                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                            Baru</label>
                                        <input type="password" name="password" id="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                    </div>

                                    <button type="submit"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ganti
                                        Password</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="block px-4 py-2 account-link hover:text-white text-left w-full">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars"></i>
                <i x-show="isOpen" class="fas fa-times"></i>
            </button>
        </div>

        <!-- Dropdown Nav -->
        <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
            <a href="/dashboard/dashboard"
                class="flex items-center {{ Request::is('dashboard/dashboard') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>


            <div x-data="{ open: false }" class="relative">
                <a @click="open = !open" href="#"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Data
                    <i class="fas fa-chevron-down ml-2"></i>
                </a>

                <div x-show="open" @click.away="open = false"
                    class="absolute top-full left-0 mt-2 py-2 bg-sidebar z-20 rounded-md shadow-lg">
                    <a href="{{ route('nasabah') }}"
                        class="flex items-center {{ Request::is('dashboard/nasabah*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Data Pengguna
                    </a>
                    <a href="{{ route('nasabah') }}"
                        class="flex items-center {{ Request::is('dashboard/sampah*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Data Kategori Sampah
                    </a>
                </div>
            </div>

            <div x-data="{ open: false }" class="relative">
                <a @click="open = !open" href="#"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Transaksi
                    <i class="fas fa-chevron-down ml-2"></i>
                </a>

                <div x-show="open" @click.away="open = false"
                    class="absolute top-full left-0 mt-2 py-2 bg-sidebar z-20 rounded-md shadow-lg">
                    <a href="{{ route('transaksi') }}"
                        class="flex items-center {{ Request::is('dashboard/transaksi*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                        <i class="fas fa-tablet-alt mr-3"></i>
                        Transaksi Nasabah
                    </a>
                    <a href="{{ route('transaksipengepul') }}"
                        class="flex items-center {{ Request::is('dashboard/pengepul*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                        <i class="fas fa-tablet-alt mr-3"></i>
                        Transaksi Pengepul
                    </a>

                </div>
            </div>
            <div x-data="{ open: false }" class="relative">
                <a @click="open = !open" href="#"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Pengajuan
                    <i class="fas fa-chevron-down ml-2"></i>
                </a>

                <div x-show="open" @click.away="open = false"
                    class="absolute top-full left-0 mt-2 py-2 bg-sidebar z-20 rounded-md shadow-lg">
                    <a href="{{ route('pengajuan_konversi') }}"
                        class="flex items-center {{ Request::is('dashboard/konversi*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                        <i class="fas fa-align-left mr-3"></i>


                        Pengajuan Konversi
                    </a>
                    <a href="{{ route('expend') }}"
                        class="flex items-center {{ Request::is('dashboard/expend*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                        <i class="fas fa-align-left mr-3"></i>
                        Pengeluaran Operasional
                    </a>
                    <a href="{{ route('adjustment') }}"
                        class="flex items-center {{ Request::is('dashboard/adjustment*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                        <i class="fas fa-align-left mr-3"></i>
                        Penyelarasan Saldo
                    </a>
                </div>
            </div>


            <a href="{{ route('jadwal') }}"
                class="flex items-center {{ Request::is('dashboard/jadwal*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">

                <i class="fas fa-calendar mr-3"></i>
                Jadwal Angkut
            </a>
            <a href="/dashboard/report"
                class="flex items-center {{ Request::is('dashboard/report*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Laporan
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-cogs mr-3"></i>
                Ganti Password
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-user mr-3"></i>
                Ganti Photo
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item ">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Keluar
            </a>

        </nav>
    </header>
