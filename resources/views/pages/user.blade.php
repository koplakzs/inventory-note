@extends('layouts.home_layouts')

@section('content')
    <main class="pt-32 ">
        <p class="text-stone-950 text-4xl font-bold text-center mb-3">Daftar Mahasiswa Yudisium</p>
        <section class="sticky top-20 py-4 flex justify-center bg-slate-50">
            <form action="/user" method="POST" class="w-8/12 flex gap-x-3 ">
                @csrf
                <input class="border-2 rounded-lg py-2 px-3 w-full" type="text" placeholder="Masukan Nim" name="nim">
                <input class="border-2 rounded-lg py-2 px-3 w-full" type="text" placeholder="Masukan Nama"
                    name="name">
                <input class="border-2 rounded-lg py-2 px-3 w-full" type="text" placeholder="Masukan Prodi"
                    name="prodi">
                <button type="submit"
                    class="bg-sky-500 hover:bg-sky-600 active:bg-sky-700 text-white rounded-lg px-4">Daftar</button>
            </form>
        </section>
        <section class=" flex justify-center ">
            <table class="table-fixed w-9/12 ">
                <thead class="sticky top-36 bg-slate-50 ">
                    <tr>
                        <th class="py-2">Nim</th>
                        <th class="py-2">Nama</th>
                        <th class="py-2">Prodi</th>
                        <th class="py-2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td id="nim" data-id=" {{ $user->nim }} "> {{ $user->nim }} </td>
                            <td id="name" data-id="{{ $user->name }}"> {{ $user->name }} </td>
                            <td id="prodi" data-id="{{ $user->prodi }}"> {{ $user->prodi }} </td>
                            <td class="flex justify-center gap-x-5">
                                <button class="delete-btn text-rose-700 font-semibold"
                                    data-id="{{ $user->id }}">Del</button>
                                <button class="edit-btn text-sky-700 font-semibold"
                                    data-id="{{ $user->id }}">Edit</button>
                                <a href="pdf/{{ $user->id }} " class="text-stone-700 font-semibold">Print</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </section>
        <!-- Modal -->
        <div id="modal" class="fixed hidden z-10 inset-0">
            <div class="flex items-center justify-center min-h-screen bg-gray-500 bg-opacity-75 transition-opacity">
                <!-- Modal Box -->
                <div class="flex flex-col items-center justify-between bg-white p-10 rounded-lg w-3/6">
                    <p class="text-xl font-semibold text-slate-800">
                        Apakah anda yakin ingin menghapus user ini ?
                    </p>
                    <div class="flex gap-x-6 mt-5">
                        <button id="close-modal-btn"
                            class="bg-gray-400 hover:bg-gray-500 active:bg-gray-600 text-white rounded-lg px-5 py-2">
                            Close
                        </button>
                        <form id="delete-form" method="post">
                            @method('delete')
                            @csrf
                            <button id="delete-modal-btn" type="submit"
                                class="bg-red-600 hover:bg-red-700 active:bg-red-800  text-white rounded-lg px-5 py-2">
                                Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div id="modal-edit" class="fixed hidden z-10 inset-0">
            <div class="flex items-center justify-center min-h-screen bg-gray-500 bg-opacity-75 transition-opacity">
                <!-- Modal Box -->
                <div class="flex flex-col items-center justify-between bg-white p-10 rounded-lg w-3/6">
                    <p class="text-xl font-semibold text-slate-800">
                        Edit User
                    </p>
                    <form id="edit-form" method="POST" class="w-8/12 flex flex-col gap-y-3 my-2">
                        @method('put')
                        @csrf
                        <input id="form-nim" class="border-2 rounded-lg py-2 px-3 w-full" type="text"
                            placeholder="Masukan Nim" name="nim">
                        <input id="form-name" class="border-2 rounded-lg py-2 px-3 w-full" type="text"
                            placeholder="Masukan Nama" name="name">
                        <input id="form-prodi" class="border-2 rounded-lg py-2 px-3 w-full" type="text"
                            placeholder="Masukan Prodi" name="prodi">

                        <div class="flex justify-center gap-x-6 mt-5">
                            <button id="close-modal-edit-btn" type="button"
                                class="bg-gray-400 hover:bg-gray-500 active:bg-gray-600 text-white rounded-lg px-5 py-2">
                                Close
                            </button>
                            <button id="edit-modal-btn" type="submit"
                                class="bg-green-500 hover:bg-green-600 active:bg-green-700 text-white rounded-lg px-4 py-2">Save
                                Change</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
