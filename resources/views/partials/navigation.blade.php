<nav class="fixed w-screen bg-slate-100">
    <div class="flex justify-center gap-20 py-8">
        <a href="/"
            class=" {{ Request::is('/') ? 'text-slate-800' : 'text-slate-500' }}   hover:text-slate-600 text-lg font-bold">Daftar
            Hadir</a>
        <a href="/user"
            class=" {{ Request::is('user*') ? 'text-slate-800' : 'text-slate-500' }}   hover:text-slate-600 text-lg font-bold">Mahasiswa</a>
    </div>
</nav>
