<?php 
use PHPUnit\Framework\TestCase;
include 'argumentHandler.php';

class ArgumentHandlerTest extends Testcase {

    public function testDoMultipleArgumentsExist() {
        $handler = new ArgumentHandler();
        $this->assertEquals(3, $handler->doMultipleArgumentsExist(3));
    }

    /**
    * @test
    */
    public function validateArgumentsTest() {
        $handler = new ArgumentHandler();

        $array = array(
            'csv-combiner.php', 
            './fixtures/accessories.csv', 
            './fixtures/clothing.csv'
        );

        $this->assertNull($handler->validateArguments($array, count($array)));
    }

}

?>