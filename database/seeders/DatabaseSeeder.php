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
            'role' => '3',
            'photo' => 'photos/dumy.png',

        ]);
        User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'phone_number' => '00',
            'password' => bcrypt('password'),
            'address' => 'tangerang',
            'role' => '4',
            'photo' => 'photos/dumy.png',

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


        User::create([
            'id' => '0001122020',
            'name' => 'Bu yatmi',
            'email' => 'buyatmi@gmail.com',
            'phone_number' => '0001122020',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 05/02',
            'role' => '1',
            'type' => '1',
        ]);
        User::create([
            'id' => '0002122020',
            'name' => ' Bude ratna',
            'email' => 'BudeRatna@gmail.com',
            'phone_number' => '081286293767',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '0003122020',
            'name' => ' Bu kiki',
            'email' => ' bukiki@gmail.com',
            'phone_number' => '082124569212',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '0004012021',
            'name' => ' Mama regi',
            'email' => 'mamaregi@gmail.com',
            'phone_number' => '0004012021',
            'password' => bcrypt('password'),
            'address' => 'Kosong',
            'role' => '1',
            'type' => '1',
        ]);



        User::create([
            'id' => '0005122020',
            'name' => ' Mama dila',
            'email' => 'mamadila@gmail.com',
            'phone_number' => '083808994761',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '0006012021',
            'name' => 'Bu warti',
            'email' => 'buwarti@gmail.com',
            'phone_number' => '081283750074',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '0007122020',
            'name' => ' Mama reyhan',
            'email' => 'Mamareyhan@gmail.com',
            'phone_number' => '087871292202',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '0008012021',
            'name' => 'Bu baam',
            'email' => 'Bubaam@gmail.com',
            'phone_number' => '0008012021',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '0009012021',
            'name' => 'Teh ai',
            'email' => 'Tehai@gmail.com',
            'phone_number' => '0009012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00010012021',
            'name' => 'Bu kasmini',
            'email' => 'Bukasmini@gmail.com',
            'phone_number' => '00010012021',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00011012021',
            'name' => 'Teh rus',
            'email' => 'Tehrus@gmail.com',
            'phone_number' => '00011012021',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00012012021',
            'name' => 'Mama nizar',
            'email' => 'Mamanizar@gmail.com',
            'phone_number' => '00012012021',
            'password' => bcrypt('password'),
            'address' => 'Kosong',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00013012021',
            'name' => 'Bu surasiah',
            'email' => 'Busurasiah@gmail.com',
            'phone_number' => '081413252188',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);
        User::create([
            'id' => '00014012021',
            'name' => 'Mama miftah',
            'email' => 'mamamiftah@gmail.com',
            'phone_number' => '082125523540',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00015012021',
            'name' => 'Mama Devan',
            'email' => 'mamadevan@gmail.com',
            'phone_number' => '081281787529',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00016012021',
            'name' => 'Bu nursiah ',
            'email' => 'bunursiah@gmail.com',
            'phone_number' => '00016012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);
        User::create([
            'id' => '00017012021',
            'name' => 'Bu hj omah',
            'email' => 'buhjomah@gmail.com',
            'phone_number' => '085774451754',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);
        User::create([
            'id' => '00018012021',
            'name' => 'Mama eko',
            'email' => 'mamaeko@gmail.com',
            'phone_number' => '089618624346',
            'password' => bcrypt('password'),
            'address' => ' kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00019012021',
            'name' => 'Bu emma',
            'email' => 'buemma@gmail.com',
            'phone_number' => '085884393446',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00020012021',
            'name' => 'Bi encup',
            'email' => 'biencup@gmail.com',
            'phone_number' => '00020012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);



        User::create([
            'id' => '00021012021',
            'name' => 'k inten',
            'email' => 'kintan@gmail.com',
            'phone_number' => '089650461149',
            'password' => bcrypt('password'),
            'address' => 'kp soka, rt 002/003',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00022012021',
            'name' => ' Mama fadlan',
            'email' => 'mamafadlan@gmail.com',
            'phone_number' => '083893181150',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00023012021',
            'name' => 'Pak surya',
            'email' => 'paksurya@gmail.com',
            'phone_number' => '00023012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);




        User::create([
            'id' => '00024012021',
            'name' => 'Bu warsiti',
            'email' => 'buwarsiti@gmail.com',
            'phone_number' => '00024012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00025012021',
            'name' => 'Mama mega',
            'email' => 'Mamamega@gmail.com',
            'phone_number' => '00025012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00026012021',
            'name' => 'Pak dedy',
            'email' => 'pakdedy@gmail.com',
            'phone_number' => '00026012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);




        User::create([
            'id' => '00027012021',
            'name' => 'Bu suniah',
            'email' => 'busuniah@gmail.com',
            'phone_number' => '085213433710',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00028012021',
            'name' => 'Elisa',
            'email' => 'elisa@gmail.com',
            'phone_number' => '00028012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00029012021',
            'name' => 'Mama bintang',
            'email' => 'mamabintang@gmail.com',
            'phone_number' => '00029012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);



        User::create([
            'id' => '00030012021',
            'name' => 'k ajis',
            'email' => 'kajis@gmail.com',
            'phone_number' => '085157500842',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00031012021',
            'name' => 'Bunda hilya',
            'email' => 'bundahilya@gmail.com',
            'phone_number' => '00031012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00032012021',
            'name' => 'Bu wiwin',
            'email' => 'buwiwin@gmail.com',
            'phone_number' => '00032012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);




        User::create([
            'id' => '00033012021',
            'name' => 'Ibu juju',
            'email' => 'ibujuju@gmail.com',
            'phone_number' => '00033012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00034012021',
            'name' => 'Ibu ratmi',
            'email' => 'iburatmi@gmail.com',
            'phone_number' => '00034012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00035012021',
            'name' => 'Mama aisyah',
            'email' => 'mamaaisyah@gmail.com',
            'phone_number' => '082310257345',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);





        User::create([
            'id' => '00036012021',
            'name' => 'Ibu Ati',
            'email' => 'ibuati@gmail.com',
            'phone_number' => '00036012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00037012021',
            'name' => 'Bu hj Nami',
            'email' => 'buhjnami@gmail.com',
            'phone_number' => '00037012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00038012021',
            'name' => 'Pak kholid',
            'email' => 'pakholid@gmail.com',
            'phone_number' => '089509264821',
            'password' => bcrypt('password'),
            'address' => 'sempur',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00039012021',
            'name' => ' Mama kayla (ai)',
            'email' => 'Mamakayla(ai)@gmail.com',
            'phone_number' => '00039012021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00040012021',
            'name' => 'Mama Lulu',
            'email' => 'mamalulu@gmail.com',
            'phone_number' => '081290313354',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00041012021',
            'name' => 'Doni',
            'email' => 'doni@gmail.com',
            'phone_number' => '00041012021',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00042012021',
            'name' => 'Ibu Ai',
            'email' => 'ibuai@gmail.com',
            'phone_number' => '00042012021',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00043012021',
            'name' => 'Isah',
            'email' => 'isah@gmail.com',
            'phone_number' => '00043012021',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00044012022',
            'name' => 'bu Ustadzah nuraeni',
            'email' => 'buUstadzahnuraeni@gmail.com',
            'phone_number' => '081384060543',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00045012022',
            'name' => 'Nani',
            'email' => 'Nani@gmail.com',
            'phone_number' => '00045012022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00046012022',
            'name' => 'Eni',
            'email' => 'eni@gmail.com',
            'phone_number' => '00046012022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00047012022',
            'name' => 'Mr Wahyu',
            'email' => 'mrwahyu@gmail.com',
            'phone_number' => '00047012022',
            'password' => bcrypt('password'),
            'address' => 'Curug',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00048012022',
            'name' => 'K Widi',
            'email' => 'widi@gmail.com',
            'phone_number' => '085959269780',
            'password' => bcrypt('password'),
            'address' => 'Bitung',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00049012022',
            'name' => 'K Nanda',
            'email' => 'nandagitaandini2@gmail.com',
            'phone_number' => '088249505324',
            'password' => bcrypt('password'),
            'address' => 'perum griya yasa, rt 004/005',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00050012022',
            'name' => 'K Ayu',
            'email' => 'ayu@gmail.com',
            'phone_number' => '00050012022',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00051012022',
            'name' => 'Ibu Masruroh',
            'email' => 'masruroh@gmail.com',
            'phone_number' => '081314119341',
            'password' => bcrypt('password'),
            'address' => 'kp kadu,rt 03/02',
            'role' => '1',
            'type' => '1',
        ]);




        User::create([
            'id' => '00052012022',
            'name' => 'K Isma',
            'email' => 'isma@gmail.com',
            'phone_number' => '00052012022',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00053012022',
            'name' => ' K nifin',
            'email' => 'nifin@gmail.com',
            'phone_number' => '00053012022',
            'password' => bcrypt('password'),
            'address' => 'curug',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00054012022',
            'name' => 'HJ eli',
            'email' => 'hjeli@gmail.com',
            'phone_number' => '00054012022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00055012022',
            'name' => 'Pak Duding',
            'email' => 'duding@gmail.com',
            'phone_number' => '00055012022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00056012022',
            'name' => 'Ni’matul',
            'email' => 'ni’matul@gmail.com',
            'phone_number' => '00056012022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00057012022',
            'name' => 'Pak Puguh',
            'email' => 'Puguh@gmail.com',
            'phone_number' => '00057012022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00058012022',
            'name' => 'K Novi',
            'email' => 'novi@gmail.com',
            'phone_number' => '085817844415',
            'password' => bcrypt('password'),
            'address' => ' kp kadu ,rt03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00059082022',
            'name' => ' mama kayla gorengan',
            'email' => 'mamakayla@gmail.com',
            'phone_number' => '083895461630',
            'password' => bcrypt('password'),
            'address' => 'kp kadu ,rt03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00060082022',
            'name' => 'Mama Afifah',
            'email' => 'mamaafifah@gmail.com',
            'phone_number' => '00060082022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu ,rt03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00061052022',
            'name' => 'Ibu Amah gosok',
            'email' => 'amahgosok@gmail.com',
            'phone_number' => '00061052022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu ,rt03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00062112022',
            'name' => 'Pak Jundi',
            'email' => 'Jundi@gmail.com',
            'phone_number' => '00062112022',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00063092022',
            'name' => 'Pak Iwang',
            'email' => 'iwang@gmail.com',
            'phone_number' => '083811104644',
            'password' => bcrypt('password'),
            'address' => 'curug',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00064082022',
            'name' => 'Hj Ojen',
            'email' => 'ojen@gmail.com',
            'phone_number' => '00064082022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu ,rt03/02',
            'role' => '1',
            'type' => '1',
        ]);


        User::create([
            'id' => '00065102022',
            'name' => 'Pak Edi',
            'email' => 'Edi@gmail.com',
            'phone_number' => '00065102022',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00066032022',
            'name' => 'Mama Haikal',
            'email' => 'mamahaikal@gmail.com',
            'phone_number' => '00066032022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu ,rt03/02',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00067122021',
            'name' => 'Ibu Soleha',
            'email' => 'ibusoleha@gmail.com',
            'phone_number' => '00067122021',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00068032022',
            'name' => 'T Uyoh',
            'email' => 'uyoh@gmail.com',
            'phone_number' => '00068032022',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00069082022',
            'name' => 'Ibu Cucu',
            'email' => 'cucu@gmail.com',
            'phone_number' => '085313921022',
            'password' => bcrypt('password'),
            'address' => 'curug',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00070082022',
            'name' => 'Bunda Tisa',
            'email' => 'bundatisa@gmail.com',
            'phone_number' => '00070082022',
            'password' => bcrypt('password'),
            'address' => 'kosong',
            'role' => '1',
            'type' => '1',
        ]);

        User::create([
            'id' => '00071072022',
            'name' => 'Zidan',
            'email' => 'zidan@gmail.com',
            'phone_number' => '00071072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00072072022',
            'name' => 'Labib',
            'email' => 'labib@gmail.com',
            'phone_number' => '00072072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00073072022',
            'name' => 'Fitri',
            'email' => 'fitri@gmail.com',
            'phone_number' => '00073072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00074072022',
            'name' => 'Shakira',
            'email' => 'shakira@gmail.com',
            'phone_number' => '00074072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00075072022',
            'name' => 'Viona',
            'email' => 'viona@gmail.com',
            'phone_number' => '00075072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);


        User::create([
            'id' => '00076072022',
            'name' => 'fitra',
            'email' => 'fitra@gmail.com',
            'phone_number' => '00076072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00077072022',
            'name' => 'Faisal',
            'email' => 'faisal@gmail.com',
            'phone_number' => '00077072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00078072022',
            'name' => 'Reno',
            'email' => 'reno@gmail.com',
            'phone_number' => '00078072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00079072022',
            'name' => 'Abian',
            'email' => 'abian@gmail.com',
            'phone_number' => '00079072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00080072022',
            'name' => 'Dafa',
            'email' => 'dafa@gmail.com',
            'phone_number' => '00080072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00081072022',
            'name' => 'Selin',
            'email' => 'selin@gmail.com',
            'phone_number' => '00081072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00082072022',
            'name' => 'Bayu',
            'email' => 'bayu@gmail.com',
            'phone_number' => '00082072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00083072022',
            'name' => 'Nafisah',
            'email' => 'nafisah@gmail.com',
            'phone_number' => '00083072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00084072022',
            'name' => 'Monica',
            'email' => 'monica@gmail.com',
            'phone_number' => '00084072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '3',
        ]);

        User::create([
            'id' => '00085072022',
            'name' => 'iklas',
            'email' => 'iklas@gmail.com',
            'phone_number' => '085691411420',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00086072022',
            'name' => 'fadil',
            'email' => 'fadil@gmail.com',
            'phone_number' => '08986919244',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00087072022',
            'name' => 'Aksha',
            'email' => 'aksha@gmail.com',
            'phone_number' => '085316010622',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);
        User::create([
            'id' => '00088072022',
            'name' => 'Zahra',
            'email' => 'zahra@gmail.com',
            'phone_number' => '089653271426',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00089072022',
            'name' => 'Hafiz',
            'email' => 'hafiz@gmail.com',
            'phone_number' => '083878100056',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00090072022',
            'name' => 'Safira',
            'email' => 'safira@gmail.com',
            'phone_number' => '081296229483',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00091072022',
            'name' => 'Fazila',
            'email' => 'fazila@gmail.com',
            'phone_number' => '00091072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00092072022',
            'name' => 'Kansa',
            'email' => 'kansa@gmail.com',
            'phone_number' => '00092072022',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);


        User::create([
            'id' => '00093072022',
            'name' => 'Faris',
            'email' => 'faris@gmail.com',
            'phone_number' => '087786652040',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);


        User::create([
            'id' => '00094072022',
            'name' => 'Kenzo',
            'email' => 'kenzo@gmail.com',
            'phone_number' => '085697307142',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00095072022',
            'name' => 'Fatimah',
            'email' => 'fatimah@gmail.com',
            'phone_number' => '081296395117',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00096072022',
            'name' => 'Kahyla',
            'email' => 'kahyla@gmail.com',
            'phone_number' => '085691931541',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00097072022',
            'name' => 'Nada',
            'email' => 'nada@gmail.com',
            'phone_number' => '0895325190289',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '00098072022',
            'name' => 'Wulan',
            'email' => 'wulan@gmail.com',
            'phone_number' => '085157741605',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);


        User::create([
            'id' => '00099072022',
            'name' => 'Reyhan',
            'email' => 'reyhan@gmail.com',
            'phone_number' => '',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);


        User::create([
            'id' => '000100072022',
            'name' => 'Dila',
            'email' => 'dila@gmail.com',
            'phone_number' => '08380994761',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '000101072022',
            'name' => 'Neng',
            'email' => 'neng@gmail.com',
            'phone_number' => '089643085952',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '000102072022',
            'name' => 'Dio',
            'email' => 'dio@gmail.com',
            'phone_number' => '082124899987',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '000103072022',
            'name' => 'Tita',
            'email' => 'tita@gmail.com',
            'phone_number' => '081311450609',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);


        User::create([
            'id' => '000104072022',
            'name' => 'Fayola',
            'email' => 'fayola@gmail.com',
            'phone_number' => '081218988615',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);

        User::create([
            'id' => '000105072022',
            'name' => 'Nizar',
            'email' => 'nizar@gmail.com',
            'phone_number' => '085215373131',
            'password' => bcrypt('password'),
            'address' => 'kp kadu',
            'role' => '1',
            'type' => '2',
        ]);
    }
}
