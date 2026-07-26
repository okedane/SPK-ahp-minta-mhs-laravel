<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\PerbadinganKriteria;
use Illuminate\Http\Request;

class PerbadinganKriteriaController extends Controller
{
    /**
     * Tampilkan halaman matriks perbandingan kriteria AHP.
     */
    public function index()
    {
        $kriterias = Kriteria::orderBy('id')->get();
        $ids       = $kriterias->pluck('id')->toArray();

        $matriks = $this->bangunMatriks($kriterias, $ids);

        $lengkap     = $this->cekLengkap($ids, $matriks);
        $hasil       = null;
        $konsistensi = null;

        if ($lengkap) {
            $hasil       = $this->hitungNormalisasi($ids, $matriks);
            $konsistensi = $this->hitungKonsistensi($ids, $matriks, $hasil['rataRata']);
        }

        return view('ahli.kriteria.matriks', compact(
            'kriterias',
            'matriks',
            'lengkap',
            'hasil',
            'konsistensi'
        ));
    }

    /**
     * Simpan matriks — dengan validasi normalisasi & konsistensi SEBELUM simpan ke DB.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matriks'     => 'required|array',
            'matriks.*.*' => 'required|numeric|min:0.0001',
        ]);

        $kriterias = Kriteria::orderBy('id')->get();
        $ids       = $kriterias->pluck('id')->toArray();

        // 1) Bangun matriks dari INPUT FORM (belum disimpan ke DB)
        $matriks = $this->bangunMatriksDariInput($request->matriks, $ids);

        // 2) Cek semua pasangan i < j sudah terisi
        $lengkap = $this->cekLengkap($ids, $matriks);
        if (!$lengkap) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Matriks belum lengkap, masih ada pasangan kriteria yang belum diisi.');
        }

        // 3) Hitung normalisasi & cek jumlah tiap kolom harus ≈ 1
        $hasil = $this->hitungNormalisasi($ids, $matriks);

        $toleransi = 0.001;
        foreach ($hasil['normalisasi'] as $rowId => $cols) {
            $jumlahBaris = 0;
            // jumlahkan per kolom hasil normalisasi (bukan per baris)
        }
        foreach ($ids as $colId) {
            $jumlahKolomNormalisasi = 0;
            foreach ($ids as $rowId) {
                $jumlahKolomNormalisasi += $hasil['normalisasi'][$rowId][$colId] ?? 0;
            }
            if (abs($jumlahKolomNormalisasi - 1) > $toleransi) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', "Normalisasi gagal: jumlah kolom kriteria ID {$colId} = " . round($jumlahKolomNormalisasi, 4) . " (harus mendekati 1). Periksa kembali nilai perbandingan yang diinput.");
            }
        }

        // 4) Hitung konsistensi (CR)
        $konsistensi = $this->hitungKonsistensi($ids, $matriks, $hasil['rataRata']);

        if (!$konsistensi['konsisten']) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Matriks tidak konsisten (CR = ' . round($konsistensi['cr'], 4) . ', harus ≤ 0.1). Data TIDAK disimpan. Silakan perbaiki nilai perbandingan kriteria.');
        }

        // 5) Lolos semua validasi → baru simpan ke DB
        PerbadinganKriteria::whereIn('kriteria_id_1', $ids)
            ->whereIn('kriteria_id_2', $ids)
            ->delete();

        foreach ($request->matriks as $id1 => $cols) {
            foreach ($cols as $id2 => $nilai) {
                if (!in_array((int)$id1, $ids) || !in_array((int)$id2, $ids)) {
                    continue;
                }

                PerbadinganKriteria::create([
                    'kriteria_id_1' => $id1,
                    'kriteria_id_2' => $id2,
                    'nilai'         => (float) $nilai,
                ]);
            }
        }

        // 6) Simpan bobot ke tabel kriterias
        foreach ($kriterias as $k) {
            $k->bobot = round($hasil['rataRata'][$k->id], 4);
            $k->save();
        }

        return redirect()->route('kriteria.matriks.index')
            ->with('success', 'Matriks konsisten (CR = ' . round($konsistensi['cr'], 4) . '). Matriks dan bobot kriteria berhasil disimpan.');
    }

    // ----------------------------------------------------------------
    // HELPER: bangun matriks dari INPUT FORM (belum ada di DB)
    // ----------------------------------------------------------------
    private function bangunMatriksDariInput(array $inputMatriks, array $ids): array
    {
        $matriks = [];

        foreach ($ids as $id) {
            $matriks[$id][$id] = 1;
        }

        foreach ($inputMatriks as $id1 => $cols) {
            foreach ($cols as $id2 => $nilai) {
                $id1 = (int) $id1;
                $id2 = (int) $id2;

                if (!in_array($id1, $ids) || !in_array($id2, $ids) || $id1 === $id2) {
                    continue;
                }

                $nilai = (float) $nilai;
                if ($nilai == 0) {
                    continue;
                }

                $matriks[$id1][$id2] = $nilai;
                $matriks[$id2][$id1] = round(1 / $nilai, 4);
            }
        }

        return $matriks;
    }

    // ----------------------------------------------------------------
    // HELPER: bangun array matriks penuh dari DB (dipakai di index())
    // ----------------------------------------------------------------
    private function bangunMatriks($kriterias, array $ids): array
    {
        $matriks = [];

        foreach ($ids as $id) {
            $matriks[$id][$id] = 1;
        }

        $pasangan = PerbadinganKriteria::whereIn('kriteria_id_1', $ids)
            ->whereIn('kriteria_id_2', $ids)
            ->get();

        foreach ($pasangan as $p) {
            $id1   = $p->kriteria_id_1;
            $id2   = $p->kriteria_id_2;
            $nilai = (float) $p->nilai;

            $matriks[$id1][$id2] = $nilai;

            if ($nilai != 0) {
                $matriks[$id2][$id1] = round(1 / $nilai, 4);
            }
        }

        return $matriks;
    }

    // ----------------------------------------------------------------
    // HELPER: cek apakah semua pasangan i < j sudah terisi
    // ----------------------------------------------------------------
    private function cekLengkap(array $ids, array $matriks): bool
    {
        $n = count($ids);
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if (empty($matriks[$ids[$i]][$ids[$j]])) {
                    return false;
                }
            }
        }
        return true;
    }

    // ----------------------------------------------------------------
    // HELPER: normalisasi & bobot
    // ----------------------------------------------------------------
    private function hitungNormalisasi(array $ids, array $matriks): array
    {
        $n = count($ids);

        $jumlahKolom = [];
        foreach ($ids as $colId) {
            $jumlahKolom[$colId] = 0;
            foreach ($ids as $rowId) {
                $jumlahKolom[$colId] += $matriks[$rowId][$colId] ?? 0;
            }
        }

        $normalisasi = [];
        foreach ($ids as $rowId) {
            foreach ($ids as $colId) {
                $normalisasi[$rowId][$colId] = $jumlahKolom[$colId] != 0
                    ? ($matriks[$rowId][$colId] ?? 0) / $jumlahKolom[$colId]
                    : 0;
            }
        }

        $rataRata = [];
        foreach ($ids as $rowId) {
            $rataRata[$rowId] = array_sum($normalisasi[$rowId]) / $n;
        }

        return compact('normalisasi', 'rataRata', 'jumlahKolom');
    }

    // ----------------------------------------------------------------
    // HELPER: λ max, CI, CR
    // ----------------------------------------------------------------
    private function hitungKonsistensi(array $ids, array $matriks, array $bobot): array
    {
        $ri  = [0, 0, 0, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49];
        $n   = count($ids);

        $weightedSum = [];
        foreach ($ids as $rowId) {
            $weightedSum[$rowId] = 0;
            foreach ($ids as $colId) {
                $weightedSum[$rowId] += ($matriks[$rowId][$colId] ?? 0) * $bobot[$colId];
            }
        }

        $lambdas = [];
        foreach ($ids as $id) {
            $lambdas[$id] = $bobot[$id] != 0
                ? $weightedSum[$id] / $bobot[$id]
                : 0;
        }

        $lambdaMax = array_sum($lambdas) / $n;
        $ci        = $n > 1 ? ($lambdaMax - $n) / ($n - 1) : 0;
        $ri_val    = $ri[$n] ?? 1.49;
        $cr        = $ri_val != 0 ? $ci / $ri_val : 0;

        return [
            'lambda_max' => $lambdaMax,
            'ci'         => $ci,
            'cr'         => $cr,
            'ri'         => $ri_val,
            'konsisten'  => $cr <= 0.1,
        ];
    }
}