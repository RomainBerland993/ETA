<?php

namespace App\Tests;

use App\Entity\Adress;
use App\Entity\Comment;
use App\Entity\Event;
use App\Entity\Like;
use App\Entity\Tournament;
use App\Entity\Users;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class UsersEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Users();
        $datetime = new DateTimeImmutable();
        $adresse = new Adress();
        $event = new Event();
        $tournament = new Tournament();
        $comment = new Comment();
        $like = new Like();

        $user
            ->setEmail('true@test.com')
            ->setFirstname('prenom')
            ->setLastname('nom')
            ->setPassword('password')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setPseudo('essai')
            ->setAvatar('test')
            ->setPhone('06-19-24-75-48')
            ->setAdress($adresse) 
            ->addEvent($event)  
            ->addTournament($tournament)   
            ->addComment($comment)   
            ->addLike($like)      
        ;

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getFirstname() === 'prenom');
        $this->assertTrue($user->getLastname() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getCreatedAt() === $datetime);
        $this->assertTrue($user->getUpdatedAt() === $datetime);
        $this->assertTrue($user->getPseudo() === 'essai');
        $this->assertTrue($user->getAvatar() === 'test');
        $this->assertTrue($user->getPhone() === '06-19-24-75-48');
        $this->assertTrue($user->getAdress() === $adresse);
        $this->assertContains($event, $user->getEvents());
        $this->assertContains($tournament, $user->getTournaments());
        $this->assertContains($comment, $user->getComments());
        $this->assertContains($like, $user->getLikes());
    }

    public function testIsFalse()
    {
        $user = new Users();
        $datetime = new DateTimeImmutable();
        $adresse = new Adress();
        $event = new Event();
        $tournament = new Tournament();
        $comment = new Comment();
        $like = new Like();

        $user
            ->setEmail('true@test.com')
            ->setFirstname('prenom')
            ->setLastname('nom')
            ->setPassword('password')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setPseudo('essai')
            ->setAvatar('test')
            ->setPhone('06-19-24-75-48')
            ->setAdress($adresse) 
            ->addEvent($event)  
            ->addTournament($tournament)   
            ->addComment($comment)    
            ->addLike($like)  
        ;
        
        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getFirstname() === 'false');
        $this->assertFalse($user->getLastname() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($user->getUpdatedAt() === new DateTimeImmutable());
        $this->assertFalse($user->getPseudo() === 'false');
        $this->assertFalse($user->getAvatar() === 'false');
        $this->assertFalse($user->getPhone() === 'false');
        $this->assertFalse($user->getAdress() === new Adress());
        $this->assertNotContains(new Event(), $user->getEvents());
        $this->assertNotContains(new Tournament(), $user->getTournaments());
        $this->assertNotContains(new Comment(), $user->getComments());
        $this->assertNotContains(new Like(), $user->getLikes());
    }

    public function testIsEmpty()
    {
        $user = new Users();
        
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getCreatedAt());
        $this->assertEmpty($user->getUpdatedAt());
        $this->assertEmpty($user->getPseudo());
        $this->assertEmpty($user->getAvatar());
        $this->assertEmpty($user->getPhone());
        $this->assertEmpty($user->getAdress());
        $this->assertEmpty($user->getEvents());
        $this->assertEmpty($user->getTournaments());
        $this->assertEmpty($user->getComments());
        $this->assertEmpty($user->getLikes());
    }
}
