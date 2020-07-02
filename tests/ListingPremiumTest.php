<?php 

use PHPUnit\Framework\TestCase;

class ListingPremiumTest extends TestCase
{
    /** @test */
    // A function to test if the correct status (premium) is returned for object of type ListingPremium
    public function StatusVerification()
    {
        $listing = new ListingPremium(
            ['id' => 0, 'title' => 'Premium Test 1']
        );

        $this->assertEquals('premium', $listing->getStatus());

    }

    /** @test */
    // A function to test if the correct description is returned when getDescription is called.
    public function DescriptionVerification()
    {
        $listing = new ListingPremium(
            ['id' => 0, 
            'title' => 'Premium Test 2',
            'description' => 'This is a test description']
        );

        $this->assertEquals('This is a test description', 
        $listing->getDescription());

    }

    /** @test */
    // A function to test displayAllowedTags method works correctly.
    public function TestingForAllowedTags() {
        $listing = new ListingPremium(
            ['id' => 0, 
            'title' => 'Premium Test 2',
            'description' => 'This is a test description']
        );

        $this->assertEquals('&lt;p&gt;&lt;br&gt;&lt;b&gt;&lt;strong&gt;&lt;em&gt;&lt;u&gt;&lt;ol&gt;&lt;ul&gt;&lt;li&gt;', 
        $listing->displayAllowedTags());

    }

}