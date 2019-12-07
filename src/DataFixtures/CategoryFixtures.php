<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $activities = array(
			array('name' => 'Fonte de la banquise'),
			array('name' => 'Fermes et agriculture en foret'),
			array('name' => 'Recenser les espèces'),
			array('name' => 'Préserver son littoral'),
			array('name' => 'Rouler plus vert'),
			array('name' => 'Eau potable pour tous')
        );

		foreach ( $activities as $key => $value ) {
			$activity = new Activity();
			$activity->setName( $value['name'] );
			$manager->persist($activity);
		}
        $manager->flush();
    }
}
