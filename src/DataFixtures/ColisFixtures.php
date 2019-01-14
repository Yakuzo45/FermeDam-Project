<?php
/**
 * Created by PhpStorm.
 * User: wilder7
 * Date: 11/01/19
 * Time: 09:18
 */

namespace App\DataFixtures;

use App\Entity\Colis;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ColisFixtures extends Fixture implements DependentFixtureInterface
{


    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 4; $i++) {
            for ($a = 0; $a < 5; $a++) {
                $colis = new Colis();
                $colis->setWeight(rand(5, 20));
                $colis->setPrice($faker->randomDigit);
                $colis->setDescription($faker->text);
                $colis->addSeason($this->getReference('season_'.$i));
                $manager->persist($colis);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [SeasonsFixtures::class];
    }
}