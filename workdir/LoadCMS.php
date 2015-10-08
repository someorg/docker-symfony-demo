<?php

namespace MyNameSpace\MyBundle\DataFixtures\ORM;

use \Doctrine\Common\DataFixtures\AbstractFixture;
use \Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use \Doctrine\Common\Persistence\ObjectManager;
use \MyNameSpace\MyBundle\Entity\CMS;

class LoadCMS extends AbstractFixture
{
    /**
     * 
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $cms=new cms();
        $cms->setHeading('Here lies a heading');
        $cms->setLink('http://imgur.com/cylQ780');
        $cms->setImage('http://i.imgur.com/cylQ780.png');

        $manager->persist($cms);

        $manager->flush();
    }

}

?>
