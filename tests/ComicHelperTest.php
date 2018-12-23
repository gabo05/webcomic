<?php
declare(strict_types=1);
require_once('helpers/comic.php');

use PHPUnit\Framework\TestCase;

final class ComicHelperTest extends TestCase
{
    public function testReturnNextAvailableComic(){
        $helper = new \helpers\ComicHelper();

        $nfcomic = $helper->getSafeComicById(404);

        $this->assertTrue($nfcomic != null);
        $this->assertEquals($nfcomic->num, 405);
    }
    public function testNotFoundComic(){
        $helper = new \helpers\ComicHelper();

        $nfcomic = $helper->getSafeComicById(500000000);

        $this->assertNull($nfcomic);
    }
    public function testReturnRightComic(){
        $helper = new \helpers\ComicHelper();

        $nfcomic = $helper->getSafeComicById(20);

        $this->assertTrue($nfcomic != null);
        $this->assertEquals($nfcomic->num, 20);
    }
}