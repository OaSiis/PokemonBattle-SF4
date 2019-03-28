<?php

namespace App\DataFixtures;

use App\Entity\Attack;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AttackFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach($this->getAttackData() as [$name, $power, $type]) {
            $attack = new Attack();
            $attack
                ->setName($name)
                ->setPower($power)
                ->setType($type)
            ;

            $manager->persist($attack);
            $reference = $this->addReference($name, $attack);
        }

        $manager->flush();
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    private function getAttackData(): array
    {
        return [
            // $attackData = [$name, $power, $type]
            ["Tranch'herb", 15, Type::TYPE_PLANT, ''],
            ['Flammèche', 15, Type::TYPE_FIRE, ''],
            ['Pistolet à O', 15, Type::TYPE_WATER, '']
        ];
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
