<?php

namespace Blog\ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Blog\ModelBundle\Entity\Post;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Post Entity
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc)
     */
    public function getOrder()
    {
        return 15;
    }

    /**
     * {@inheritDoc)
     */
    public function load(ObjectManager $manager)
    {
        $p1 = new Post();
        $p1->setTitle('Lorem ipsum dolor sit amet');
        $p1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sem dui, aliquam eu consequat hendrerit,
         interdum vel lacus. Nullam ac mattis diam. Donec finibus mauris vel mattis tempor. In molestie ligula vitae risus
         finibus, quis pulvinar quam malesuada. Aliquam erat volutpat. Pellentesque aliquet lectus sed nisl egestas
         sollicitudin. Mauris sem lectus, iaculis vel purus vitae, efficitur auctor dui. Donec porttitor odio nec felis egestas,
          sit amet condimentum lectus venenatis. Phasellus enim lorem, elementum id ultricies maximus, lacinia sed dolor.
          Nunc fringilla, felis et tincidunt efficitur, purus lacus eleifend leo, id egestas diam neque et orci.');
        $p1->setAuthor($this->getAuthor($manager, 'David'));

        $p2 = new Post();
        $p2->setTitle('Phasellus enim lorem, elementum');
        $p2->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sem dui, aliquam eu consequat hendrerit,
         interdum vel lacus. Nullam ac mattis diam. Donec finibus mauris vel mattis tempor. In molestie ligula vitae risus
         finibus, quis pulvinar quam malesuada. Aliquam erat volutpat. Pellentesque aliquet lectus sed nisl egestas
         sollicitudin. Mauris sem lectus, iaculis vel purus vitae, efficitur auctor dui. Donec porttitor odio nec felis egestas,
          sit amet condimentum lectus venenatis. Phasellus enim lorem, elementum id ultricies maximus, lacinia sed dolor.
          Nunc fringilla, felis et tincidunt efficitur, purus lacus eleifend leo, id egestas diam neque et orci.');
        $p2->setAuthor($this->getAuthor($manager, 'Eddie'));

        $p3 = new Post();
        $p3->setTitle('Nunc fringilla, felis et tincidunt efficitur');
        $p3->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sem dui, aliquam eu consequat hendrerit,
         interdum vel lacus. Nullam ac mattis diam. Donec finibus mauris vel mattis tempor. In molestie ligula vitae risus
         finibus, quis pulvinar quam malesuada. Aliquam erat volutpat. Pellentesque aliquet lectus sed nisl egestas
         sollicitudin. Mauris sem lectus, iaculis vel purus vitae, efficitur auctor dui. Donec porttitor odio nec felis egestas,
          sit amet condimentum lectus venenatis. Phasellus enim lorem, elementum id ultricies maximus, lacinia sed dolor.
          Nunc fringilla, felis et tincidunt efficitur, purus lacus eleifend leo, id egestas diam neque et orci.');
        $p3->setAuthor($this->getAuthor($manager, 'Eddie'));

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);

        $manager->flush();
    }

    /**
     * Get an Author
     *
     * @param ObjectManager $manager
     * @param string $name
     *
     * return Author
     */
    private function getAuthor(ObjectManager $manager, $name)
    {
        return $manager->getRepository('ModelBundle:Author')->findOneBy(
            array(
                'name' => $name
            )
        );
    }

}