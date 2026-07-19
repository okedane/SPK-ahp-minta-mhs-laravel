<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserProfileSeeder extends Seeder
{
    /**
     * Data mahasiswa hasil kuesioner (dari data_bersih_5_.xlsx sheet 'Data Bersih').
     * - angkatan  = 2 digit pertama NIM (contoh: 2502110006 -> 2025)
     * - password  = NIM asli mahasiswa (di-hash)
     * - PERHATIAN: NIM '2402810011' muncul 2x di excel (Laits febrianto & Aura Intan
     *   Wulandari) - kemungkinan typo NIM di sumber data. Untuk sementara email dibedakan
     *   dengan suffix, tapi sebaiknya dicek ulang NIM yang benar.
     */
    public function run(): void
    {
        $mahasiswa = [
            ['nim' => '2502110006', 'nama' => 'Yuliana', 'prodi' => 'Akuntansi', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2202110014', 'nama' => 'Nur riskiah', 'prodi' => 'Akuntansi', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2302110025', 'nama' => 'kholifatul layliyah', 'prodi' => 'Akuntansi', 'angkatan' => '2023', 'dup' => 1],
            ['nim' => '2202110033', 'nama' => 'Dina Alifiyah', 'prodi' => 'Akuntansi', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2202110023', 'nama' => 'Aldiyana Fitriyanti', 'prodi' => 'Akuntansi', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2202110017', 'nama' => 'Fitri Nurhayati', 'prodi' => 'Akuntansi', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2402110082', 'nama' => 'Selviyanti', 'prodi' => 'Akuntansi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402110006', 'nama' => 'Moh. daifan', 'prodi' => 'Akuntansi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2502610013', 'nama' => 'Anisa Afnada', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2502610015', 'nama' => 'fia', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2502610001', 'nama' => 'Erma Wulandari Irwani', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2502610012', 'nama' => 'Shafiyatul Jamilah', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2502610007', 'nama' => 'Lutfiyatul Qoribah', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2502610017', 'nama' => 'NUR SINAINI ANGELINA FAIRUSKHAN', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2402610102', 'nama' => 'Nakita cantika dewi', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810002', 'nama' => 'Iskawimah', 'prodi' => 'Bahasa dan Kebudayaan Asing', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810037', 'nama' => 'Kasfil Hairudin', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810012', 'nama' => 'Farid ramdhani', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810011', 'nama' => 'Laits febrianto', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810009', 'nama' => 'Savira eka yuliawati', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810004', 'nama' => 'Aura aisyah', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810005', 'nama' => 'Arjun darmisi', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810068', 'nama' => 'Andika Alif Septiono', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402810011', 'nama' => 'Aura Intan Wulandari', 'prodi' => 'Hukum Bisnis', 'angkatan' => '2024', 'dup' => 2],
            ['nim' => '2202310041', 'nama' => 'Dianis Ramadhani', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2202310062', 'nama' => 'Ika nurjannah', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2420310188', 'nama' => 'Aisa putri', 'prodi' => 'Informatika', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402310198', 'nama' => 'Azka \'Awathif', 'prodi' => 'Informatika', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2202310067', 'nama' => 'Athirah Jamilah Annisak', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '220210065', 'nama' => 'Arifatun Naili Afrilia', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2202310023', 'nama' => 'Halimatus zahra', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2202310057', 'nama' => 'Nurul', 'prodi' => 'Informatika', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2502710026', 'nama' => 'Laily Nur Hidayati', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2402710005', 'nama' => 'Rofiqotul Umama', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402710013', 'nama' => 'Ria Natalia', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402710012', 'nama' => 'muh.riski', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402710011', 'nama' => 'Nurfi qolby haqiqi', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402710007', 'nama' => 'Moh.daniel', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402710009', 'nama' => 'Faridatul habibah', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402710015', 'nama' => 'Alvin Maghfiroh', 'prodi' => 'Kajian Film dan Televisi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2202210109', 'nama' => 'Tija', 'prodi' => 'Manajemen', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2302210363', 'nama' => 'Desi', 'prodi' => 'Manajemen', 'angkatan' => '2023', 'dup' => 1],
            ['nim' => '2302210266', 'nama' => 'Salmanisme', 'prodi' => 'Manajemen', 'angkatan' => '2023', 'dup' => 1],
            ['nim' => '2502210209', 'nama' => 'Amaliatullatifah', 'prodi' => 'Manajemen', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2302210627', 'nama' => 'Fatimatus zahra', 'prodi' => 'Manajemen', 'angkatan' => '2023', 'dup' => 1],
            ['nim' => '2302210398', 'nama' => 'Dini', 'prodi' => 'Manajemen', 'angkatan' => '2023', 'dup' => 1],
            ['nim' => '2502210195', 'nama' => 'Devi trianasari', 'prodi' => 'Manajemen', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2502210214', 'nama' => 'alda', 'prodi' => 'Manajemen', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2202510003', 'nama' => 'Masayu Anastasia', 'prodi' => 'Sistem Informasi', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2402510085', 'nama' => 'Riski bagas pratama', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2302510048', 'nama' => 'Raudatul ummah', 'prodi' => 'Sistem Informasi', 'angkatan' => '2023', 'dup' => 1],
            ['nim' => '2302510139', 'nama' => 'Fakhrillah', 'prodi' => 'Sistem Informasi', 'angkatan' => '2023', 'dup' => 1],
            ['nim' => '2402510026', 'nama' => 'Fariyal ayu', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402510030', 'nama' => 'Anisatul Khomila', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402510027', 'nama' => 'Nadia Sabrina', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402510029', 'nama' => 'Rb moh .gazali', 'prodi' => 'Sistem Informasi', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2502410027', 'nama' => 'Supardi', 'prodi' => 'Teknik Industri', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2202410009', 'nama' => 'Tini Febrianti', 'prodi' => 'Teknik Industri', 'angkatan' => '2022', 'dup' => 1],
            ['nim' => '2502420056', 'nama' => 'Afandi', 'prodi' => 'Teknik Industri', 'angkatan' => '2025', 'dup' => 1],
            ['nim' => '2402410066', 'nama' => 'Ilham maulana', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402410002', 'nama' => 'Syafera ainiyah', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402410062', 'nama' => 'Achmad Sofyan Arifani', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402410063', 'nama' => 'Muhammad walid', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1],
            ['nim' => '2402410069', 'nama' => 'Lukmanul hakim', 'prodi' => 'Teknik Industri', 'angkatan' => '2024', 'dup' => 1],
        ];

        foreach ($mahasiswa as $m) {
            // kalau NIM duplikat di data excel, tambahkan suffix biar email tetap unik
            $emailNim = $m['dup'] > 1 ? $m['nim'] . '-' . $m['dup'] : $m['nim'];
            $email    = $emailNim . '@student.unibamadura.ac.id';

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
                    'nama_lengkap' => $m['nama'],
                    'prodi'        => $m['prodi'],
                    'fakultas'     => null,
                    'angkatan'     => $m['angkatan'],
                ]
            );
        }

        $this->command->info('Seeded ' . count($mahasiswa) . ' users + profiles.');
    }
}