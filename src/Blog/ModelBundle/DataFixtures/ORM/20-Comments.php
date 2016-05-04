<?php

namespace Blog\ModelBundle\DataFixtures;

use Blog\ModelBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for the Comment Entity
 */
class Comments extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $posts= $manager->getRepository('ModelBundle:Post')->findAll();

        $comments = array(
            0 => 'это текст-"рыба", часто используемый в печати и вэб-дизайне.
                  Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.',
            1 => 'В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов,
                  используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил
                  без заметных изменений пять веков, но и перешагнул в электронный дизайн.',
            2 => 'Его популяризации в новое время послужили публикация листов Letraset с
                  образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной
                  вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.'
        );

        $i = 0;
        foreach ($posts as $post) {
            $comment = new Comment();
            $comment->setAuthorName('Someone');
            $comment->setBody($comments[$i++]);
            $comment->setPost($post);

            $manager->persist($comment);
        }

        $manager->flush();

    }

}