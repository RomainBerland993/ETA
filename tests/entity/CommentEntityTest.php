<?php

namespace App\Tests;

use App\Entity\Event;
use App\Entity\Users;
use DateTimeImmutable;
use App\Entity\Comment;
use App\Entity\Etablissement;
use App\Entity\Like;
use PHPUnit\Framework\TestCase;

class CommentEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $comment = new Comment();
        $datetime = new DateTimeImmutable();
        $event = new Event();
        $user = new Users();
        $etablissement = new Etablissement();
        $like = new Like();

        $comment   
            ->setContent('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setEvent($event)
            ->setUser($user)
            ->setEtablissement($etablissement)
            ->addLike($like)
        ;

        $this->assertTrue($comment->getContent() === 'test');
        $this->assertTrue($comment->getCreatedAt() === $datetime);
        $this->assertTrue($comment->getUpdatedAt() === $datetime);
        $this->assertTrue($comment->getEvent() === $event);
        $this->assertTrue($comment->getUser() === $user);
        $this->assertTrue($comment->getEtablissement() === $etablissement);
        $this->assertContains($like, $comment->getLikes());
    }

    public function testIsFalse()
    {
        $comment = new Comment();
        $datetime = new DateTimeImmutable();
        $event = new Event();
        $user = new Users();
        $etablissement = new Etablissement();
        $like = new Like();

        $comment   
            ->setContent('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setEvent($event)
            ->setUser($user)
            ->setEtablissement($etablissement)
            ->addLike($like)
        ;

        $this->assertFalse($comment->getContent() === 'false');
        $this->assertFalse($comment->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($comment->getUpdatedAt() === new DateTimeImmutable());
        $this->assertFalse($comment->getEvent() === new Event());
        $this->assertFalse($comment->getUser() === new Users());
        $this->assertFalse($comment->getEtablissement() === new Etablissement());
        $this->assertNotContains(new Like(), $comment->getLikes());
    }

    public function testIsEmpty()
    {        
        $comment = new Comment();
        
        $this->assertEmpty($comment->getContent());
        $this->assertEmpty($comment->getCreatedAt());
        $this->assertEmpty($comment->getUpdatedAt());
        $this->assertEmpty($comment->getEvent());
        $this->assertEmpty($comment->getUser());
        $this->assertEmpty($comment->getEtablissement());
        $this->assertEmpty($comment->getLikes());
    }
}
