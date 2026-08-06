<x-login.layout>
    <x-toast />
    <div class="row g-0">
        <div class="col-xxl-3 col-lg-4 col-md-5">
            <div class="auth-full-page-content d-flex p-sm-5 p-4">
                <div class="w-100">
                    <div class="d-flex flex-column h-100">
                        <div class="mb-4 mb-md-5 text-center">
                            <a href="index.html" class="d-block auth-logo">
                                <img src="{{ asset('assets/images/logo-sm.svg') }}" alt="" height="100">
                                <span class="logo-txt"></span>
                            </a>
                            <p class="text-muted mt-2">IMPLEMENTASI METODE AHP DALAM SISTEM PENDUKUNG KEPUTUSAN UNTUK MENGUKUR MINAT MAHASISWA
                                DALAM MERANCANG USAHA
                            </p>
                        </div>

                        <div class="auth-content my-auto">
                            <div class="text-center">
                                <h5 class="mb-0">Welcome Back !</h5>
                                <p class="text-muted mt-2">Sign in to continue to UNIBA.</p>
                            </div>
                            <form class="mt-4 pt-2" method="POST" action="{{ route('register.proses') }}" novalidate>
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">NIM</label>
                                    <input type="number" class="form-control @error('nim') is-invalid @enderror"
                                        name="nim" id="nim" placeholder="Enter NIM"
                                        value="{{ old('nim') }}"
                                        inputmode="numeric">
                                    @error('nim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Enter name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fakultas</label>
                                    <select class="form-select @error('fakultas') is-invalid @enderror"
                                        id="fakultas" name="fakultas">
                                        <option value="">-- Pilih Fakultas --</option>
                                        <option value="FEB">Fakultas Ekonomi & Bisnis</option>
                                        <option value="FST">Fakultas Sains dan Teknologi</option>
                                        <option value="FBA">Fakultas Bahasa Asing</option>
                                        <option value="FIKOM">Fakultas Ilmu Komunikasi</option>
                                        <option value="FH">Fakultas Hukum</option>
                                    </select>
                                    @error('fakultas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Program Studi</label>
                                    <select class="form-select @error('prodi') is-invalid @enderror"
                                        id="prodi" name="prodi">
                                        <option value="">-- Pilih Fakultas Dulu --</option>
                                    </select>
                                    @error('prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Angkatan</label>
                                    <select class="form-select @error('angkatan') is-invalid @enderror"
                                        id="angkatan" name="angkatan">
                                        <option value="">-- Pilih Angkatan --</option>
                                        @foreach($angkatan as $item)
                                            <option value="{{ $item->angkatan }}" {{ old('angkatan') == $item->angkatan ? 'selected' : '' }}>{{ $item->angkatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('angkatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Enter email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="password" placeholder="Enter password">
                                        <button class="btn btn-light shadow-none ms-0" type="button"
                                            id="register-password-toggle"><i class="mdi mdi-eye-off-outline"
                                                id="registerPasswordIcon"></i></button>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="password_confirmation"
                                            placeholder="Confirm password">
                                        <button class="btn btn-light shadow-none ms-0" type="button"
                                            id="register-password-confirmation-toggle"><i class="mdi mdi-eye-off-outline"
                                                id="registerPasswordConfirmationIcon"></i></button>
                                    </div>
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">

                                        <div>
                                            <a href="{{ route('login') }}" class="text-muted">Already have an account? Sign In</a>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <button class="btn w-100 waves-effect waves-light" type="submit"
                                        style="background-color: #006634; border-color: #006634; color: #fff;">
                                        Register
                                    </button>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-outline-secondary w-100" type="reset">
                                        Reset
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="mt-4 mt-md-5 text-center">
                            <p class="mb-0">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> UNIBA . Crafted with
                                Ica
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end auth full page content -->
        </div>
        <!-- end col -->
        <div class="col-xxl-9 col-lg-8 col-md-7">
            <div class="auth-bg pt-md-5 p-4 d-flex">
                <div class="bg-overlay" style="background-color: #006634;"></div>
                <ul class="bg-bubbles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <!-- end bubble effect -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-7">
                        <div class="p-0 p-sm-4 px-xl-0">
                            <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">

                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <div class="testi-contain text-white">
                                            <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                            <h4 class="mt-4 fw-medium lh-base text-white">
                                                "Sistem pendukung keputusan ini membantu mahasiswa mengetahui tingkat minat berwirausaha secara lebih objektif berdasarkan hasil kuesioner dan perhitungan metode AHP."
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="testi-contain text-white">
                                            <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                            <h4 class="mt-4 fw-medium lh-base text-white">
                                                "Dengan adanya sistem ini, proses pengukuran minat berwirausaha mahasiswa menjadi lebih terstruktur, transparan, dan mudah dipahami."
                                            </h4>

                                        </div>
                                    </div>

                                    <div class="carousel-item">
                                        <div class="testi-contain text-white">
                                            <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                            <h4 class="mt-4 fw-medium lh-base text-white">
                                                "Metode AHP yang diterapkan pada sistem ini mampu membantu dalam menentukan tingkat minat mahasiswa terhadap dunia wirausaha berdasarkan beberapa kriteria penilaian."
                                            </h4>

                                        </div>
                                    </div>

                                </div>
                                <!-- end carousel-inner -->
                                <!-- end carousel-inner -->
                            </div>
                            <!-- end review carousel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
</x-login.layout>


<script>
    // Data mapping fakultas ke program studi
    const prodiMap = {
        'FEB': [{
                value: 'Akuntansi',
                text: 'Akuntansi'
            },
            {
                value: 'Manajemen',
                text: 'Manajemen'
            },
        ],
        'FST': [{
                value: 'Teknik Informatika',
                text: 'Teknik Informatika'
            },
            {
                value: 'Sistem Informasi',
                text: 'Sistem Informasi'
            },
            {
                value: 'Teknik Industri',
                text: 'Teknik Industri'
            }
        ],
        'FBA': [{
            value: 'Bahasa dan Kebudayaan Asing',
            text: 'Bahasa dan Kebudayaan Asing'
        }, ],
        'FIKOM': [{
            value: 'Kajian Film, Televisi, dan Media',
            text: 'Kajian Film, Televisi, dan Media'
        }, ],
        'FH': [{
            value: 'Hukum Bisnis',
            text: 'Hukum Bisnis'
        }, ]
    };

    // Handle fakultas change in register form
    const fakultasSelect = document.getElementById('fakultas');
    const prodiSelect = document.getElementById('prodi');

    if (fakultasSelect && prodiSelect) {
        fakultasSelect.addEventListener('change', function() {
            prodiSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>';

            if (this.value && prodiMap[this.value]) {
                prodiMap[this.value].forEach(prodi => {
                    const option = document.createElement('option');
                    option.value = prodi.value;
                    option.textContent = prodi.text;
                    prodiSelect.appendChild(option);
                });
            }
        });
    }
</script>

<script>
    const registerPasswordToggle = document.getElementById('register-password-toggle');
    const registerPasswordConfirmationToggle = document.getElementById('register-password-confirmation-toggle');

    function setupToggle(button, inputId, iconId) {
        if (!button) return;
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('mdi-eye-off-outline');
                icon.classList.add('mdi-eye-outline');
            } else {
                input.type = 'password';
                icon.classList.remove('mdi-eye-outline');
                icon.classList.add('mdi-eye-off-outline');
            }
        });
    }

    setupToggle(registerPasswordToggle, 'password', 'registerPasswordIcon');
    setupToggle(registerPasswordConfirmationToggle, 'password_confirmation', 'registerPasswordConfirmationIcon');
</script>