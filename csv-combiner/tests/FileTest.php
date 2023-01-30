<?php 
use PHPUnit\Framework\TestCase;
include 'File.php';

class FileTest extends Testcase {

    /**
     * @test
     */
    public function fileClassTest() {
        $file = new File('./fixtures/accessories.csv');
        $this->assertFileExists($file->path);
        $this->assertFileIsReadable($file->path);
        $this->assertIsResource($file->read);
        $this->assertEquals('accessories.csv', $file->name);
    }

}

?>