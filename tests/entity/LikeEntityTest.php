<?php

namespace App\Tests;

use App\Entity\Like;
use App\Entity\Event;
use App\Entity\Users;
use DateTimeImmutable;
use App\Entity\Comment;
use App\Entity\Etablissement;
use PHPUnit\Framework\TestCase;

class LikeEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $like = new Like();
        $datetime = new DateTimeImmutable();
        $event = new Event();
        $user = new Users();
        $etablissement = new Etablissement();
        $comment = new Comment();

        $like   
            ->setLikes('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setEvent($event)
            ->setUsers($user)
            ->setEtablissement($etablissement)
            ->setComment($comment)
        ;

        $this->assertTrue($like->getLikes() === true);
        $this->assertTrue($like->getCreatedAt() === $datetime);
        $this->assertTrue($like->getUpdatedAt() === $datetime);
        $this->assertTrue($like->getEvent() === $event);
        $this->assertTrue($like->getUsers() === $user);
        $this->assertTrue($like->getEtablissement() === $etablissement);
        $this->assertTrue($like->getComment() === $comment);
    }

    public function testIsFalse()
    {
        $like = new Like();
        $datetime = new DateTimeImmutable();
        $event = new Event();
        $user = new Users();
        $etablissement = new Etablissement();
        $comment = new Comment();
        
        $like   
            ->setLikes('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setEvent($event)
            ->setUsers($user)
            ->setEtablissement($etablissement)
            ->setComment($comment)
        ;

        $this->assertFalse($like->getLikes() === false);
        $this->assertFalse($like->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($like->getUpdatedAt() === new DateTimeImmutable());
        $this->assertFalse($like->getEvent() === new Event());
        $this->assertFalse($like->getUsers() === new Users());
        $this->assertFalse($like->getEtablissement() === new Etablissement());
        $this->assertFalse($like->getComment() === new Comment());
    }

    public function testIsEmpty()
    {        
        $like = new Like();
        
        $this->assertEmpty($like->getLikes());
        $this->assertEmpty($like->getCreatedAt());
        $this->assertEmpty($like->getUpdatedAt());
        $this->assertEmpty($like->getEvent());
        $this->assertEmpty($like->getUsers());
        $this->assertEmpty($like->getEtablissement());
        $this->assertEmpty($like->getComment());
    }
}
