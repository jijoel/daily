<?php namespace Days\Day016\BowlingGame;

use RangeException;


class BowlingGame
{
    private $rolls = array();

    public function roll($pins)
    {
        if($pins < 0 || $pins > 10) {
            throw new RangeException;
        }
        $this->rolls[] = $pins;
    }

    public function score($forFrame=10)
    {
        $score = 0;
        $this->firstInFrame = 0;

        for($frame=0; $frame<$forFrame; $frame++) {
            $score += $this->scoreFrame();
            $this->firstInFrame += $this->rollsInFrame();
        }

        return $score;
    }

    private function scoreFrame()
    {
        if ($this->isStrike())
            return $this->scoreForStrike();
        
        if ($this->isSpare())
            return $this->scoreForSpare();
        
        return  $this->scoreForNormal();
    }

    private function isStrike()
    {
        return ($this->currentBallScore() == 10);
    }

    private function isSpare()
    {
        return ($this->currentBallScore() 
             + $this->nextBallScore() == 10);
    }

    private function scoreForStrike()
    {
        return $this->currentFrameScore() 
             + $this->nextBallScore() 
             + $this->secondNextBallScore();
    }

    private function scoreForSpare()
    {
        return $this->currentFrameScore() 
             + $this->secondNextBallScore();
    }

    private function scoreForNormal()
    {
        return $this->currentFrameScore(); 
    }

    private function currentFrameScore()
    {
        if ($this->isStrike() || $this->isSpare())
            return 10;

        return $this->currentBallScore() + $this->nextBallScore();
    }

    private function currentBallScore()
    {
        return $this->rolls[$this->firstInFrame];
    }

    private function nextBallScore()
    {
        if (isset($this->rolls[$this->firstInFrame+1]))
            return $this->rolls[$this->firstInFrame+1];
    }

    private function secondNextBallScore()
    {
        if (isset($this->rolls[$this->firstInFrame+2]))
            return $this->rolls[$this->firstInFrame+2];        
    }

    private function rollsInFrame()
    {
        if ($this->isStrike())
            return 1;

        return 2;
    }

}
