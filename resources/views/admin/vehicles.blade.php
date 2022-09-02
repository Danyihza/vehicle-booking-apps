@extends('admin._layouts.master')

@section('title', 'Dashboard')

@php
$state = 'vehicles';
@endphp

@section('content')
<main>
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <div class="mb-1 w-full">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href=""
                                    class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Vehicles</a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All Vehicles</h1>
            </div>
            <div class="sm:flex">
                <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                    <form class="lg:pr-3" action="#" method="GET">
                        <label for="users-search" class="sr-only">Search</label>
                        <div class="mt-1 relative lg:w-64 xl:w-96">
                            <input type="text" name="email" id="users-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Search for vehicles">
                        </div>
                    </form>
                    <div class="flex space-x-1 pl-0 sm:pl-2 mt-3 sm:mt-0">
                    </div>
                </div>
                <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                    <label for="modal-insert"
                        class="w-1/2 cursor-pointer text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add vehicle
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden">
                    <table class="table-fixed min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Nama/Tipe Kendaraan
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Asal
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="p-4">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($vehicles as $data)
                            <tr class="hover:bg-gray-100">
                                <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                    <img class="w-20 rounded-xl" src="{{ asset('images') . '/' . $data->image }}"
                                        alt="">
                                    <div class="text-sm font-normal text-gray-500">
                                        <div class="flex flex-row items-center">
                                            <div class="text-base font-semibold text-gray-900">{{ $data->name }}</div>
                                            <a class="ml-1" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="text-sm font-normal text-gray-500">
                                            {{ $data->type }}
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                    {{$data->origin}}
                                </td>
                                <td class="p-4 whitespace-nowrap text-base font-normal text-gray-900">
                                    <div class="flex items-center">
                                        @if($data->is_active)
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Active
                                        @else
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Not Active
                                        @endif
                                    </div>
                                </td>
                                <td class="p-4 whitespace-nowrap space-x-2">
                                    <label for="modal-edit-{{ $data->id }}"
                                        class="text-white cursor-pointer bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Edit
                                    </label>
                                    <label for="modal-delete-{{$data->id}}"
                                        class="cursor-pointer text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Delete
                                    </label>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center h-12 text-gray-500 italic">
                                    Data belum tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div
        class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
        <div class="flex items-center mb-4 sm:mb-0">
            <a href="#"
                class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#"
                class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <span class="text-sm font-normal text-gray-500">Showing <span
                    class="text-gray-900 font-semibold">1-20</span> of <span
                    class="text-gray-900 font-semibold">2290</span></span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="#"
                class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                <svg class="-ml-1 mr-1 h-5 w-5" " fill=" currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Previous
            </a>
            <a href="#"
                class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                Next
                <svg class="-mr-1 ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>

</main>

<input type="checkbox" id="modal-insert" class="modal-toggle" />
<label for="modal-insert" class="modal cursor-pointer">
    <label class="modal-box relative" for="">
        <h3 class="text-lg font-bold">Add Vehicle</h3>
        <form action="{{ route('admin.vehicles.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mt-4">
                <div class="form-control w-full my-2">
                    <label class="label">
                        <span class="label-text">Nama Kendaraan</span>
                    </label>
                    <input type="text" name="name" placeholder="Type here" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Tipe Kendaraan</span>
                    </label>
                    <select class="select select-bordered font-normal" name="type">
                        <option value="Angkutan Orang">Angkutan Orang</option>
                        <option value="Angkutan Barang">Angkutan Barang</option>
                    </select>
                </div>
                <div class="form-control w-full my-2">
                    <label class="label">
                        <span class="label-text">Asal</span>
                    </label>
                    <input type="text" placeholder="Type here" name="origin" value="Milik Perusahaan"
                        class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full my-2">
                    <label class="block mb-2 label-text" for="file_input">Upload gambar</label>
                    <input name="image"
                        class="block w-full text-sm bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                        id="file_input" type="file">
                </div>
                <div class="form-control w-full my-2">
                    <label for="default-toggle" class="inline-flex relative items-center mb-4 cursor-pointer">
                        <input type="checkbox" value="on" id="default-toggle" name="is_active" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-cyan-300 dark:peer-focus:ring-cyan-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</span>
                    </label>
                </div>
                <div class="flex justify-end">
                    <label for="modal-insert"
                        class="mr-2 text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Batal
                    </label>
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </label>
</label>

@foreach($vehicles as $data)
<input type="checkbox" id="modal-delete-{{ $data->id }}" class="modal-toggle" />
<label for="modal-delete-{{ $data->id }}" class="modal cursor-pointer">
    <label class="modal-box relative" for="">
        <h3 class="text-lg font-bold">Are you sure to delete this data ?</h3>
        <div class="flex justify-end mt-4">
            <label for="modal-delete-{{ $data->id }}"
                class="cursor-pointer text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm inline-flex items-center px-6 py-2 text-center mr-2">No</label>
            <a href="{{ route('admin.vehicles.delete', $data->id) }}"
                class="cursor-pointer text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-6 py-2 text-center">Yes</a>
        </div>
    </label>
</label>
@endforeach

@foreach($vehicles as $data)
<input type="checkbox" id="modal-edit-{{ $data->id }}" class="modal-toggle" />
<label for="modal-edit-{{ $data->id }}" class="modal cursor-pointer">
    <label class="modal-box relative" for="">
        <h3 class="text-lg font-bold">Edit Vehicle</h3>
        <form action="{{ route('admin.vehicles.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mt-4">
                <div class="form-control w-full my-2">
                    <label class="label">
                        <span class="label-text">Nama Kendaraan</span>
                    </label>
                    <input type="text" value="{{ $data->name }}" name="name" placeholder="Type here" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Tipe Kendaraan</span>
                    </label>
                    <select class="select select-bordered font-normal" name="type">
                        <option {{ $data->type == "Angkutan Orang" ? 'selected' : '' }} value="Angkutan Orang">Angkutan Orang</option>
                        <option {{ $data->type == "Angkutan Barang" ? 'selected' : '' }} value="Angkutan Barang">Angkutan Barang</option>
                    </select>
                </div>
                <div class="form-control w-full my-2">
                    <label class="label">
                        <span class="label-text">Asal</span>
                    </label>
                    <input type="text" placeholder="Type here" name="origin" value="{{ $data->origin }}"
                        class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full my-2">
                    <label class="block mb-2 label-text" for="file_input">Upload gambar</label>
                    <input name="image"
                        class="block w-full text-sm bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                        id="file_input" type="file">
                </div>
                <div class="form-control w-full my-2">
                    <label for="default-toggle" class="inline-flex relative items-center mb-4 cursor-pointer">
                        <input type="checkbox" value="on" id="default-toggle" name="is_active" class="sr-only peer" {{ $data->is_active ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-cyan-300 dark:peer-focus:ring-cyan-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-cyan-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</span>
                    </label>
                </div>
                <div class="flex justify-end">
                    <label for="modal-edit-{{ $data->id }}"
                        class="mr-2 text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Batal
                    </label>
                    <button type="submit"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </label>
</label>
@endforeach
@endsection
