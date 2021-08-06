<?php

namespace App\Tests;

use App\Entity\Comment;
use App\Entity\Discipline;
use App\Entity\Etablissement;
use App\Entity\Event;
use App\Entity\Like;
use App\Entity\Tournament;
use App\Entity\Users;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class EventEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $event = new Event();
        $datetime = new DateTimeImmutable();
        $user = new Users();
        $discipline = new Discipline();
        $etablissement = new Etablissement();
        $tournament = new Tournament();
        $comment = new Comment();
        $like = new Like();

        $event
            ->setName('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setDate($datetime)
            ->setPlayerLimit(1)
            ->setFormula('essai')
            ->addUser($user)
            ->addDiscipline($discipline)
            ->addEtablissement($etablissement)
            ->addTournament($tournament)
            ->addComment($comment)
            ->addLike($like)
        ;

        $this->assertTrue($event->getName() === 'test');
        $this->assertTrue($event->getCreatedAt() === $datetime);
        $this->assertTrue($event->getUpdatedAt() === $datetime);
        $this->assertTrue($event->getDate() === $datetime);
        $this->assertTrue($event->getPlayerLimit() === 1);
        $this->assertTrue($event->getFormula() === 'essai');
        $this->assertContains($user, $event->getUsers());
        $this->assertContains($discipline, $event->getDiscipline());
        $this->assertContains($etablissement, $event->getEtablissements());
        $this->assertContains($tournament, $event->getTournaments());
        $this->assertContains($comment, $event->getComments());
        $this->assertContains($like, $event->getLikes());
    }

    public function testIsFalse()
    {
        $event = new Event();
        $datetime = new DateTimeImmutable();
        $user = new Users();
        $discipline = new Discipline();
        $etablissement = new Etablissement();        
        $tournament = new Tournament();
        $comment = new Comment();
        $like = new Like();

        $event
            ->setName('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setDate($datetime)
            ->setPlayerLimit(1)
            ->setFormula('essai')
            ->addUser($user)
            ->addDiscipline($discipline)
            ->addEtablissement($etablissement)
            ->addTournament($tournament)
            ->addComment($comment)
            ->addLike($like)
        ;

        $this->assertFalse($event->getName() === 'false');
        $this->assertFalse($event->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($event->getUpdatedAt() === new DateTimeImmutable());
        $this->assertFalse($event->getDate() === new DateTimeImmutable());
        $this->assertFalse($event->getPlayerLimit() === false);
        $this->assertFalse($event->getFormula() === 'false');
        $this->assertNotContains(new Users(), $event->getUsers());
        $this->assertNotContains(new Discipline(), $event->getDiscipline());
        $this->assertNotContains(new Etablissement(), $event->getEtablissements());
        $this->assertNotContains(new Tournament(), $event->getTournaments());
        $this->assertNotContains(new Comment(), $event->getComments());
        $this->assertNotContains(new Like(), $event->getLikes());
    }

    public function testIsEmpty()
    {
        $event = new Event();

        $this->assertEmpty($event->getName());
        $this->assertEmpty($event->getCreatedAt());
        $this->assertEmpty($event->getUpdatedAt());
        $this->assertEmpty($event->getDate());
        $this->assertEmpty($event->getPlayerLimit());
        $this->assertEmpty($event->getFormula());
        $this->assertEmpty($event->getUsers());
        $this->assertEmpty($event->getDiscipline());
        $this->assertEmpty($event->getEtablissements());
        $this->assertEmpty($event->getTournaments());
        $this->assertEmpty($event->getComments());
        $this->assertEmpty($event->getLikes());
    }
}
