<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Agenda;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'      => 'siswa',
            'email'     => 'siswa@gmail.com',
            'password'  => bcrypt('12345'),
            'role'      => 'siswa',
            'nomor'       => '240601201'
        ]);
        User::create([
            'name'      => 'guru',
            'email'     => 'guru@gmail.com',
            'password'  => bcrypt('12345'),
            'role'     => 'guru',
            'nomor'       => '888'
        ]);
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345'),
            'role'     => 'admin',
            'nomor'       => '999'
        ]);
        User::create([
            'name'      => 'Vladimir Putin Al Moskowi',
            'email'     => 'putin@gmail.com',
            'password'  => bcrypt('12345'),
            'role'     => 'guru',
            'nomor'       => '9991'
        ]);
        User::create([
            'name'      => 'Recep Tayyip Erdogan',
            'email'     => 'erdogan@gmail.com',
            'password'  => bcrypt('12345'),
            'role'     => 'guru',
            'nomor'       => '9992'
        ]);
        User::create([
            'name'      => 'Winston Churchill',
            'email'     => 'winston@gmail.com',
            'password'  => bcrypt('12345'),
            'role'     => 'guru',
            'nomor'       => '9993'
        ]);
        User::create([
            'name'      => 'Saddam Hussein',
            'email'     => 'saddam@gmail.com',
            'password'  => bcrypt('12345'),
            'role'     => 'guru',
            'nomor'       => '9994'
        ]);
        User::create([
            'name'      => 'Mao Zedong',
            'email'     => 'mao@gmail.com',
            'password'  => bcrypt('12345'),
            'role'     => 'guru',
            'nomor'       => '9995'
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);

        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);

        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 3',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 3',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 3',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 3',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 3',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 3',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 3',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 3',
        ]);

        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);

        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);

        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 1',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);


         Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-28',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 1',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 1',
        ]);

        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-29',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);

        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 2',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 2',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 3',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 3',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 3',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 3',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 3',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 3',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-30',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 3',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 3',
        ]);

        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);
        Agenda::create([
            'tanggal'      => '2023-07-31',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 4',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 4',
        ]);

        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-01',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 5',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 5',
        ]);

        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Vladimir Putin Al Moskowi',
            'jam'     => '1-3',
            'pelajaran'       => 'Sejarah',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Recep Tayyip Erdogan',
            'jam'     => '4-5',
            'pelajaran'       => 'PJOK',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Winston Churchill',
            'jam'     => '6-7',
            'pelajaran'       => 'Bahasa Inggris',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Saddam Hussein',
            'jam'     => '8-9',
            'pelajaran'       => 'Pendidikan Agama Islam',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
        Agenda::create([
            'tanggal'      => '2023-08-02',
            'kelas'     => 'XI IPA 2',
            'guru'  => 'Mao Zedong',
            'jam'     => '10-11',
            'pelajaran'       => 'Informatika',
            'bahasan'       => 'bab 6',
            'kehadiran'       => 'hadir',
            'tahun_ajaran'       => '2023/2024',
            'tugas'       => 'tugas 6',
        ]);
    }
}
