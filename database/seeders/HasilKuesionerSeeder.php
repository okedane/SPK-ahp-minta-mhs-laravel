<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kriteria;
use App\Models\KlasifikasiPenilaian;
use App\Models\HasilKuesioner;

class HasilKuesionerSeeder extends Seeder
{
    
    public function run(): void
    {
        $mahasiswa = [
            ['dup' => 1, 'email_local' => 'yuliana06', 'jawaban' => [5,5,5,5,3,3,4,4,3,3,3,4,4,4,4,4,4,3,3,4]],
            ['dup' => 1, 'email_local' => 'nurriskiah14', 'jawaban' => [5,5,5,4,5,4,4,4,4,4,4,4,4,4,2,4,4,3,3,3]],
            ['dup' => 1, 'email_local' => 'kholifatullayliyah25', 'jawaban' => [5,5,5,4,5,5,5,4,4,5,5,5,5,5,4,4,4,5,5,4]],
            ['dup' => 1, 'email_local' => 'dinaalifiyah33', 'jawaban' => [4,4,4,4,4,4,4,3,4,4,4,4,4,4,4,4,4,4,3,3]],
            ['dup' => 1, 'email_local' => 'aldiyanafitriyanti23', 'jawaban' => [5,3,4,5,3,4,3,4,3,3,3,5,4,4,5,3,4,4,3,3]],
            ['dup' => 1, 'email_local' => 'fitrinurhayati17', 'jawaban' => [4,5,5,5,5,5,4,5,5,5,5,5,5,4,4,4,4,4,3,3]],
            ['dup' => 1, 'email_local' => 'selviyanti82', 'jawaban' => [5,5,5,5,5,5,5,5,3,3,5,5,3,4,5,3,2,2,1,2]],
            ['dup' => 1, 'email_local' => 'mohdaifan06', 'jawaban' => [5,5,5,5,5,5,5,5,5,5,5,5,5,3,5,3,5,5,5,5]],
            ['dup' => 1, 'email_local' => 'anisaafnada13', 'jawaban' => [4,4,4,5,1,2,1,3,2,2,1,1,5,2,2,4,2,1,1,1]],
            ['dup' => 1, 'email_local' => 'fia15', 'jawaban' => [3,2,3,3,2,3,2,2,2,3,2,4,3,2,3,2,2,2,2,2]],
            ['dup' => 1, 'email_local' => 'ermawulandariirwani01', 'jawaban' => [5,3,5,5,4,5,5,5,3,3,2,3,3,3,3,3,2,2,1,3]],
            ['dup' => 1, 'email_local' => 'shafiyatuljamilah12', 'jawaban' => [5,5,4,4,4,4,4,4,4,4,4,4,5,4,3,4,4,5,3,3]],
            ['dup' => 1, 'email_local' => 'lutfiyatulqoribah07', 'jawaban' => [3,3,4,4,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3]],
            ['dup' => 1, 'email_local' => 'nursinainiangelinafairuskhan17', 'jawaban' => [5,4,4,4,3,4,3,3,3,3,4,4,4,4,3,3,2,2,2,2]],
            ['dup' => 1, 'email_local' => 'nakitacantikadewi02', 'jawaban' => [4,3,3,3,2,2,3,3,2,2,2,4,3,2,4,4,2,2,2,2]],
            ['dup' => 1, 'email_local' => 'iskawimah02', 'jawaban' => [5,3,4,3,3,3,3,3,1,1,3,4,3,2,4,4,2,1,1,2]],
            ['dup' => 1, 'email_local' => 'kasfilhairudin37', 'jawaban' => [5,5,5,4,5,5,5,4,5,5,3,1,3,5,5,5,3,3,3,3]],
            ['dup' => 1, 'email_local' => 'faridramdhani12', 'jawaban' => [5,5,4,5,3,3,3,2,3,3,4,4,3,3,5,4,2,1,1,1]],
            ['dup' => 1, 'email_local' => 'laitsfebrianto11', 'jawaban' => [5,5,5,5,5,5,5,5,3,4,5,5,3,2,5,5,5,5,5,5]],
            ['dup' => 1, 'email_local' => 'saviraekayuliawati09', 'jawaban' => [4,5,5,5,4,4,4,3,4,4,4,5,3,4,5,5,2,1,2,1]],
            ['dup' => 1, 'email_local' => 'auraaisyah04', 'jawaban' => [4,5,5,5,4,4,4,3,4,4,4,5,3,4,5,5,1,1,2,1]],
            ['dup' => 1, 'email_local' => 'arjundarmisi05', 'jawaban' => [4,3,4,5,4,4,3,3,4,4,5,3,4,5,3,4,3,4,3,4]],
            ['dup' => 1, 'email_local' => 'andikaalifseptiono68', 'jawaban' => [4,4,3,3,4,3,3,3,4,3,5,4,3,3,4,2,4,3,4,4]],
            ['dup' => 2, 'email_local' => 'auraintanwulandari11', 'jawaban' => [3,4,4,4,3,3,3,1,2,2,3,4,4,3,5,5,1,2,1,2]],
            ['dup' => 1, 'email_local' => 'dianisramadhani41', 'jawaban' => [4,4,5,5,4,4,4,4,4,4,4,3,3,3,3,4,4,4,3,4]],
            ['dup' => 1, 'email_local' => 'ikanurjannah62', 'jawaban' => [3,4,3,4,4,4,4,4,3,4,4,4,4,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'aisaputri88', 'jawaban' => [3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3]],
            ['dup' => 1, 'email_local' => 'azkaawathif98', 'jawaban' => [3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3,3]],
            ['dup' => 1, 'email_local' => 'athirahjamilahannisak67', 'jawaban' => [4,3,3,3,4,4,3,4,4,4,4,2,4,3,4,2,3,2,3,3]],
            ['dup' => 1, 'email_local' => 'arifatunnailiafrilia65', 'jawaban' => [5,5,5,5,4,4,4,4,3,3,3,4,4,4,4,4,4,3,3,4]],
            ['dup' => 1, 'email_local' => 'halimatuszahra23', 'jawaban' => [4,4,4,4,4,4,4,4,3,4,4,3,4,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'nurul57', 'jawaban' => [5,5,5,4,5,4,4,4,4,4,4,4,5,5,5,4,3,3,3,3]],
            ['dup' => 1, 'email_local' => 'lailynurhidayati26', 'jawaban' => [4,4,5,4,3,4,3,3,2,3,3,2,4,3,4,3,3,2,2,2]],
            ['dup' => 1, 'email_local' => 'rofiqotulumama05', 'jawaban' => [4,5,4,5,4,4,4,4,4,3,3,4,4,3,5,4,4,4,3,3]],
            ['dup' => 1, 'email_local' => 'rianatalia13', 'jawaban' => [5,3,4,3,3,4,3,4,4,4,4,4,4,3,5,4,2,2,2,2]],
            ['dup' => 1, 'email_local' => 'muhriski12', 'jawaban' => [4,4,4,4,4,4,4,5,4,4,4,4,4,4,3,3,4,3,4,4]],
            ['dup' => 1, 'email_local' => 'nurfiqolbyhaqiqi11', 'jawaban' => [4,3,3,3,3,3,3,4,4,3,4,3,3,4,4,3,3,2,3,2]],
            ['dup' => 1, 'email_local' => 'mohdaniel07', 'jawaban' => [4,4,3,3,3,3,3,4,3,3,3,4,4,4,5,4,2,1,1,1]],
            ['dup' => 1, 'email_local' => 'faridatulhabibah09', 'jawaban' => [4,3,4,4,4,5,4,5,2,3,3,4,4,4,2,5,5,4,4,4]],
            ['dup' => 1, 'email_local' => 'alvinmaghfiroh15', 'jawaban' => [4,4,4,4,3,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'tija09', 'jawaban' => [4,3,4,4,5,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'desi63', 'jawaban' => [5,4,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5]],
            ['dup' => 1, 'email_local' => 'salmanisme66', 'jawaban' => [5,5,5,5,4,2,5,2,4,3,4,5,5,3,3,3,3,3,3,4]],
            ['dup' => 1, 'email_local' => 'amaliatullatifah09', 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'fatimatuszahra27', 'jawaban' => [4,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4,2,4,3,4]],
            ['dup' => 1, 'email_local' => 'dini98', 'jawaban' => [5,4,5,5,5,4,4,4,4,4,4,4,5,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'devitrianasari95', 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'alda14', 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'masayuanastasia03', 'jawaban' => [4,4,4,3,3,3,3,4,3,3,3,4,3,3,4,3,3,3,3,2]],
            ['dup' => 1, 'email_local' => 'riskibagaspratama85', 'jawaban' => [5,5,5,5,3,3,3,3,3,3,4,5,3,3,5,4,1,1,1,1]],
            ['dup' => 1, 'email_local' => 'raudatulummah48', 'jawaban' => [4,5,5,3,2,3,3,3,3,3,4,5,4,3,5,4,2,2,1,2]],
            ['dup' => 1, 'email_local' => 'fakhrillah39', 'jawaban' => [3,4,3,4,4,4,4,4,4,4,4,5,3,1,5,4,2,3,4,4]],
            ['dup' => 1, 'email_local' => 'fariyalayu26', 'jawaban' => [5,5,4,4,3,3,3,3,2,2,3,4,4,4,4,4,2,2,1,1]],
            ['dup' => 1, 'email_local' => 'anisatulkhomila30', 'jawaban' => [4,3,4,4,4,4,4,3,4,4,5,4,4,4,3,4,4,2,4,4]],
            ['dup' => 1, 'email_local' => 'nadiasabrina27', 'jawaban' => [4,5,4,4,5,4,5,4,4,3,5,4,4,5,4,4,4,5,4,4]],
            ['dup' => 1, 'email_local' => 'rbmohgazali29', 'jawaban' => [4,4,4,4,3,3,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'supardi27', 'jawaban' => [5,4,4,5,4,5,4,5,4,5,4,5,5,5,5,5,5,4,4,5]],
            ['dup' => 1, 'email_local' => 'tinifebrianti09', 'jawaban' => [4,5,4,5,4,4,4,3,3,3,3,4,5,4,5,4,5,3,3,3]],
            ['dup' => 1, 'email_local' => 'afandi56', 'jawaban' => [5,5,5,5,5,5,5,5,5,5,5,5,5,4,5,5,5,5,5,5]],
            ['dup' => 1, 'email_local' => 'ilhammaulana66', 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,5,5,3,5,5,2,1,1,1]],
            ['dup' => 1, 'email_local' => 'syaferaainiyah02', 'jawaban' => [4,4,3,5,4,4,3,4,4,4,4,4,4,5,4,5,4,4,4,4]],
            ['dup' => 1, 'email_local' => 'achmadsofyanarifani62', 'jawaban' => [4,3,5,4,4,3,5,4,5,4,4,5,4,5,3,4,4,4,5,4]],
            ['dup' => 1, 'email_local' => 'muhammadwalid63', 'jawaban' => [3,3,3,3,4,4,3,3,5,4,3,4,4,3,3,2,3,3,3,3]],
            ['dup' => 1, 'email_local' => 'lukmanulhakim69', 'jawaban' => [4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4]],
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
            $emailLocal = $m['dup'] > 1 ? $m['email_local'] . '-' . $m['dup'] : $m['email_local'];
            $email      = $emailLocal . '@unibamadura.ac.id';

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
            // sedangkan nilai_akhir dihitung 3 desimal (mis. 3.677) -> bisa jatuh di 'celah' antar
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
                    'klasifikasi_penilaian_id' => $klasifikasi->id,
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