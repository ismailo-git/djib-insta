<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $microPost1 = new MicroPost();
        $microPost1->setTitle('Welcome to Djibouti');
        $microPost1->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book");
        $microPost1->setCreatedAt(new DateTimeImmutable());

        $manager->persist($microPost1);

        $microPost2 = new MicroPost();
        $microPost2->setTitle('Welcome to France');
        $microPost2->setContent("Lorem Ipsum is simply dummy text of the printing and typesettin2 industry. Lorem Ipsum has been the industry's standard dummy text ever since2the 1500s, when an unknown printer took a galley of type and scrambled 2t to make a type specimen book");
        $microPost2->setCreatedAt(new DateTimeImmutable());

        $manager->persist($microPost2);

        $microPost3 = new MicroPost();
        $microPost3->setTitle('Welcome to Somalia');
        $microPost3->setContent("Lorem Ipsum is simply dummy text of the printing and typesettin3 industry. Lorem Ipsum has been the industry's standard dummy text ever since3the 1500s, when an unknown printer took a galley of type and scrambled 3t to make a type specimen book");
        $microPost3->setCreatedAt(new DateTimeImmutable());

        $manager->persist($microPost3);

        $microPost4 = new MicroPost();
        $microPost4->setTitle('Welcome to Ethiopia');
        $microPost4->setContent("Lorem Ipsum is simply dummy text of the printing and typesettin4 industry. Lorem Ipsum has been the industry's standard dummy text ever since4the 1500s, when an unknown printer took a galley of type and scrambled 4t to make a type specimen book");
        $microPost4->setCreatedAt(new DateTimeImmutable());

        $manager->persist($microPost4);


        $manager->flush();
    }
}
