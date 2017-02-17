<?php

namespace tests\Integration;

use PHPUnit_Framework_TestCase;
use video\Movie\Movie;
use video\Movie\MovieType;
use video\Rental\Rental;
use video\Rental\RentalStatement;

/**
 * Class VideoStoreTest
 */
class VideoStoreTest extends PHPUnit_Framework_TestCase
{
    /** @var  RentalStatement */
    private $statement;
    /** @var  Movie */
    private $newRelease1;
    /** @var  Movie */
    private $newRelease2;
    /** @var  Movie */
    private $childrens;
    /** @var  Movie */
    private $regular1;
    /** @var  Movie */
    private $regular2;
    /** @var  Movie */
    private $regular3;

    /**
     * Test set up.
     */
    protected function setUp()
    {
        $this->statement = new RentalStatement('Customer Name');
        $this->newRelease1 = new Movie('New Release 1', MovieType::buildNewReleaseType());
        $this->newRelease2 = new Movie('New Release 2', MovieType::buildNewReleaseType());
        $this->childrens = new Movie('Childrens', MovieType::buildChildrenMovieType());
        $this->regular1 = new Movie('Regular 1', MovieType::buildRegularMovieType());
        $this->regular2 = new Movie('Regular 2', MovieType::buildRegularMovieType());
        $this->regular3 = new Movie('Regular 3', MovieType::buildRegularMovieType());
    }

    /**
     * Test tear down objects.
     */
    protected function tearDown()
    {
        $this->statement = null;
        $this->newRelease1 = null;
        $this->newRelease2 = null;
        $this->childrens = null;
        $this->regular1 = null;
        $this->regular2 = null;
        $this->regular3 = null;
    }

    private function assertAmountAndPointsForReport($expectedAmount, $expectedPoints)
    {
        $this->assertEquals($expectedAmount, $this->statement->amountOwed());
        $this->assertEquals($expectedPoints, $this->statement->frequentRenterPoints());
    }

    public function testSingleNewReleaseStatement()
    {
        $this->statement->addRental(new Rental($this->newRelease1, 3));
        $this->statement->makeRentalStatement();

        $this->assertAmountAndPointsForReport(9.0, 2);
    }

    public function testDualNewReleaseStatement()
    {
        $this->statement->addRental(new Rental($this->newRelease1, 3));
        $this->statement->addRental(new Rental($this->newRelease2, 3));
        $this->statement->makeRentalStatement();

        $this->assertAmountAndPointsForReport(18.0, 4);
    }

    public function testSingleChildrensStatement()
    {
        $this->statement->addRental(new Rental($this->childrens, 3));
        $this->statement->makeRentalStatement();

        $this->assertAmountAndPointsForReport(1.5, 1);
    }

    public function testMultipleRegularStatement()
    {
        $this->statement->addRental(new Rental($this->regular1, 1));
        $this->statement->addRental(new Rental($this->regular2, 2));
        $this->statement->addRental(new Rental($this->regular3, 3));
        $this->statement->makeRentalStatement();

        $this->assertAmountAndPointsForReport(7.5, 3);
    }

    public function testRentalStatementFormat()
    {
        $this->statement->addRental(new Rental($this->regular1, 1));
        $this->statement->addRental(new Rental($this->regular2, 2));
        $this->statement->addRental(new Rental($this->regular3, 3));

        $this->assertEquals(
            "Rental Record for Customer Name\n" .
            "\tRegular 1\t2.0\n" .
            "\tRegular 2\t2.0\n" .
            "\tRegular 3\t3.5\n" .
            "You owed 7.5\n" .
            "You earned 3 frequent renter points\n",
            $this->statement->makeRentalStatement()
        );
    }
}
