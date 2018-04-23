<?php

namespace D3strukt0r\VotifierClient\ServerType;

use PHPUnit\Framework\TestCase;

class ClassicVotifierTest extends TestCase
{
    /** @var \D3strukt0r\VotifierClient\ServerType\ClassicVotifier */
    private $obj = null;

    public function setUp()
    {
        $this->obj = new ClassicVotifier('mock_host', 'mock_port', 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuyi7TXsufptucSYoVgZLonqFxtYvK0uJoxpExE+hcXRz3tR9jbXxtJv689/T+CHmvxJmli7g0CL0NucFDAdltat7bYu6AQMtWa7CYgvEtddwR5/ZMkZ1c3swK61fVeIsGE3oaA8Gdz1iBoG5njNmHtPzZm1CRWEYhUMMEPu9mBmqTRSYGrDr7NDJ5TL0frpLpPL/4rSTIOCJl0lBzzIT7supRmzppgeuWoh2M2lNUna329xtD5bhRPzmcIh4O2wC3jNQ+yh286mTcLG4AFBQgrSGfUHAZa6/l5rmF09Mg5CCvxqj05EBXafYGEH7bojtzDFC3J6NliAkMghk0jmrxQIDAQAB');
    }

    public function tearDown()
    {
        $this->obj = null;
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('D3strukt0r\VotifierClient\ServerType\ClassicVotifier', $this->obj);
    }

    public function testValues()
    {
        $this->assertSame('mock_host', $this->obj->getHost());
        $this->assertSame('mock_port', $this->obj->getPort());
        $key = wordwrap('MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuyi7TXsufptucSYoVgZLonqFxtYvK0uJoxpExE+hcXRz3tR9jbXxtJv689/T+CHmvxJmli7g0CL0NucFDAdltat7bYu6AQMtWa7CYgvEtddwR5/ZMkZ1c3swK61fVeIsGE3oaA8Gdz1iBoG5njNmHtPzZm1CRWEYhUMMEPu9mBmqTRSYGrDr7NDJ5TL0frpLpPL/4rSTIOCJl0lBzzIT7supRmzppgeuWoh2M2lNUna329xtD5bhRPzmcIh4O2wC3jNQ+yh286mTcLG4AFBQgrSGfUHAZa6/l5rmF09Mg5CCvxqj05EBXafYGEH7bojtzDFC3J6NliAkMghk0jmrxQIDAQAB', 65, "\n", true);
        $key = <<<EOF
-----BEGIN PUBLIC KEY-----
$key
-----END PUBLIC KEY-----
EOF;
        $this->assertSame($key, $this->obj->getPublicKey());
    }

    public function testHeaderVerification()
    {
        $this->assertFalse($this->obj->verifyConnection(false));
        $this->assertFalse($this->obj->verifyConnection('VOTFI'));
        $this->assertTrue($this->obj->verifyConnection('VOTIFIER'));
    }
}