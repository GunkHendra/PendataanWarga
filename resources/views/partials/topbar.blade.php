<nav class="bg-gray-900 w-full top-0 justify-between text-center text-white flex sticky print:hidden">
    <div class="py-4 px-6 mt-2 flex justify-between w-full items-center">
        <h1 class="text-4xl font-bold">{{ $title }}</h1>
        <a href="/about" class="{{ ($title === 'Tentang Kami') ? 'text-blue-600 shadow-md' : 'hover:text-blue-300' }} flex items-center p-3 rounded-lg transition duration-300">
            <span class="text-xl font-medium">Tentang Kami</span>
        </a>
    </div>
</nav>