<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\EntryExit;
use App\Models\FamilyVisit;
use App\Models\Motive;
use App\Models\ProfessionalService;
use App\Models\ProfessionalVisit;
use App\Models\Service;
use App\Models\User;
use App\Models\Visit;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Segura1506@'),
                'admin' => true
            ],
            [
                'name' => 'Adrian Sullca',
                'email' => 'adrian@gmail.com',
                'password' => bcrypt('Segura1506@'),
                'admin' => false
            ]
        ];

        $motives = [
            [
                'name' => 'Otros',
                'enabled' => true
            ],
            [
                'name' => 'Reunión',
                'enabled' => true
            ],
            [
                'name' => 'Recogida de alumno',
                'enabled' => true
            ]
        ];

        $services = [
            [
                'name' => 'Otros',
                'enabled' => true
            ],
            [
                'name' => 'Electricista',
                'enabled' => true
            ],
            [
                'name' => 'Fontanero',
                'enabled' => true
            ],
            [
                'name' => 'Pintor',
                'enabled' => true
            ],
            [
                'name' => 'Limpieza',
                'enabled' => true
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        foreach ($motives as $motive) {
            Motive::create($motive);
        }

        foreach ($services as $service) {
            Service::create($service);
        }

        // Fechas base (3 días distintos, del más antiguo al más nuevo)
        $day1 = Carbon::now()->subDays(5)->setTime(8, 0);
        $day2 = Carbon::now()->subDays(4)->setTime(8, 0);
        $day3 = Carbon::now()->subDays(3)->setTime(8, 0);

        // ------------ DÍA 1 ------------
        $visit1 = Visit::create([
            'name' => 'Laura',
            'surname' => 'Martínez',
            'email' => 'laura.martinez1@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit1->id,
            'student_name' => 'Carlos',
            'student_surname' => 'Martínez',
            'student_course' => '3 ESO',
            'motive_id' => 1,
            'custom_motive' => 'Consulta con el tutor',
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit1->id,
            'visit_type' => 'family',
            'date_entry' => $day1->copy()->setTime(8, 10),
            'date_exit' => $day1->copy()->setTime(9, 0),
        ]);

        $visit2 = Visit::create([
            'name' => 'Jorge',
            'surname' => 'López',
            'email' => 'jorge.lopez1@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit2->id,
            'student_name' => 'Lucía',
            'student_surname' => 'López',
            'student_course' => '1 Bachillerato',
            'motive_id' => 3,
            'custom_motive' => null,
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit2->id,
            'visit_type' => 'family',
            'date_entry' => $day1->copy()->setTime(9, 30),
            'date_exit' => $day1->copy()->setTime(10, 20),
        ]);

        $visit3 = Visit::create([
            'name' => 'María',
            'surname' => 'Sánchez',
            'email' => 'maria.sanchez1@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit3->id,
            'student_name' => 'Diego',
            'student_surname' => 'Sánchez',
            'student_course' => '2 ESO',
            'motive_id' => 2,
            'custom_motive' => null,
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit3->id,
            'visit_type' => 'family',
            'date_entry' => $day1->copy()->setTime(11, 0),
            'date_exit' => $day1->copy()->setTime(12, 0),
        ]);

        $company1 = Company::create([
            'name' => 'ElectricCo',
            'CIF' => 'A12345678',
            'telephone' => '932456789',
        ]);

        $visit4 = Visit::create([
            'name' => 'Carlos',
            'surname' => 'Fernández',
            'email' => 'carlos.fernandez1@electricco.com',
        ]);

        $professional1 = ProfessionalVisit::create([
            'visit_id' => $visit4->id,
            'company_id' => $company1->id,
            'NIF' => '12345678Z',
            'age' => 35,
        ]);

        $entryExitProfessional1 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit4->id,
            'visit_type' => 'professional',
            'date_entry' => $day1->copy()->setTime(12, 30),
            'date_exit' => $day1->copy()->setTime(13, 45),
        ]);

        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional1->id,
            'professional_id' => $professional1->id,
            'service_id' => 1,
            'task' => 'Revisión mensual de sistemas eléctricos',
        ]);


        $company2 = Company::create([
            'name' => 'FontaServe',
            'CIF' => 'B87654321',
            'telephone' => '934567890',
        ]);
        $visit5 = Visit::create([
            'name' => 'Ana',
            'surname' => 'Rodríguez',
            'email' => 'ana.rodriguez1@fontaserve.com',
        ]);
        $professional2 = ProfessionalVisit::create([
            'visit_id' => $visit5->id,
            'company_id' => $company2->id,
            'NIF' => '87654321A',
            'age' => 42,
        ]);

        $entryExitProfessional2 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit5->id,
            'visit_type' => 'professional',
            'date_entry' => $day1->copy()->setTime(14, 0),
            'date_exit' => $day1->copy()->setTime(15, 30),
        ]);

        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional2->id,
            'professional_id' => $professional2->id,
            'service_id' => 3,
            'task' => 'Revisión de tuberias',
        ]);


        $company3 = Company::create([
            'name' => 'Pinturas Marín',
            'CIF' => 'C11223344',
            'telephone' => '935678901',
        ]);
        $visit6 = Visit::create([
            'name' => 'Luis',
            'surname' => 'Martínez',
            'email' => 'luis.martinez1@pinturasmarin.com',
        ]);
        $professional3 = ProfessionalVisit::create([
            'visit_id' => $visit6->id,
            'company_id' => $company3->id,
            'NIF' => '11223344B',
            'age' => 29,
        ]);
        $entryExitProfessional3 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit6->id,
            'visit_type' => 'professional',
            'date_entry' => $day1->copy()->setTime(16, 0),
            'date_exit' => $day1->copy()->setTime(17, 30),
        ]);
        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional3->id,
            'professional_id' => $professional3->id,
            'service_id' => 4,
            'task' => 'Pintura de aulas',
        ]);


        // ------------ DÍA 2 ------------
        $visit7 = Visit::create([
            'name' => 'Pedro',
            'surname' => 'Gómez',
            'email' => 'pedro.gomez2@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit7->id,
            'student_name' => 'Andrea',
            'student_surname' => 'Gómez',
            'student_course' => '4 ESO',
            'motive_id' => 1,
            'custom_motive' => 'Entrega documentación',
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit7->id,
            'visit_type' => 'family',
            'date_entry' => $day2->copy()->setTime(8, 30),
            'date_exit' => $day2->copy()->setTime(9, 30),
        ]);

        $visit8 = Visit::create([
            'name' => 'Carmen',
            'surname' => 'Molina',
            'email' => 'carmen.molina2@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit8->id,
            'student_name' => 'Mario',
            'student_surname' => 'Molina',
            'student_course' => '2 ESO',
            'motive_id' => 2,
            'custom_motive' => null,
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit8->id,
            'visit_type' => 'family',
            'date_entry' => $day2->copy()->setTime(9, 40),
            'date_exit' => $day2->copy()->setTime(10, 20),
        ]);

        $visit9 = Visit::create([
            'name' => 'Javier',
            'surname' => 'Ortiz',
            'email' => 'javier.ortiz2@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit9->id,
            'student_name' => 'Elena',
            'student_surname' => 'Ortiz',
            'student_course' => '3 ESO',
            'motive_id' => 1,
            'custom_motive' => 'Recoger justificante',
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit9->id,
            'visit_type' => 'family',
            'date_entry' => $day2->copy()->setTime(10, 30),
            'date_exit' => $day2->copy()->setTime(11, 15),
        ]);

        $company4 = Company::create([
            'name' => 'Limpieza Exprés',
            'CIF' => 'D44332211',
            'telephone' => '936789012',
        ]);
        $visit10 = Visit::create([
            'name' => 'Sofía',
            'surname' => 'García',
            'email' => 'sofia.garcia2@limpiezaexpres.com',
        ]);
        $professional4 = ProfessionalVisit::create([
            'visit_id' => $visit10->id,
            'company_id' => $company4->id,
            'NIF' => '44332211C',
            'age' => 31,
        ]);

        $entryExitProfessional4 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit10->id,
            'visit_type' => 'professional',
            'date_entry' => $day2->copy()->setTime(12, 0),
            'date_exit' => $day2->copy()->setTime(13, 10),
        ]);
        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional4->id,
            'professional_id' => $professional4->id,
            'service_id' => 3,
            'task' => 'Revisión de tuberias de los baños',
        ]);


        $company5 = Company::create([
            'name' => 'Jardinería Verde',
            'CIF' => 'E55667788',
            'telephone' => '937890123',
        ]);
        $visit11 = Visit::create([
            'name' => 'Pablo',
            'surname' => 'Campos',
            'email' => 'pablo.campos2@jardineriaverde.com',
        ]);
        $professional5 = ProfessionalVisit::create([
            'visit_id' => $visit11->id,
            'company_id' => $company5->id,
            'NIF' => '55667788D',
            'age' => 38,
        ]);
        $entryExitProfessional5 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit11->id,
            'visit_type' => 'professional',
            'date_entry' => $day2->copy()->setTime(13, 30),
            'date_exit' => $day2->copy()->setTime(14, 30),
        ]);
        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional5->id,
            'professional_id' => $professional5->id,
            'service_id' => 1,
            'task' => 'Mantenimiento de jardines',
        ]);


        $company6 = Company::create([
            'name' => 'SegurPlus',
            'CIF' => 'F99887766',
            'telephone' => '938901234',
        ]);
        $visit12 = Visit::create([
            'name' => 'Marta',
            'surname' => 'Gil',
            'email' => 'marta.gil2@segurplus.com',
        ]);
        $professional6 = ProfessionalVisit::create([
            'visit_id' => $visit12->id,
            'company_id' => $company6->id,
            'NIF' => '99887766E',
            'age' => 45,
        ]);
        $entryExitProfessional6 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit12->id,
            'visit_type' => 'professional',
            'date_entry' => $day2->copy()->setTime(15, 0),
            'date_exit' => $day2->copy()->setTime(16, 0),
        ]);


        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional6->id,
            'professional_id' => $professional6->id,
            'service_id' => 1,
            'task' => 'Reparacion de ventanas',
        ]);


        // ------------ DÍA 3 ------------
        $visit13 = Visit::create([
            'name' => 'Fernando',
            'surname' => 'Vega',
            'email' => 'fernando.vega3@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit13->id,
            'student_name' => 'Paula',
            'student_surname' => 'Vega',
            'student_course' => '4 ESO',
            'motive_id' => 1,
            'custom_motive' => 'Consulta médica',
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit13->id,
            'visit_type' => 'family',
            'date_entry' => $day3->copy()->setTime(8, 20),
            'date_exit' => $day3->copy()->setTime(9, 10),
        ]);

        $visit14 = Visit::create([
            'name' => 'Silvia',
            'surname' => 'Herrera',
            'email' => 'silvia.herrera3@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit14->id,
            'student_name' => 'Alberto',
            'student_surname' => 'Herrera',
            'student_course' => '2 Bachillerato',
            'motive_id' => 2,
            'custom_motive' => null,
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit14->id,
            'visit_type' => 'family',
            'date_entry' => $day3->copy()->setTime(9, 40),
            'date_exit' => $day3->copy()->setTime(10, 30),
        ]);

        $visit15 = Visit::create([
            'name' => 'Manuel',
            'surname' => 'Pérez',
            'email' => 'manuel.perez3@example.com',
        ]);
        FamilyVisit::create([
            'visit_id' => $visit15->id,
            'student_name' => 'Clara',
            'student_surname' => 'Pérez',
            'student_course' => '1 ESO',
            'motive_id' => 3,
            'custom_motive' => null,
        ]);
        EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit15->id,
            'visit_type' => 'family',
            'date_entry' => $day3->copy()->setTime(11, 20),
            'date_exit' => $day3->copy()->setTime(12, 10),
        ]);

        $company7 = Company::create([
            'name' => 'FontaServe Pro',
            'CIF' => 'H22334455',
            'telephone' => '940123456',
        ]);
        $visit16 = Visit::create([
            'name' => 'Eva',
            'surname' => 'López',
            'email' => 'eva.lopez3@fontaservepro.com',
        ]);
        $professional7 = ProfessionalVisit::create([
            'visit_id' => $visit16->id,
            'company_id' => $company7->id,
            'NIF' => '22334455G',
            'age' => 36,
        ]);

        $entryExitProfessional7 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit16->id,
            'visit_type' => 'professional',
            'date_entry' => $day3->copy()->setTime(12, 45),
            'date_exit' => $day3->copy()->setTime(13, 50),
        ]);

        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional7->id,
            'professional_id' => $professional7->id,
            'service_id' => 3,
            'task' => 'Revision de tuberias del laboratorio',
        ]);

        $company8 = Company::create([
            'name' => 'ElectricCo Plus',
            'CIF' => 'I66778899',
            'telephone' => '941234567',
        ]);
        $visit17 = Visit::create([
            'name' => 'Gonzalo',
            'surname' => 'Ramírez',
            'email' => 'gonzalo.ramirez3@electriccoplus.com',
        ]);
        $professional8 = ProfessionalVisit::create([
            'visit_id' => $visit17->id,
            'company_id' => $company8->id,
            'NIF' => '66778899H',
            'age' => 41,
        ]);

        $entryExitProfessional8 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit17->id,
            'visit_type' => 'professional',
            'date_entry' => $day3->copy()->setTime(14, 10),
            'date_exit' => $day3->copy()->setTime(15, 20),
        ]);

        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional8->id,
            'professional_id' => $professional8->id,
            'service_id' => 2,
            'task' => 'Cableado de la oficina',
        ]);


        $company9 = Company::create([
            'name' => 'Limpieza Exprés Pro',
            'CIF' => 'J99887766',
            'telephone' => '942345678',
        ]);
        $visit18 = Visit::create([
            'name' => 'Isabel',
            'surname' => 'Moreno',
            'email' => 'isabel.moreno3@limpiezaexprespro.com',
        ]);

        ProfessionalVisit::create([
            'visit_id' => $visit18->id,
            'company_id' => $company9->id,
            'NIF' => '99887766J',
            'age' => 28,
        ]);

        $entryExitProfessional9 = EntryExit::create([
            'user_id' => 1,
            'visit_id' => $visit18->id,
            'visit_type' => 'professional',
            'date_entry' => $day3->copy()->setTime(16, 0),
            'date_exit' => $day3->copy()->setTime(17, 0),
        ]);

        ProfessionalService::create([
            'entry_exit_id' => $entryExitProfessional9->id,
            'professional_id' => $professional8->id,
            'service_id' => 2,
            'task' => 'Cableado de la oficina y aulas',
        ]);
    }
}
