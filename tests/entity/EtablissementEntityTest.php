<?php

namespace App\Tests;

use App\Entity\Comment;
use App\Entity\Type;
use DateTimeImmutable;
use App\Entity\Etablissement;
use App\Entity\Event;
use App\Entity\Like;
use PHPUnit\Framework\TestCase;

class EtablissementEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $etablissement = new Etablissement();
        $datetime = new DateTimeImmutable();
        $type = new Type();
        $event = new Event();
        $comment = new Comment();
        $like = new Like();

        $etablissement
            ->setName('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setWebUrl('www.test.fr')
            ->setTwitter('essai')
            ->setFacebook('essai')
            ->setYouTube('essai')
            ->setInstagram('essai')
            ->setType($type)
            ->addEvent($event)
            ->addComment($comment)
            ->addLike($like)
        ;

        $this->assertTrue($etablissement->getName() === 'test');
        $this->assertTrue($etablissement->getCreatedAt() === $datetime);
        $this->assertTrue($etablissement->getUpdatedAt() === $datetime);
        $this->assertTrue($etablissement->getWebUrl() === 'www.test.fr');
        $this->assertTrue($etablissement->getTwitter() === 'essai');
        $this->assertTrue($etablissement->getFacebook() === 'essai');
        $this->assertTrue($etablissement->getYouTube() === 'essai');
        $this->assertTrue($etablissement->getInstagram() === 'essai');
        $this->assertTrue($etablissement->getType() === $type);
        $this->assertContains($event, $etablissement->getEvents());
        $this->assertContains($comment, $etablissement->getComments());
        $this->assertContains($like, $etablissement->getLikes());
    }

    public function testIsFalse()
    {
        $etablissement = new Etablissement();
        $datetime = new DateTimeImmutable();
        $type = new Type();
        $event = new Event();
        $comment = new Comment();
        $like = new Like();

        $etablissement
            ->setName('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setWebUrl('www.test.fr')
            ->setTwitter('essai')
            ->setFacebook('essai')
            ->setYouTube('essai')
            ->setInstagram('essai')
            ->setType($type)
            ->addEvent($event)
            ->addComment($comment)
            ->addLike($like)
        ;

        $this->assertFalse($etablissement->getName() === 'testfalse');
        $this->assertFalse($etablissement->getCreatedAt() ===  new DateTimeImmutable());
        $this->assertFalse($etablissement->getUpdatedAt() ===  new DateTimeImmutable());
        $this->assertFalse($etablissement->getWebUrl() === 'false');
        $this->assertFalse($etablissement->getTwitter() === 'false');
        $this->assertFalse($etablissement->getFacebook() === 'false');
        $this->assertFalse($etablissement->getYouTube() === 'false');
        $this->assertFalse($etablissement->getInstagram() === 'false');
        $this->assertFalse($etablissement->getType() === new Type());
        $this->assertNotContains(new Event(), $etablissement->getEvents());
        $this->assertNotContains(new Comment(), $etablissement->getComments());
        $this->assertNotContains(new Like(), $etablissement->getLikes());
    }

    public function testIsEmpty()
    {
        $etablissement = new Etablissement();

        $this->assertEmpty($etablissement->getName());
        $this->assertEmpty($etablissement->getCreatedAt());
        $this->assertEmpty($etablissement->getUpdatedAt());
        $this->assertEmpty($etablissement->getWebUrl());
        $this->assertEmpty($etablissement->getTwitter());
        $this->assertEmpty($etablissement->getFacebook());
        $this->assertEmpty($etablissement->getYouTube());
        $this->assertEmpty($etablissement->getInstagram());
        $this->assertEmpty($etablissement->getType());
        $this->assertEmpty($etablissement->getEvents());
        $this->assertEmpty($etablissement->getComments());
        $this->assertEmpty($etablissement->getLikes());
    }
}
