<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoryFixtures extends Fixture
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    # cette fonction load() est exécutée en ligne de commande aavec : php bin/console doctrine:fixture:load --append
    public function load(ObjectManager $manager): void
    {

        $categories = [
            'Politique',
            'Société',
            'Sport',
            'Cinéma',
            'Santé',
            'Mode',
            'Sciences',
            'Environnement'
        ];

        foreach ($categories as $cat) {
            $category = new Category();

            $category->setName($cat);
            $category->setAlias($this->slugger->slug($cat));

            # La méthode persist() éxécute les requêtes SQL en BDD
            $manager->persist($category);
        }

        #La méthode flsuh() n'est pas dans la boucle foreach() pour une raison :
        # => cette méthode "vide" l'objet $manager (c'est un container).
        $manager->flush();
    }
}
