<div class="col-12">
    <form id="formAdd">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Data Petugas
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <div class="m-auto"></div>
                        <button type="button" class="btn btn-outline-primary btn-data">
                            <i class="nav-icon i-Pen-2 font-weight-bold"></i> Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama">
                    <div class="invalid-feedback error-nama"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control telepon" name="telepon" id="telepon" placeholder="masukkan telepon">
                    <div class="invalid-feedback error-telepon"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" class="form-control tempat_lahir" name="tempat_lahir" id="tempat-lahir" placeholder="masukkan tempat lahir">
                    <div class="invalid-feedback error-tempat_lahir"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="tanggal-lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" id="tanggal-lahir" placeholder="masukkan tanggal lahir">
                    <div class="invalid-feedback error-tanggal_lahir"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control foto" name="foto" id="foto" placeholder="masukkan foto">
                    <div class="invalid-feedback error-foto"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control username" name="username" id="username" placeholder="masukkan username">
                    <div class="invalid-feedback error-username"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control password" name="password" id="password" placeholder="masukkan password">
                    <div class="invalid-feedback error-password"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control email" name="email" id="email" placeholder="masukkan email">
                    <div class="invalid-feedback error-email"></div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mc-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn  btn-primary m-1 btn-save">Simpan</button>
                            <button type="button" class="btn btn-outline-secondary m-1 btn-data">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
