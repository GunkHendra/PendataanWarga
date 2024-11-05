<nav class="w-72 bg-emerald-400 h-full text-white flex flex-col sticky top-0">
    <div class="p-4 bg-emerald-600 basis-2/5 text-center items-center flex flex-col space-y-4 justify-center">
        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-300 ">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
        </div>
        <div>
            <h1 class="text-2xl font-bold">Username</h1>
            <h2 class="text-xl">Admin Desa Lorem</h2>
        </div>
    </div>
    <nav class="mt-4 basis-3/5">
        <a href="/admin" class="flex flex-row py-2 px-4 text-gray-100 hover:bg-emerald-700 hover:text-white gap-2 items-center"><span><img class="w-12 h-12" src="/assets/dashboard-icon/home.png" alt="Home Icon"></span>Dashboard</a>
        <a href="/admin/data_warga" class="flex flex-row py-2 px-4 text-gray-100 hover:bg-emerald-700 hover:text-white gap-2 items-center"><span><img class="w-12 h-12" src="/assets/dashboard-icon/notepad.png" alt="Home Icon"></span>Data Warga Pendatang</a>
        <a href="/admin/data_iuran" class="flex flex-row py-2 px-4 text-gray-100 hover:bg-emerald-700 hover:text-white gap-2 items-center"><span><img class="w-12 h-12" src="/assets/dashboard-icon/money.png" alt="Home Icon"></span>Data Iuran Warga</a>
        <form method="POST" action="/logout" class="flex flex-row py-2 px-4 bg-red-500 text-gray-100 hover:bg-red-700 hover:text-white gap-2 items-center">
            @csrf
            <img class="w-12 h-12" src="/assets/dashboard-icon/notepad.png" alt="Home Icon">
            <button type="submit" class="w-full flex justify-start">Logout</button>
        </form>
    </nav>
</nav>