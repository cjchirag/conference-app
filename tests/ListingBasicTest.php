<?php 

use PHPUnit\Framework\TestCase;

class ListingBasicTest extends TestCase
{
    /** @test */
    // A function to test if correct exception message has been passed when no data is passed.
    public function ConstructExceptionMessage()
    {
        $this->expectExceptionMessage('Unable to create a listing, data unavailable');
        $listing = new ListingBasic ();

    }

    /** @test */
    // A function to test if correct exception message is passed when there is an invalid id/no id passed in data parameter.
    public function IDValidity()
    {
        $this->expectExceptionMessage('Unable to create a listing, invalid id');
        $listing = new ListingBasic ([
            'title' => 'Just Testing',
            'website' => 'www.example.com',
            'email' => 'example@email.com',
            'twitter' => '@twitter',
            'status' => 'unknown',
            'image' => 'https://google.com'
        ]);

    }
    
    /** @test */
    // A function to test if correct exception message is passed when there is an invalid title/no title is passed in data parameter.
    public function TitleValidity()
    {
        $this->expectExceptionMessage('Unable to create a listing, invalid title');
        $listing = new ListingBasic ([
            'id' => 0,
            'website' => 'www.example.com',
            'email' => 'example@email.com',
            'twitter' => '@twitter',
            'status' => 'unknown',
            'image' => 'https://google.com'
        ]);
    }

    /** @test */
    // A function to test if an object is created with minimum data parameters (id and title)
    public function CreationVerify()
    {
        $listing = new ListingBasic(["id"=> "0", "title"=>"test title"]);
        $this->assertIsObject($listing);
        
    }

    /** @test */
    // A function to test if status returns 'basic' for an Object of ListingBasic type.
    public function StatusVerify()
    {
        $listing = new ListingBasic(["id"=> "0", "title"=>"test title"]);
        $this->assertEquals('basic', $listing->getStatus());

    }

    /** @test */
    // A function to test if the get method of (id, title, website, email, twitter, status) returns the correct value. 
    public function DataValidity()
    {
        $data = [
            'id' => 0,
            'title' => 'test title',
            'website' => 'example.com',
            'email' => 'email@example.com',
            'twitter' => '@example',
            'status' => 'php'
        ];
        $listing = new ListingBasic($data);

        $this->assertEquals(0, $listing->getId());
        $this->assertEquals('test title', $listing->getTitle());
        $this->assertEquals('http://example.com', $listing->getWebsite());
        $this->assertEquals('email@example.com', $listing->getEmail());
        $this->assertEquals('example', $listing->getTwitter());
        $this->assertEquals('php', $listing->getStatus());

    }

    /** @test */
    // A function to test the arrayTo method returns the expected array.
    public function ArrayConversionVerification()
    {
        $data = [
            'id' => 0,
            'title' => 'test title',
            'website' => 'example.com',
            'email' => 'email@example.com',
            'twitter' => '@example'
        ];
        $listing = new ListingBasic($data);
        $expectedArray = $listing->toArray();

        $this->assertEquals(
            [
                'id' => '0',
                'title' => 'test title',
                'website' => 'http://example.com',
                'email' => 'email@example.com',
                'twitter' => 'example',
                'status' => 'basic',
                'image' => null
            ], $expectedArray
        );

    }

    /** @test */
    // A function to test setWebsite method works correctly.
    public function TestingSetWebsites()
    {
        $data = [
            'id' => 0,
            'title' => 'test title',
            'email' => 'email@example.com',
            'twitter' => '@example'
        ];
        $listing = new ListingBasic($data);
        $listing->setWebsite('');
        
        $this->assertEmpty($listing->getWebsite());
        
    }

    /** @test */
    // A function to test setStatus method works correctly.
    public function TestingSetStatus()
    {
        $data = [
            'id' => 0,
            'title' => 'test title',
            'email' => 'email@example.com',
            'twitter' => '@example'
        ];
        $listing = new ListingBasic($data);
        $listing->setStatus('');
        
        $this->assertEquals('basic', $listing->getStatus());

        $listingtwo = new ListingBasic($data);
        $listingtwo->setStatus('php');

        $this->assertEquals('php', $listingtwo->getStatus());
        
    }

}