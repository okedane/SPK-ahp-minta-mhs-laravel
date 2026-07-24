<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class mhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultasMap = [
            'Akuntansi' => 'Fakultas Ekonomi dan Bisnis',
            'Manajemen' => 'Fakultas Ekonomi dan Bisnis',
            'Informatika' => 'Fakultas Sains dan Teknologi',
            'Sistem Informasi' => 'Fakultas Sains dan Teknologi',
            'Teknik Industri' => 'Fakultas Sains dan Teknologi',
            'Bahasa dan Kebudayaan Asing' => 'Fakultas Bahasa Asing',
            'Kajian Film dan Televisi' => 'Fakultas Ilmu Komunikasi',
            'Hukum Bisnis' => 'Fakultas Ilmu Hukum',
        ];

        $mahasiswa = [
            ['nim' => '2502110006', 'nama' => 'Yuliana', 'prodi' => 'Akuntansi', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'yuliana06'],
            ['nim' => '2202110014', 'nama' => 'Nur riskiah', 'prodi' => 'Akuntansi', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'nurriskiah14'],
            ['nim' => '2302110025', 'nama' => 'kholifatul layliyah', 'prodi' => 'Akuntansi', 'angkatan' => '2023', 'dup' => 1, 'email_local' => 'kholifatullayliyah25'],
            ['nim' => '2202110033', 'nama' => 'Dina Alifiyah', 'prodi' => 'Akuntansi', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'dinaalifiyah33'],
            ['nim' => '2202110023', 'nama' => 'Aldiyana Fitriyanti', 'prodi' => 'Akuntansi', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'aldiyanafitriyanti23'],
            ['nim' => '2202110017', 'nama' => 'Fitri Nurhayati', 'prodi' => 'Akuntansi', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'fitrinurhayati17'],
            ['nim' => '2402110082', 'nama' => 'Selviyanti', 'prodi' => 'Akuntansi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'selviyanti82'],
            ['nim' => '2402110006', 'nama' => 'Moh. daifan', 'prodi' => 'Akuntansi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'mohdaifan06'],
            ['nim' => '2502610013', 'nama' => 'Anisa Afnada', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'anisaafnada13'],
            ['nim' => '2502610015', 'nama' => 'fia', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'fia15'],
            ['nim' => '2502610001', 'nama' => 'Erma Wulandari Irwani', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'ermawulandariirwani01'],
            ['nim' => '2502610012', 'nama' => 'Shafiyatul Jamilah', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'shafiyatuljamilah12'],
            ['nim' => '2502610007', 'nama' => 'Lutfiyatul Qoribah', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'lutfiyatulqoribah07'],
            ['nim' => '2502610017', 'nama' => 'NUR SINAINI ANGELINA FAIRUSKHAN', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'nursinainiangelinafairuskhan17'],
            ['nim' => '2402610102', 'nama' => 'Nakita cantika dewi', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'nakitacantikadewi02'],
            ['nim' => '2402810002', 'nama' => 'Iskawimah', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'iskawimah02'],
            ['nim' => '2402810037', 'nama' => 'Kasfil Hairudin', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'kasfilhairudin37'],
            ['nim' => '2402810012', 'nama' => 'Farid ramdhani', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'faridramdhani12'],
            ['nim' => '2402810013', 'nama' => 'Laits febrianto', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'laitsfebrianto11'],
            ['nim' => '2402810009', 'nama' => 'Savira eka yuliawati', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'saviraekayuliawati09'],
            ['nim' => '2402810004', 'nama' => 'Aura aisyah', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'auraaisyah04'],
            ['nim' => '2402810005', 'nama' => 'Arjun darmisi', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'arjundarmisi05'],
            ['nim' => '2402810068', 'nama' => 'Andika Alif Septiono', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'andikaalifseptiono68'],
            ['nim' => '2402810011', 'nama' => 'Aura Intan Wulandari', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 2, 'email_local' => 'auraintanwulandari11'],
            ['nim' => '2202310041', 'nama' => 'Dianis Ramadhani', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'dianisramadhani41'],
            ['nim' => '2202310062', 'nama' => 'Ika nurjannah', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'ikanurjannah62'],
            ['nim' => '2420310188', 'nama' => 'Aisa putri', 'prodi' => 'Informatika', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'aisaputri88'],
            ['nim' => '2402310198', 'nama' => 'Azka \'Awathif', 'prodi' => 'Informatika', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'azkaawathif98'],
            ['nim' => '2202310067', 'nama' => 'Athirah Jamilah Annisak', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'athirahjamilahannisak67'],
            ['nim' => '220210065', 'nama' => 'Arifatun Naili Afrilia', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'arifatunnailiafrilia65'],
            ['nim' => '2202310023', 'nama' => 'Halimatus zahra', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'halimatuszahra23'],
            ['nim' => '2202310057', 'nama' => 'Nurul', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'nurul57'],
            ['nim' => '2502710026', 'nama' => 'Laily Nur Hidayati', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'lailynurhidayati26'],
            ['nim' => '2402710005', 'nama' => 'Rofiqotul Umama', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'rofiqotulumama05'],
            ['nim' => '2402710013', 'nama' => 'Ria Natalia', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'rianatalia13'],
            ['nim' => '2402710012', 'nama' => 'muh.riski', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'muhriski12'],
            ['nim' => '2402710011', 'nama' => 'Nurfi qolby haqiqi', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'nurfiqolbyhaqiqi11'],
            ['nim' => '2402710007', 'nama' => 'Moh.daniel', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'mohdaniel07'],
            ['nim' => '2402710009', 'nama' => 'Faridatul habibah', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'faridatulhabibah09'],
            ['nim' => '2402710015', 'nama' => 'Alvin Maghfiroh', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'alvinmaghfiroh15'],
            ['nim' => '2202210109', 'nama' => 'Tija', 'prodi' => 'Manajemen', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'tija09'],
            ['nim' => '2302210363', 'nama' => 'Desi', 'prodi' => 'Manajemen', 'angkatan' => '2023', 'dup' => 1, 'email_local' => 'desi63'],
            ['nim' => '2302210266', 'nama' => 'Salmanisme', 'prodi' => 'Manajemen', 'angkatan' => '2023', 'dup' => 1, 'email_local' => 'salmanisme66'],
            ['nim' => '2502210209', 'nama' => 'Amaliatullatifah', 'prodi' => 'Manajemen', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'amaliatullatifah09'],
            ['nim' => '2302210627', 'nama' => 'Fatimatus zahra', 'prodi' => 'Manajemen', 'angkatan' => '2023', 'dup' => 1, 'email_local' => 'fatimatuszahra27'],
            ['nim' => '2302210398', 'nama' => 'Dini', 'prodi' => 'Manajemen', 'angkatan' => '2023', 'dup' => 1, 'email_local' => 'dini98'],
            ['nim' => '2502210195', 'nama' => 'Devi trianasari', 'prodi' => 'Manajemen', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'devitrianasari95'],
            ['nim' => '2502210214', 'nama' => 'alda', 'prodi' => 'Manajemen', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'alda14'],
            ['nim' => '2202510003', 'nama' => 'Masayu Anastasia', 'prodi' => 'Sistem Informasi', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'masayuanastasia03'],
            ['nim' => '2402510085', 'nama' => 'Riski bagas pratama', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'riskibagaspratama85'],
            ['nim' => '2302510048', 'nama' => 'Raudatul ummah', 'prodi' => 'Sistem Informasi', 'angkatan' => '2023', 'dup' => 1, 'email_local' => 'raudatulummah48'],
            ['nim' => '2302510139', 'nama' => 'Fakhrillah', 'prodi' => 'Sistem Informasi', 'angkatan' => '2023', 'dup' => 1, 'email_local' => 'fakhrillah39'],
            ['nim' => '2402510026', 'nama' => 'Fariyal ayu', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'fariyalayu26'],
            ['nim' => '2402510030', 'nama' => 'Anisatul Khomila', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'anisatulkhomila30'],
            ['nim' => '2402510027', 'nama' => 'Nadia Sabrina', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'nadiasabrina27'],
            ['nim' => '2402510029', 'nama' => 'Rb moh .gazali', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'rbmohgazali29'],
            ['nim' => '2502410027', 'nama' => 'Supardi', 'prodi' => 'Teknik Industri', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'supardi27'],
            ['nim' => '2202410009', 'nama' => 'Tini Febrianti', 'prodi' => 'Teknik Industri', 'angkatan' => '2022', 'dup' => 1, 'email_local' => 'tinifebrianti09'],
            ['nim' => '2502420056', 'nama' => 'Afandi', 'prodi' => 'Teknik Industri', 'angkatan' => '2025', 'dup' => 1, 'email_local' => 'afandi56'],
            ['nim' => '2402410066', 'nama' => 'Ilham maulana', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'ilhammaulana66'],
            ['nim' => '2402410002', 'nama' => 'Syafera ainiyah', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'syaferaainiyah02'],
            ['nim' => '2402410062', 'nama' => 'Achmad Sofyan Arifani', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'achmadsofyanarifani62'],
            ['nim' => '2402410063', 'nama' => 'Muhammad walid', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'muhammadwalid63'],
            ['nim' => '2402410069', 'nama' => 'Lukmanul hakim', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1, 'email_local' => 'lukmanulhakim69'],
        ];

        foreach ($mahasiswa as $m) {
            // kalau nama+2digit NIM ternyata tetap bentrok (kasus langka), tambah suffix
            $emailLocal = $m['dup'] > 1 ? $m['email_local'] . '-' . $m['dup'] : $m['email_local'];
            $email      = $emailLocal . '@unibamadura.ac.id';

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name'              => $m['nama'],
                    'email_verified_at' => now(),
                    'password'          => Hash::make($m['nim']), // password default = NIM asli
                    'role'              => 'user',
                    'remember_token'    => Str::random(10),
                ]
            );

            Profile::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'nim'          => $m['nim'],
                    'nama_lengkap' => $m['nama'],
                    'prodi'        => $m['prodi'],
                    'fakultas'     => $fakultasMap[$m['prodi']] ?? null,
                    'angkatan'     => $m['angkatan'],
                ]
            );
        }

        $this->command->info('Seeded ' . count($mahasiswa) . ' users + profiles.');
    }
}
