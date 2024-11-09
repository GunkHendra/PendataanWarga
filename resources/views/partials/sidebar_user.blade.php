<nav class="w-72 bg-emerald-400 h-full text-white flex flex-col sticky top-0">
    <div class="p-4 bg-emerald-600 basis-2/5 text-center items-center flex flex-col space-y-4 justify-center">
        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-emerald-400 ">
            <img src="/assets/dashboard-illustrasi/profil.jpg" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h1 class="text-2xl font-bold">{{ $user->nama_lengkap }}</h1>
            <h2 class="text-xl">Warga Desa {{ $desa->desa }}</h2>
        </div>
    </div>
    <nav class="mt-4 basis-3/5 flex flex-col justify-between">
        <div>
            <a href="/user" class="flex flex-row py-2 px-4 text-gray-100 hover:bg-emerald-700 hover:text-white gap-2 items-center"><span><img class="w-12 h-12" src="/assets/dashboard-icon/home.png" alt="Home Icon"></span>Dashboard</a>
            <a href="/user/riwayat_iuran" class="flex flex-row py-2 px-4 text-gray-100 hover:bg-emerald-700 hover:text-white gap-2 items-center"><span><img class="w-12 h-12" src="/assets/dashboard-icon/notepad.png" alt="Home Icon"></span>Riwayat Iuran</a>
        </div>
        {{-- <form method="POST" action="/logout" class="flex flex-row py-2 px-4 bg-red-500 text-gray-100 hover:bg-red-700 hover:text-white gap-2 items-center">
            @csrf
            <img class="w-12 h-12" src="/assets/dashboard-icon/logout putih.png" alt="Home Icon">
            <button type="submit">Logout</button>
        </form> --}}
        <div>
            <form method="POST" action="/logout" class="flex flex-row py-4 px-4 text-gray-100 bg-red-500 hover:bg-red-700 hover:text-white gap-2 items-center">
                @csrf
                {{-- <span><img class="w-12 h-12" src="/assets/dashboard-icon/logout putih.png" alt="Home Icon"></span> --}}
                <button type="submit" class="w-full flex justify-center text-xl">Logout</button>
            </form>
        </div>
    </nav>
</nav>
