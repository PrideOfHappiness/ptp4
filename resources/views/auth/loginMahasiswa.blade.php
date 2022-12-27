@extends('Navbar\navbar')

@section('isiNavbar')
<body>
    <div class="auth">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center mb-3">Portal Mahasiswa</h3>
                            <form action="{{ route('loginMhs') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="nim" class="form-control mb-3" id="nim" placeholder="NIM" autofocus required>
                                        @error('nim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control mb-3" id="passMhs" name="password" placeholder="Password" required>
                                </div>
                                <input type="hidden" id="hak_akses" name="hak_akses" value="Mahasiswa">
                                <div class="form-group form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="rmbMhs">
                                    <label class="form-check-label">Remember me</label>
                                </div>
                                <button type="submit" class="w-100 btn btn-primary btn-lg">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
