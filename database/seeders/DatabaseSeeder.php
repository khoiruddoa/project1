<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '0123',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '3'

        ]);
        User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'phone_number' => '00',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '4'

        ]);
        User::create([
            'name' => 'pengurus1',
            'email' => 'pengurus11@gmail.com',
            'phone_number' => '004444',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '1',
            'manage' => '1'

        ]);
        User::create([
            'name' => 'pengurus2',
            'email' => 'pengurus2@gmail.com',
            'phone_number' => '0044344',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '1',
            'manage' => '1'

        ]);
        User::create([
            'name' => 'pengepul',
            'email' => 'pengepul@gmail.com',
            'phone_number' => '0644344',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '2'

        ]);

        User::create([
            'name' => 'doa',
            'email' => 'doa@gmail.com',
            'phone_number' => '0022',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '1'

        ]);

        Category::create([
            'category_name' => '1. Kardus',
            'uom' => 'kg'
        ]);

        Category::create([
            'category_name' => '2. Botol Beling',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '3. HVS',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '4. Buku Tulis',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '5. Buku Tulis Non Cover',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '6. LKS',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '7. Buku Paket',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '8. Alumunium',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '9. Besi',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '10. Tutup Galon',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '11. Tutup Botol',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '12. Paralon PVC',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '13. Paralon Abu',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '14. Kabel',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '15. Rongsok',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '16. Btl, Gls Mineral Putih Kotor',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '17. Botol Mineral Bersih',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '18. Gelas Mineral Bersih',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '19. Kuningan',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '20. Tembaga',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '21. Steel/Baja Ringan',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '22. Kaleng',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '23. Ember',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '24. Paku',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '25. Karpet Talang',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '26. Kipas Angin',
            'uom' => 'pcs'
        ]);
        Category::create([
            'category_name' => '27. Kantong Semen',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '28. Naso',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '29. Jelantah',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '30. Tutup Botol Krop',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '31. Duplek',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '32. Galon Aqua',
            'uom' => 'pcs'
        ]);
        Category::create([
            'category_name' => '33. Kaleng Blek',
            'uom' => 'pcs'
        ]);
        Category::create([
            'category_name' => '34. Galon le Minerale',
            'uom' => 'pcs'
        ]);
        Category::create([
            'category_name' => '35. Koran',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '36. Aki Kecil',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '37. Aki Mobil',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '38. Plastik',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '39. Dinamo Mesin Cuci',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '40. Mesin Cuci',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '41. Plastik Bungkus Bal. Yakult',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '42. Plastik Asoy',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '43. Plastik BB',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '44. CPU',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '45. TV Tabung Kecil',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '46. TV Tabung 21',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '47. Kaset CD/DVD',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '48. Kulkas 2 Pintu + Dinamo',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '49. Kulkas 1 Pintu + Dinamo',
            'uom' => 'kg'
        ]);
        Category::create([
            'category_name' => '50. Kulkas Tanpa Dinamo',
            'uom' => 'kg'
        ]);
        Category::create(
            [
                'category_name' => '51. Dinamo Kipas',
                'uom' => 'kg'
            ]

        );
    }
}
