<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Cracker;

class CrackerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test1()
    {
    $cracker = new Cracker("! ) #");
    $this->assertSame("abc", $cracker->decrypt("!)#")); 
    }

    public function test3()
    {
    $cracker = new Cracker("! ) # (");
    $this->assertSame("abcd", $cracker->decrypt("!)#(")); 
    }

    public function test4()
    {
    $cracker = new Cracker("! ) # ( £");
    $this->assertSame("abc db", $cracker->decrypt("!)# ()")); /// test needed to solve problem with spaces
    }

    public function test5()
    {
    $cracker = new Cracker("! ) # ( £");
    $this->assertSame("abcde", $cracker->decrypt("!)#(£")); /// test needed to solve problem with unicode characters
    }

    public function testFull()
    {
    $cracker = new Cracker("! ) # ( £ * % & > < @ a b c d e f g h i j k l m n o");
    $this->assertSame("hello mum", $cracker->decrypt("&£aad bjb"));
    }   

}

