<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
     
        <div class="row">

            <div class="col-md-12 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Create pedagang</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pedagang.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone_number">Nomor HP</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="legalitas_perizinan">Legalitas Perizinan</label>
                                <input type="text" class="form-control" id="legalitas_perizinan" name="legalitas_perizinan" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
