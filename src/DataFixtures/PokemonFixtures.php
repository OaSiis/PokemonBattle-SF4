<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use App\Entity\Type;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // /!\ L'index du tableau commence toujours par 0
        $pokemonsData = [
        //  [0,           1,   2,                3]
            ['Bulbizare', 50, Type::TYPE_PLANT, $this->getReference("Tranch'herb")],
            ['Salamèche', 50, Type::TYPE_FIRE, $this->getReference("Flammèche")],
            ['Carapuce', 50, Type::TYPE_WATER, $this->getReference("Pistolet à O")]
        ];

        foreach($pokemonsData as $pokemonData) {
            $pokemon = new Pokemon();
            $pokemon
                ->setName($pokemonData[0]) // Premier élément du tableau
                ->setHealth($pokemonData[1])
                ->setType($pokemonData[2])
                ->addAttack($pokemonData[3])
            ;

            $manager->persist($pokemon);

        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
