@extends('layouts.master')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Table barang</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                            barang</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Harga Beli</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga Jual</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $b)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $b->nama_barang}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $b->harga_beli}}</p>
                                                <p class="text-xs text-secondary mb-0">Organization</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span>{{ $b->harga_jual }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex gap-2 justify-content-center">
                                                    {{-- Ganti $user->id menjadi $u->id --}}
                                                    <form action="{{ route('barang.edit', $b->id) }}" method="GET"
                                                        style="display:inline;">
                                                        <button type="submit" class="button-style button-edit">Edit</button>
                                                    </form>

                                                    {{-- Ganti $b->id menjadi $u->id --}}
                                                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="button-style button-delete">Hapus</button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')

    <style>
        /* ====== BUTTON STYLE ====== */
        .button-style {
            border-radius: 30px;
            /* pill shape */
            font-weight: 500;
            padding: 10px 22px;
            /* lebih besar */
            font-size: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .button-create {
            border-radius: 25px;
            font-weight: 600;
            padding: 10px 22px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            color: #fff;
            background-color: blue;
            transition: all 0.2s ease;
        }

        /* Edit button */
        .button-edit {
            background-color: #fef4cd;
            color: #eab308;
            border: 1px solid #eab308;
        }

        .button-edit:hover {
            background-color: #eab308;
        }

        /* Delete button */
        .button-delete {
            background-color: #ef4444;
            color: #fff;
            border: 1px solid #dc2626;
        }

        .button-delete:hover {
            background-color: #dc2626;
        }

        /* Spacing antar tombol */
        .d-flex.gap-2>* {
            margin: 0 5px;
        }
    </style>

@endpush