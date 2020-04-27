<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Medecin;
use App\Entity\Patient;
use App\Entity\Partenaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=1; $i <20 ; $i++) { 
            $medecin = new Medecin();
            $medecin->setNomMed($faker->name)
                    ->setPrenomMed($faker->name)
                    ->setSpecialite($faker->jobTitle)
                    ->setLocalisation($faker->address)
            ;
            $manager->persist($medecin);

        }

        for ($l=1; $l <20 ; $l++) { 
            $partenaire = new Partenaire();
            $partenaire->setIdPartenaire($faker->postcode)
                        ->setNomPartenaire($faker->name)
            ;
            $manager->persist($partenaire);

        }

        
        for ($k=1; $k <20 ; $k++) { 
            $patient = new Patient();
            $patient->setNumUniqueRdz($faker->ean8)
                    ->setGenre($faker->randomElement($array = array ('F','M',)) )
                    ->setNomPatient($faker->name)
                    ->setPrenomPatient($faker->name)
                    ->setDateNaissance($faker->dateTime($max = 'now', $timezone = null))
                    ->setMutuelle($faker->boolean)
                    ->setDateRdz($faker->month)
                    ->setTelephone($faker->ean8)
                    ->setVille($faker->city)
                    ->setQuartier($faker->address)
            ;
            $manager->persist($patient);

        }
        for ($l=1; $l <20 ; $l++) { 
            $user = new User();
            $user->setUsername($faker->name)
                ->setEmail($faker->freeEmail)
                ->setPassword($faker->name)
                ->setChoiceroles($faker->randomElement($array = array ('ROLE_ADMIN','ROLE_PARTENAIRE','ROLE_MEDECIN')))
                ->setEnabled($faker->boolean)
            ;
            $manager->persist($user);

        }

        $manager->flush();
    }
}
