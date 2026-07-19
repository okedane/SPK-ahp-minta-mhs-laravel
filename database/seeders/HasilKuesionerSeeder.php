<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kriteria;
use App\Models\KlasifikasiPenilaian;
use App\Models\HasilKuesioner;

class HasilKuesionerSeeder extends Seeder
{
    /**
     * Generate hasil_kuesioners dari 64 jawaban asli mahasiswa (data_bersih_5_.xlsx).
     * Perhitungan meniru persis logic KuesionerController@store:
     * - tiap kriteria diisi 4 jawaban (P1-P4=C1, P5-P8=C2, P9-P12=C3, P13-P16=C4, P17-P20=C5)
     * - avg per kriteria dikali bobot kriteria (ambil live dari tabel kriterias)
     * - nilai_akhir = total semua nilai_terbobot, lalu dicocokkan ke klasifikasi_penilaians
     *
     * Butuh KriteriaSeeder, KlasifikasiPenilaianSeeder, dan UserProfileSeeder sudah
     * dijalankan lebih dulu (lihat DatabaseSeeder).
     */
    public function run(): void
    {
        $mahasiswa = [
            ['nim' => '2502110006', 'dup' => 1, 'jawaban' => [5,5,5,5,3,3,4,4,3,3,3,4,4,4,4,4,4,3,3,4]],
            ['nim' => '2202110014', 'dup' => 1, 'jawaban' => [5,5,5,4,5,4,4,4,4,4,4,4,4,4,2,4,4,3,3,3]],
            ['nim' => '2302110025', 'dup' => 1, 'jawaban' => [5,5,5,4,5,5,5,4,4,5,5,5,5,5,4,4,4,5,5,4]],
            ['nim' => '2202110033', 'dup' => 1, 'jawaban' => [4,4,4,4,4,4,4,3,4,4,4,4,4,4,4,4,4,4,3,3]],
            ['nim' => '2202110023', 'dup' => 1, 'jawaban' => [5,3,4,5,3,4,3,4,3,3,3,5,4,4,5,3,4,4,3,3]],
            ['nim' => '2202110017', 'dup' => 1, 'jawaban' => [4,5,5,5,5,5,4,5,5,5,5,5,5,4,4,4,4,4,3,3]],
            ['nim' => '2402110082', 'dup' => 1, 'jawaban' => [5,5,5,5,5,5,5,5,3,3,5,5,3,4,5,3,2,2,1,2]],
            ['nim' => '2402110006', 'dup' => 1, 'jawaban' => [5,5,5,5,5,5,5,5,5,5,5,5,5,3,5,3,5,5,5,5]],
            ['nim' => '2502610013', 'dup' => 1, 'jawaban' => [4,4,4,5,1,2,1,3,2,2,1,1,5,2,2,4,2,1,1,1]],
            ['nim' => '2502610015', 'dup' => 1, 'jawaban' => [3,2,3,3,2,3,2,2,2,3,2,4,3,2,3,2,2,2,2,2]],
            ['nim' => '2502610001', 'dup' => 1, 'jawaban' => [5,3,5,5,4,5,5,5,3,3,2,3,3,3,3,3,2,2,1,3]],
            ['nim' => '2502610012', 'dup' => 1, 'jawaban' => [5,5,4,4,4,4,4,4,4,4,4,4,5,4,3,4,4,5,3,3]],
            ['nim' => '2502610007', 'dup' => 1, 'jawaban' => [3,3,4,4,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3]],
            ['nim' => '2502610017', 'dup' => 1, 'jawaban' => [5,4,4,4,3,4,3,3,3,3,4,4,4,4,3,3,2,2,2,2]],
            ['nim' => '2402610102', 'dup' => 1, 'jawaban' => [4,3,3,3,2,2,3,3,2,2,2,4,3,2,4,4,2,2,2,2]],
            ['nim' => '2402810002', 'dup' => 1, 'jawaban' => [5,3,4,3,3,3,3,3,1,1,3,4,3,2,4,4,2,1,1,2]],
            ['nim' => '2402810037', 'dup' => 1, 'jawaban' => [5,5,5,4,5,5,5,4,5,5,3,1,3,5,5,5,3,3,3,3]],
            ['nim' => '2402810012', 'dup' => 1, 'jawaban' => [5,5,4,5,3,3,3,2,3,3,4,4,3,3,5,4,2,1,1,1]],
            ['nim' => '2402810011', 'dup' => 1, 'jawaban' => [5,5,5,5,5,5,5,5,3,4,5,5,3,2,5,5,5,5,5,5]],
            ['nim' => '2402810009', 'dup' => 1, 'jawaban' => [4,5,5,5,4,4,4,3,4,4,4,5,3,4,5,5,2,1,2,1]],
            ['nim' => '2402810004', 'dup' => 1, 'jawaban' => [4,5,5,5,4,4,4,3,4,4,4,5,3,4,5,5,1,1,2,1]],
            ['nim' => '2402810005', 'dup' => 1, 'jawaban' => [4,3,4,5,4,4,3,3,4,4,5,3,4,5,3,4,3,4,3,4]],
            ['nim' => '2402810068', 'dup' => 1, 'jawaban' => [4,4,3,3,4,3,3,3,4,3,5,4,3,3,4,2,4,3,4,4]],
            ['nim' => '2402810011', 'dup' => 2, 'jawaban' => [3,4,4,4,3,3,3,1,2,2,3,4,4,3,5,5,1,2,1,2]],
            ['nim' => '2202310041', 'dup' => 1, 'jawaban' => [4,4,5,5,4,4,4,4,4,4,4,3,3,3,3,4,4,4,3,4]],
            ['nim' => '2202310062', 'dup' => 1, 'jawaban' => [3,4,3,4,4,4,4,4,3,4,4,4,4,4,4,4,4,4,4,4]],
            ['nim' => '2420310188', 'dup' => 1, 'jawaban' => [3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3]],
            ['nim' => '2402310198', 'dup' => 1, 'jawaban' => [3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3]],
            ['nim' => '2202310067', 'dup' => 1, 'jawaban' => [4,3,3,3,4,4,3,4,4,4,4,2,4,3,4,2,3,2,3,3]],
            ['nim' => '220210065', 'dup' => 1, 'jawaban' => [5,5,5,5,4,4,4,4,3,3,3,4,4,4,4,4,4,3,3,4]],
            ['nim' => '2202310023', 'dup' => 1, 'jawaban' => [4,4,4,4,4,4,4,4,3,4,4,3,4,4,4,4,4,4,4,4]],
            ['nim' => '2202310057', 'dup' => 1, 'jawaban' => [5,5,5,4,5,4,4,4,4,4,4,4,5,5,5,4,3,3,3,3]],
            ['nim' => '2502710026', 'dup' => 1, 'jawaban' => [4,4,5,4,3,4,3,3,2,3,3,2,4,3,4,3,3,2,2,2]],
            ['nim' => '2402710005', 'dup' => 1, 'jawaban' => [4,5,4,5,4,4,4,4,4,3,3,4,4,3,5,4,4,4,3,3]],
            ['nim' => '2402710013', 'dup' => 1, 'jawaban' => [5,3,4,3,3,4,3,4,4,4,4,4,4,3,5,4,2,2,2,2]],
            ['nim' => '2402710012', 'dup' => 1, 'jawaban' => [4,4,4,4,4,4,4,5,4,4,4,4,4,4,3,3,4,3,4,4]],
            ['nim' => '2402710011', 'dup' => 1, 'jawaban' => [4,3,3,3,3,3,3,4,4,3,4,3,3,4,4,3,3,2,3,2]],
            ['nim' => '2402710007', 'dup' => 1, 'jawaban' => [4,4,3,3,3,3,3,4,3,3,3,4,4,4,5,4,2,1,1,1]],
            ['nim' => '2402710009', 'dup' => 1, 'jawaban' => [4,3,4,4,4,5,4,5,2,3,3,4,4,4,2,5,5,4,4,4]],
            ['nim' => '2402710015', 'dup' => 1, 'jawaban' => [4,4,4,4,3,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['nim' => '2202210109', 'dup' => 1, 'jawaban' => [4,3,4,4,5,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['nim' => '2302210363', 'dup' => 1, 'jawaban' => [5,4,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5]],
            ['nim' => '2302210266', 'dup' => 1, 'jawaban' => [5,5,5,5,4,2,5,2,4,3,4,5,5,3,3,3,3,3,3,4]],
            ['nim' => '2502210209', 'dup' => 1, 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['nim' => '2302210627', 'dup' => 1, 'jawaban' => [4,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4,2,4,3,4]],
            ['nim' => '2302210398', 'dup' => 1, 'jawaban' => [5,4,5,5,5,4,4,4,4,4,4,4,5,4,4,4,4,4,4,4]],
            ['nim' => '2502210195', 'dup' => 1, 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['nim' => '2502210214', 'dup' => 1, 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['nim' => '2202510003', 'dup' => 1, 'jawaban' => [4,4,4,3,3,3,3,4,3,3,3,4,3,3,4,3,3,3,3,2]],
            ['nim' => '2402510085', 'dup' => 1, 'jawaban' => [5,5,5,5,3,3,3,3,3,3,4,5,3,3,5,4,1,1,1,1]],
            ['nim' => '2302510048', 'dup' => 1, 'jawaban' => [4,5,5,3,2,3,3,3,3,3,4,5,4,3,5,4,2,2,1,2]],
            ['nim' => '2302510139', 'dup' => 1, 'jawaban' => [3,4,3,4,4,4,4,4,4,4,4,5,3,1,5,4,2,3,4,4]],
            ['nim' => '2402510026', 'dup' => 1, 'jawaban' => [5,5,4,4,3,3,3,3,2,2,3,4,4,4,4,4,2,2,1,1]],
            ['nim' => '2402510030', 'dup' => 1, 'jawaban' => [4,3,4,4,4,4,4,3,4,4,5,4,4,4,3,4,4,2,4,4]],
            ['nim' => '2402510027', 'dup' => 1, 'jawaban' => [4,5,4,4,5,4,5,4,4,3,5,4,4,5,4,4,4,5,4,4]],
            ['nim' => '2402510029', 'dup' => 1, 'jawaban' => [4,4,4,4,3,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['nim' => '2502410027', 'dup' => 1, 'jawaban' => [5,4,4,5,4,5,4,5,4,5,4,5,5,5,5,5,5,4,4,5]],
            ['nim' => '2202410009', 'dup' => 1, 'jawaban' => [4,5,4,5,4,4,4,3,3,3,3,4,5,4,5,4,5,3,3,3]],
            ['nim' => '2502420056', 'dup' => 1, 'jawaban' => [5,5,5,5,5,5,5,5,5,5,5,5,5,4,5,5,5,5,5,5]],
            ['nim' => '2402410066', 'dup' => 1, 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,5,5,3,5,5,2,1,1,1]],
            ['nim' => '2402410002', 'dup' => 1, 'jawaban' => [4,4,3,5,4,4,3,4,4,4,4,4,4,5,4,5,4,4,4,4]],
            ['nim' => '2402410062', 'dup' => 1, 'jawaban' => [4,3,5,4,4,3,5,4,5,4,4,5,4,5,3,4,4,4,5,4]],
            ['nim' => '2402410063', 'dup' => 1, 'jawaban' => [3,3,3,3,4,4,3,3,5,4,3,4,4,3,3,2,3,3,3,3]],
            ['nim' => '2402410069', 'dup' => 1, 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
        ];

        // ambil kriteria terurut sama seperti di KuesionerController (urutan id = urutan C1..C5)
        $kriteriaList = Kriteria::orderBy('id')->get();

        if ($kriteriaList->count() !== 5) {
            $this->command->error('Kriteria belum lengkap (harus 5). Jalankan KriteriaSeeder dulu.');
            return;
        }

        $created = 0;
        $skipped = 0;

        foreach ($mahasiswa as $m) {
            $emailNim = $m['dup'] > 1 ? $m['nim'] . '-' . $m['dup'] : $m['nim'];
            $email    = $emailNim . '@student.unibamadura.ac.id';

            $user = User::where('email', $email)->first();

            if (!$user) {
                $this->command->warn("User dengan email {$email} tidak ditemukan, dilewati.");
                $skipped++;
                continue;
            }

            // pecah 20 jawaban jadi 5 kelompok @4 pertanyaan, sesuai urutan kriteria
            $jawabanPerKriteria = array_chunk($m['jawaban'], 4);

            $nilaiPerKriteria = [];
            $nilaiAkhir       = 0;

            foreach ($kriteriaList as $ki => $k) {
                $jawaban = $jawabanPerKriteria[$ki] ?? [];
                $avg     = count($jawaban) > 0
                    ? round(array_sum($jawaban) / count($jawaban), 4)
                    : 0;

                $nilaiTerbobot = round($avg * (float) $k->bobot, 4);
                $nilaiAkhir   += $nilaiTerbobot;

                $nilaiPerKriteria[] = [
                    'kriteria_id'    => $k->id,
                    'kode'           => $k->kode,
                    'nama'           => $k->nama,
                    'bobot'          => (float) $k->bobot,
                    'nilai'          => $avg,
                    'nilai_terbobot' => $nilaiTerbobot,
                ];
            }

            $nilaiAkhir = round($nilaiAkhir, 3);

            // rentang klasifikasi (nilai_min/nilai_max) dibuat pakai 2 desimal (mis. 3.67 / 3.68),
            // sedangkan nilai_akhir dihitung 3 desimal (mis. 3.677) -> bisa jatuh di "celah" antar
            // rentang dan gak ketemu klasifikasi manapun. Solusinya, cocokkan pakai versi 2 desimal.
            $nilaiUntukKlasifikasi = round($nilaiAkhir, 2);

            $klasifikasi = KlasifikasiPenilaian::where('nilai_min', '<=', $nilaiUntukKlasifikasi)
                ->where('nilai_max', '>=', $nilaiUntukKlasifikasi)
                ->first();

            // fallback terakhir: kalau tetap gak ketemu (misal nilai di luar rentang 1.00-5.00),
            // ambil kategori dengan titik tengah rentang paling dekat, biar kolom NOT NULL aman.
            if (!$klasifikasi) {
                $klasifikasi = KlasifikasiPenilaian::query()
                    ->get()
                    ->sortBy(fn ($k) => abs((($k->nilai_min + $k->nilai_max) / 2) - $nilaiUntukKlasifikasi))
                    ->first();
            }

            if (!$klasifikasi) {
                // seharusnya gak akan pernah kejadian karena ada fallback di atas,
                // tapi tetap dijaga biar gak lolos ke database dengan FK null.
                $this->command->error("Nilai akhir {$nilaiAkhir} (user {$user->email}) gagal dapat klasifikasi, dilewati.");
                $skipped++;
                continue;
            }

            HasilKuesioner::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'klasifikasi_penilaian_id' => $klasifikasi?->id,
                    'nilai_akhir'               => $nilaiAkhir,
                    'nilai_per_kriteria'        => json_encode($nilaiPerKriteria),
                    'jawaban_raw'               => json_encode($jawabanPerKriteria),
                ]
            );

            $created++;
        }

        $this->command->info("Seeded {$created} hasil_kuesioner (skip: {$skipped}).");
    }
}