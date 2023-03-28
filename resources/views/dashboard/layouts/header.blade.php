<div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
        <div class="w-1/2"></div>
        <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
            <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
            </button>
            <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
            <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Ganti Photo</a>
                <a href="#" class="block px-4 py-2 account-link hover:text-white">Ganti Password</a>
                
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="block px-4 py-2 account-link hover:text-white">
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
        <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
           <a href="/dashboard/dashboard" class="flex items-center {{ Request::is('dashboard/dashboard') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{route('nasabah')}}" class="flex items-center {{ Request::is('dashboard/nasabah*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Data Pengguna
            </a>
            
            <a href="{{route('sampah')}}" class="flex items-center text-white opacity-75 {{ Request::is('dashboard/sampah*') ? 'active-nav-link' : '' }} hover:opacity-100 py-4 pl-6 nav-item">
               
                <i class="fas fa-sticky-note mr-3"></i>
                Data Kategori Sampah
            </a>
            <a href="{{route('jadwal')}}" class="flex items-center {{ Request::is('dashboard/jadwal*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
               
                <i class="fas fa-calendar mr-3"></i>
               Jadwal Angkut
            </a>
            <a href="{{route('transaksi')}}" class="flex items-center {{ Request::is('dashboard/transaksi*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Transaksi Nasabah
            </a>
            <a href="{{route('transaksipengepul')}}" class="flex items-center {{ Request::is('dashboard/pengepul*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Transaksi Pengepul
            </a>
            <a href="{{route('pengajuan_konversi')}}" class="flex items-center {{ Request::is('dashboard/konversi*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                 <i class="fas fa-align-left mr-3"></i>

               
                Pengajuan Konversi
            </a>
            <a href="{{route('expend')}}" class="flex items-center {{ Request::is('dashboard/expend*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Pengeluaran Operasional
            </a>
            <a href="{{route('adjustment')}}" class="flex items-center {{ Request::is('dashboard/adjustment*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Penyelarasan Saldo
            </a>
            <a href="/dashboard/report" class="flex items-center {{ Request::is('dashboard/report*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Laporan
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-cogs mr-3"></i>
                Support
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-user mr-3"></i>
                My Account
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Sign Out
            </a>
           
        </nav>
    </header>