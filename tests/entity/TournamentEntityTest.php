<?php

namespace App\Tests;

use App\Entity\Event;
use App\Entity\Users;
use DateTimeImmutable;
use App\Entity\Tournament;
use PHPUnit\Framework\TestCase;

class TournamentEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $tournament = new Tournament();
        $datetime = new DateTimeImmutable();
        $user = new Users();
        $event = new Event();

        $tournament 
            ->setPosition(1)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->addUser($user)
            ->addEvenement($event)
        ;

        $this->assertTrue($tournament->getPosition() === 1);
        $this->assertTrue($tournament->getCreatedAt() === $datetime);
        $this->assertTrue($tournament->getUpdatedAt() === $datetime);
        $this->assertContains($user, $tournament->getUsers());
        $this->assertContains($event, $tournament->getEvenements());
    }

    public function testIsFalse()
    {
        $tournament = new tournament();
        $datetime = new DateTimeImmutable();
        $user = new Users();
        $event = new Event();

        $tournament 
            ->setPosition(1)
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->addUser($user)
            ->addEvenement($event)
        ;

        $this->assertFalse($tournament->getPosition() === false);
        $this->assertFalse($tournament->getCreatedAt() ===  new DateTimeImmutable());
        $this->assertFalse($tournament->getUpdatedAt() ===  new DateTimeImmutable());
        $this->assertNotContains(new Users(), $tournament->getUsers());
        $this->assertNotContains(new Event(), $tournament->getEvenements());
    }

    public function testIsEmpty()
    {
        $tournament = new tournament();

        $this->assertEmpty($tournament->getPosition());
        $this->assertEmpty($tournament->getCreatedAt());
        $this->assertEmpty($tournament->getUpdatedAt());
        $this->assertEmpty($tournament->getUsers());
        $this->assertEmpty($tournament->getEvenements());
    }
}
