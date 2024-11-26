<nav class="w-72 bg-gray-900 min-h-screen text-white flex flex-col sticky top-0 print:hidden shadow-lg">
    <!-- Bagian Profil Admin -->
    <div class="p-6 text-center items-center flex flex-col space-y-4 border-b-2 border-blue-400">
        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-300 shadow-md">
            <img src="/assets/dashboard-illustrasi/profil.jpg" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h1 class="text-lg font-semibold">{{ $admin->nama_lengkap }}</h1>
            <h2 class="text-sm">Admin Desa {{ $desa->desa }}</h2>
        </div>
    </div>

    <!-- Menu Navigasi -->
    <div class="flex-1 px-4 py-6 space-y-2">
        <a href="/admin" class="{{ ($title === 'Dashboard') ? 'bg-blue-600 shadow-md' : 'hover:bg-blue-900' }} flex items-center p-3 rounded-lg transition duration-300">
            <img class="w-6 h-6 mr-3" src="/assets/dashboard-icon/home.png" alt="Home Icon">
            <span class="text-sm">Dashboard</span>
        </a>
        <a href="/admin/data_warga" class="{{ ($title === 'Data Warga Pendatang' || $title === 'Pendataan Warga') ? 'bg-blue-600 shadow-md' : 'hover:bg-blue-900' }} flex items-center p-3 rounded-lg transition duration-300">
            <img class="w-6 h-6 mr-3" src="/assets/dashboard-icon/person-warga.png" alt="Person Icon">
            <span class="text-sm">Data Warga</span>
        </a>
        <a href="/admin/data_iuran" class="{{ ($title === 'Data Iuran Warga') ? 'bg-blue-600 shadow-md' : 'hover:bg-blue-900' }} flex items-center p-3 rounded-lg transition duration-300">
            <img class="w-6 h-6 mr-3" src="/assets/dashboard-icon/money.png" alt="Money Icon">
            <span class="text-sm">Data Iuran Warga</span>
        </a>
        <a href="/admin/pelaporan?filter=1" class="{{ ($title === 'Pelaporan') ? 'bg-blue-600 shadow-md' : 'hover:bg-blue-900' }} flex items-center p-3 rounded-lg transition duration-300">
            <img class="w-6 h-6 mr-3" src="/assets/dashboard-icon/notepad.png" alt="Notepad Icon">
            <span class="text-sm">Data Pelaporan</span>
        </a>
        
        <!-- Tombol Logout -->
        <form method="POST" action="/logout" class="rounded-lg h-12 flex items-center bg-red-500 hover:bg-red-700 transition duration-300">
            @csrf
            <img class="w-6 h-6 mr-3 ml-3" src="/assets/dashboard-icon/logout putih.png" alt="Money Icon">
            <button type="submit" class="w-full h-full text-sm text-start font-medium text-white">
                Logout
            </button>
        </form>
    </div>
</nav>




{{-- <nav class="w-72 bg-gradient-to-t from-emerald-300 via-emerald-600 to-emerald-800 h-full text-white flex flex-col sticky top-0 print:hidden">
    <div class="p-4 basis-2/5 text-center items-center flex flex-col space-y-4 justify-center">
        <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-emerald-200">
            <img src="/assets/dashboard-illustrasi/profil.jpg" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h1 class="text-2xl font-bold">{{ $admin->nama_lengkap }}</h1>
            <h2 class="text-xl">Admin Desa {{ $desa->desa }}</h2>
        </div>
    </div>
    <nav class="mt-4 basis-3/5 flex flex-col justify-between px-4">
        <div>
            <a href="/admin" class="{{ ($title === 'Dashboard') ? 'bg-emerald-900 rounded-lg' : 'hover:bg-emerald-700 rounded-lg' }} flex flex-row py-2 px-2 gap-2 items-center mb-2"><span><img class="w-12 h-12" src="/assets/dashboard-icon/home.png" alt="Home Icon"></span>Dashboard</a>
            <a href="/admin/data_warga" class="{{ ($title === 'Data Warga Pendatang' || $title === 'Pendataan Warga') ? 'bg-emerald-900 rounded-lg' : 'hover:bg-emerald-700 rounded-lg' }} flex flex-row py-2 px-2 gap-2 items-center mb-2"><span><img class="w-12 h-12" src="/assets/dashboard-icon/person-warga.png" alt="Home Icon"></span>Data Warga</a>
            <a href="/admin/data_iuran" class="{{ ($title === 'Data Iuran Warga') ? 'bg-emerald-900 rounded-lg' : 'hover:bg-emerald-700 rounded-lg' }} flex flex-row py-2 px-2 gap-2 items-center mb-2"><span><img class="w-12 h-12" src="/assets/dashboard-icon/money.png" alt="Home Icon"></span>Data Iuran Warga</a>
            <a href="/admin/pelaporan?filter=1" class="{{ ($title === 'Pelaporan') ? 'bg-emerald-900 rounded-lg' : 'hover:bg-emerald-700 rounded-lg' }} flex flex-row py-2 px-2 gap-2 items-center mb-2"><span><img class="w-12 h-12" src="/assets/dashboard-icon/notepad.png" alt="Home Icon"></span>Data Pelaporan</a>
        </div>
        //
        <form method="POST" action="/logout" class="flex flex-row py-2 px-4 bg-red-500 text-gray-100 hover:bg-red-700 hover:text-white gap-2 items-center">
            @csrf
            <img class="w-8 h-8" src="/assets/dashboard-icon/logout putih.png" alt="Home Icon">
            <button type="submit" class="w-full flex justify-start">Logout</button>
        </form>
        //
    </nav>
    <form method="POST" action="/logout" class="flex flex-row py-4 px-2 text-gray-100 bg-red-500 hover:bg-red-700 hover:text-white items-center">
        @csrf
        //
        <span><img class="w-12 h-12" src="/assets/dashboard-icon/logout putih.png" alt="Home Icon"></span>
        //
        <button type="submit" class="w-full flex justify-center text-xl">Logout</button>
    </form>
</nav> --}}
