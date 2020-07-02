<?php 

use PHPUnit\Framework\TestCase;

class ListingFeaturedTest extends TestCase
{
    /** @test */
    // A function to test if the correct status (featured) is returned for object of type ListingFeatured
    public function StatusVerification()
    {
        $listing = new ListingFeatured(
            ['id' => 0, 'title' => 'Featured Test 1']
        );

        $this->assertEquals('featured', $listing->getStatus());

    }

    /** @test */
    // A function to test if the correct coc is returned when getCoc is called.
    public function COCVerification()
    {
        $listing = new ListingFeatured(
            ['id' => 0, 
            'title' => 'Premium Test 2',
            'coc' => 'This is a test coc']
        );

        $this->assertEquals('This is a test coc', 
        $listing->getCoc());

    }

}