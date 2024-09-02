<?php
namespace Database\Seeders;

use App\Models\contact_info;
use App\Models\ContactInfo;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('name', 'PME Bandung')->first(); // Pastikan picture ini ada di database

        // Pastikan picture ditemukan
        if ($user) {
            // Data yang akan dimasukkan ke database
            $contactinfo = [
                'link_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1717072224415!2d107.5493138143469!3d-6.870018469126014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e434be67b353%3A0x65421b7cacf3aaad!2sProtel+Multi+Energy!5e0!3m2!1sid!2sid!4v1560907933897!5m2!1sid!2sid',
                'email' => 'admin@pme-bandung.com',
                'mobile' => '0813-9555-6300',
                'address' => 'Gg.Awibitung No. 40 Ciawitali Selatan Cimahi 40152 Jawa Barat, Indonesia',
                'land_line' => '(022) 6631608'
            ];

            // Menyimpan data ke dalam database
            ContactInfo::create($contactinfo);
        } else {
            // Tindakan alternatif jika picture tidak ditemukan
            $this->command->error('User dengan nama "PME Bandung" tidak ditemukan.');
        }
    }
}
