<?php

namespace App\DataFixtures;

use App\Entity\Seasons;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SeasonsFixtures extends Fixture
{
    const SEASON_NAME = [
        'Hiver',
        'Printemps',
        'Été',
        'Automne'
    ];

    public function load(ObjectManager $manager)
    {
        $i=0;
        foreach (self::SEASON_NAME as $seasonName) {
            $season = new Seasons();
            $season->setName($seasonName);
            $this->addReference('season_'.$i, $season);
            $manager->persist($season);
            $i++;
        }

        $manager->flush();
    }
}
