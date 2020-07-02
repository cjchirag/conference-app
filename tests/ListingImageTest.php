<?php
/** 
 * Created by PhpStorm.
 * User: alena
 * Date: 2019-02-01
 * Time: 14:17
 */

use PHPUnit\Framework\TestCase;

class ListingImageTest extends TestCase
{
    // A function to test that correct value is stored in the image property when NO image is passed in data parameter.
    public function testNoImage()
    {
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => '',
        ];
        $listing = new ListingBasic($data);
        $this->assertFalse($listing->getImage());

    }

    // A function to test that correct value is stored in the image property when full path to an image is passed in data parameter.
    public function testFullPathImage()
    {
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => 'https://www.cascadiaphp.com/images/logo.svg',
        ];
        $listing = new ListingBasic($data);
        $this->assertEquals($data['image'], $listing->getImage());

    }

    // A function to test that correct value is stored in the image property when build path to an image is passed in data parameter.
    public function testBuildPathImage()
    {
        define('BASE_URL', '/');
        $data = [
            'id' => 1,
            'title' => 'Test Title',
            'image' => 'images/listings/1.png',
        ];
        $listing = new ListingBasic($data);
        $this->assertEquals(BASE_URL.'/'.$data['image'], $listing->getImage());
    }
}
