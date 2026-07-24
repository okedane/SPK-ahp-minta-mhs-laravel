<x-app>
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <h4 class="card-title mb-0">Rekap Akun User</h4>
                    <form method="GET" action="{{ route('rekap.index') }}" class="d-flex gap-2 flex-wrap align-items-center">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama / email"
                            value="{{ request('search') }}">

                        <select name="prodi" class="form-select">
                            <option value="">Semua Jurusan/Prodi</option>
                            @foreach($prodiOptions as $prodi)
                                <option value="{{ $prodi }}" {{ request('prodi') == $prodi ? 'selected' : '' }}>{{ $prodi }}</option>
                            @endforeach
                        </select>

                        <select name="fakultas" class="form-select">
                            <option value="">Semua Fakultas</option>
                            @foreach($fakultasOptions as $fakultas)
                                <option value="{{ $fakultas }}" {{ request('fakultas') == $fakultas ? 'selected' : '' }}>{{ $fakultas }}</option>
                            @endforeach
                        </select>

                        <select name="angkatan" class="form-select">
                            <option value="">Semua Angkatan</option>
                            @foreach($angkatanOptions as $angkatan)
                                <option value="{{ $angkatan }}" {{ request('angkatan') == $angkatan ? 'selected' : '' }}>{{ $angkatan }}</option>
                            @endforeach
                        </select>

                        <button class="btn btn-primary" type="submit">Terapkan</button>
                        <a href="{{ route('rekap.index') }}" class="btn btn-outline-secondary">Reset</a>
                    </form>
                </div>

                <div class="card-body">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th style="width:60px;">
                                    <a href="{{ route('rekap.index', array_merge(request()->query(), ['sort' => 'id', 'order' => request('order') == 'asc' && request('sort') == 'id' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        No {{ request('sort') == 'id' ? (request('order') == 'asc' ? '↑' : '↓') : '' }}
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('rekap.index', array_merge(request()->query(), ['sort' => 'name', 'order' => request('order') == 'asc' && request('sort') == 'name' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Nama {{ request('sort') == 'name' ? (request('order') == 'asc' ? '↑' : '↓') : '' }}
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('rekap.index', array_merge(request()->query(), ['sort' => 'email', 'order' => request('order') == 'asc' && request('sort') == 'email' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Email {{ request('sort') == 'email' ? (request('order') == 'asc' ? '↑' : '↓') : '' }}
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('rekap.index', array_merge(request()->query(), ['sort' => 'prodi', 'order' => request('order') == 'asc' && request('sort') == 'prodi' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Jurusan/Prodi {{ request('sort') == 'prodi' ? (request('order') == 'asc' ? '↑' : '↓') : '' }}
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('rekap.index', array_merge(request()->query(), ['sort' => 'fakultas', 'order' => request('order') == 'asc' && request('sort') == 'fakultas' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Fakultas {{ request('sort') == 'fakultas' ? (request('order') == 'asc' ? '↑' : '↓') : '' }}
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('rekap.index', array_merge(request()->query(), ['sort' => 'angkatan', 'order' => request('order') == 'asc' && request('sort') == 'angkatan' ? 'desc' : 'asc'])) }}" class="text-decoration-none text-dark">
                                        Angkatan {{ request('sort') == 'angkatan' ? (request('order') == 'asc' ? '↑' : '↓') : '' }}
                                    </a>
                                </th>
                                <th style="width:120px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rekaps as $index => $rekap)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $rekap['user']->profile->nim ?? '-' }}</td>
                                    <td>{{ $rekap['user']->name ?? '-' }}</td>
                                    <td>{{ $rekap['user']->email ?? '-' }}</td>
                                    <td>{{ $rekap['user']->profile->prodi ?? '-' }}</td>
                                    <td>{{ $rekap['user']->profile->fakultas ?? '-' }}</td>
                                    <td>{{ $rekap['user']->profile->angkatan ?? '-' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('rekap.show', $rekap['user']->id) }}" class="btn btn-soft-primary btn-sm">
                                            <i class="mdi mdi-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data rekap belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app>
