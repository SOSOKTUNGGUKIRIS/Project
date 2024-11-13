<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class StudentsExport implements FromCollection, WithHeadings, WithTitle
{
    /**
     * Mengambil koleksi data student yang akan diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil semua data student, sesuaikan query jika perlu
        return Student::all()->map(function ($student) {
            // Mengonversi gender menjadi 'Laki-laki' atau 'Perempuan'
            $student->gender = $student->gender == 'B' ? 'Laki-laki' : ($student->gender == 'G' ? 'Perempuan' : 'Tidak Diketahui');
             // Hapus kolom photo
             unset($student->photo); // Menghapus kolom photo
            return $student;
        });
    }
     /**
     * Menambahkan heading (judul kolom) pada file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'NIS',
            'Nama',
            'Gender',
            'Kelas'
        ];
    }
    /**
     * Menentukan judul sheet di Excel
     *
     * @return string
     */
    public function title(): string
    {
        return 'Data Siswa';
    }
}
