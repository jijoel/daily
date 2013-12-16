<?php

use Days\Day016\BowlingGame\BowlingGame;


class BowlingGameTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->game = new BowlingGame;
    }

    public function testGutterGame()
    {
        $this->rollMany(20, 0);
        $this->assertSame(0, $this->game->score());
    }

    public function testLowGame()
    {
        $this->rollMany(20, 1);
        $this->assertSame(20, $this->game->score());
    }

    public function testOneSpare()
    {
        $this->rollMany(3, 5);
        $this->rollMany(17, 0);
        $this->assertSame(20, $this->game->score());
    }

    public function testOneStrike()
    {
        $this->rollMany(1, 10);
        $this->rollMany(2, 4);
        $this->rollMany(17, 0);
        $this->assertSame(26, $this->game->score());
    }

    public function testHighGame()
    {
        $this->rollMany(12, 10);
        $this->assertSame(300, $this->game->score());
    }

    public function testFindScoreForCurrentFrame()
    {
        $this->rollMany(6, 4);
        $this->assertSame(24, $this->game->score(3));
    }

    public function testFindScoreForCurrentFrameIfStrike()
    {
        $this->rollMany(1, 10);
        $this->rollMany(1, 5);
        $this->assertSame(15, $this->game->score(1));
        $this->assertSame(20, $this->game->score(2));
    }

    public function testFindScoreWhilePlayingFrame()
    {
        $this->rollMany(5, 4);
        $this->assertSame(20, $this->game->score(3));
    }

    public function testHitAndMiss()
    {
        for ($frame=0; $frame<10; $frame++) {
            $this->game->roll(9);        
            $this->game->roll(0);        
        }
        $this->assertSame(90, $this->game->score());
    }

    public function testAllSpares()
    {
        $this->rollMany(21, 5);

        $this->assertSame(150, $this->game->score());
    }

    /**
     * @expectedException RangeException
     */
    public function testRollIsPositiveNumber()
    {
        $this->game->roll(-1);
    }

    /**
     * @expectedException RangeException
     */
    public function testRollIsAtMostTen()
    {
        $this->game->roll(11);
    }

    private function rollMany($howMany, $whatNumber)
    {
        for ($roll=0; $roll<$howMany; $roll++)
            $this->game->roll($whatNumber);
    }

}
