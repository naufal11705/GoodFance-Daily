@extends('layouts.template')
@section('content')

<div class="container px-4">
    <div class="mt-3 py-2" style="margin: auto; width: 50%;">
        <h2 class="fw-bold">Manage your Profiles</h2>

        <!-- Edit name -->
        <div class="container rounded-top bg-white mt-3">
            <p class="pt-2 fw-normal">Edit your name here</p>
            <div class="pt-3 fs-3 fw-bolder">{{ Auth::user()->name }}
                <span>
                    <button type="button" class="btn border-0 fs-5 ps-0" data-bs-toggle="modal" data-bs-whatever="EditNama" data-bs-target="#nama">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </span>
                    
                <!-- Modal -->
                <div class="modal fade" id="nama" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bolder" id="staticBackdropLabel">Edit your name</h1>
                                <button type="button" class="btn-close fs-5" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" id="edit-nama" placeholder="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-info fw-normal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit nmr telepon -->
        <div class="container bg-white mt-3">
            <p class="pt-2 fw-normal">Edit Nomor Telepon</p>
            <div class="pt-3 fs-6 fw-bolder position-relative">Nomor Telepon
                <span>
                    <button type="button" class="btn border-0 fs-5 position-absolute" style="right: 0;" data-bs-toggle="modal" data-bs-whatever="NmrTelepon" data-bs-target="#telepon">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </span>
                    
                <!-- Modal -->
                <div class="modal fade" id="telepon" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bolder" id="staticBackdropLabel">Edit Nomor Telepon</h1>
                                <button type="button" class="btn-close fs-5" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" id="nmr-telepon" placeholder="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-info fw-normal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2 fs-6">
                <p>0813746721647</p>
            </div>
        </div>
    </div>
</div>
@endsection