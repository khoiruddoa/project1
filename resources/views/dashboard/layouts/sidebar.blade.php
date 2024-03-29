
    <aside class="relative bg-sidebar w-64 hidden sm:block shadow-xl max-h-screen overflow-y-auto">
        <div class="p-6">
            <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
            
        </div>
        <nav class="text-white text-base font-semibold pt-3 ">
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
            <a href="{{route('pencairandana')}}" class="flex items-center {{ Request::is('dashboard/withdraw*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>

              
               Pencairan Dana
           </a>
            <a href="{{route('expend')}}" class="flex items-center {{ Request::is('dashboard/expend*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Pengeluaran Operasional
            </a>
            <a href="{{route('adjustment')}}" class="flex items-center {{ Request::is('dashboard/adjustment*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Penyelarasan Saldo
            </a>
            <a href="{{route('pengurus')}}" class="flex items-center {{ Request::is('dashboard/pengurus*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user mr-3"></i>
                Pengurus
            </a>
            <a href="/dashboard/report" class="flex items-center {{ Request::is('dashboard/report*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Laporan
            </a>
            <a href="/dashboard/graphic" class="flex items-center {{ Request::is('dashboard/graphic*') ? 'active-nav-link' : '' }} text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Chart
            </a>
            
        </nav>
       
    </aside>
