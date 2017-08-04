<?php

namespace Calling\tests;

use PHPUnit\Framework\TestCase;

use Revolution\Calling\Calling;

class CallingTest extends TestCase
{
    /**
     * @var Calling
     */
    protected $calling;

    public function setUp()
    {
        parent::setUp();

        $this->calling = new Calling();
    }

    public function testInstance()
    {
        $this->assertInstanceOf('Revolution\Calling\Calling', $this->calling);
    }


    public function testArea()
    {
        $area = $this->calling->area('090-0000-0000');

        $this->assertEquals('携帯電話・PHS', $area);
    }

    public function testEmpty()
    {
        $area = $this->calling->area('非通知');

        $this->assertEmpty($area);
    }

    public function testArea2()
    {
        $area = $this->calling->area('0123');

        $this->assertContains('北海道', $area);
    }

    public function testArea3()
    {
        $area = $this->calling->area('03000000');

        $this->assertContains('東京', $area);
    }

    public function testSetNumber()
    {
        $this->calling->setNumber(['010' => 'test']);

        $area = $this->calling->area('010');

        $this->assertEquals('test', $area);
    }

    public function testGetNumber()
    {
        $data = $this->calling->getNumber();
        $data['0120'] = 'フリーダイヤル';
        $this->calling->setNumber($data);

        $area = $this->calling->area('0120-00000');

        $this->assertEquals('フリーダイヤル', $area);
    }
}
