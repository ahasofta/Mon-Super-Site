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
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=1; $i <20 ; $i++) { 
            $medecin = new Medecin();
            $manager->persist($medecin);
            
            for ($k=1; $k <5 ; $k++) { 
                $partenaire = new Partenaire();
                $manager->persist($partenaire);
                for ($j=1; $j <10 ; $j++) { 
                    $patient = new Patient();
                    $manager->persist($patient);
                    
                }
            }

        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
