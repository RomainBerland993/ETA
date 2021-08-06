<?php

namespace App\Tests;

use DateTimeImmutable;
use App\Entity\Category;
use App\Entity\Discipline;
use PHPUnit\Framework\TestCase;

class CategoryEntityTest extends TestCase
{
    public function testIsTrue()
    {
        $category = new Category();
        $datetime = new DateTimeImmutable();
        $discipline = new Discipline();

        $category   
            ->setLabel('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setDiscipline($discipline)
        ;

        $this->assertTrue($category->getLabel() === 'test');
        $this->assertTrue($category->getCreatedAt() === $datetime);
        $this->assertTrue($category->getUpdatedAt() === $datetime);
        $this->assertTrue($category->getDiscipline() === $discipline);
    }

    public function testIsFalse()
    {
        $category = new Category();
        $datetime = new DateTimeImmutable();
        $discipline = new Discipline();
        
        $category   
            ->setLabel('test')
            ->setCreatedAt($datetime)
            ->setUpdatedAt($datetime)
            ->setDiscipline($discipline)
        ;

        $this->assertFalse($category->getLabel() === 'false');
        $this->assertFalse($category->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($category->getUpdatedAt() === new DateTimeImmutable());
        $this->assertFalse($category->getDiscipline() === new Discipline());
    }

    public function testIsEmpty()
    {        
        $category = new Category();
        
        $this->assertEmpty($category->getlabel());
        $this->assertEmpty($category->getCreatedAt());
        $this->assertEmpty($category->getUpdatedAt());
        $this->assertEmpty($category->getDiscipline());
    }
}
