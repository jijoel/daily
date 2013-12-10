<?php namespace Days\Day015;


class Diamond
{
    const LETTER_A = 65;

    protected $maxLetter;

    public function build($letter)
    {
        $this->setMaxLetter($letter);

        return $this->buildTopOfDiamond() 
             . $this->buildBottomOfDiamond();
    }

    protected function setMaxLetter($letter)
    {
        $this->maxLetter = ord(strtoupper(substr($letter,0,1)));
    }

    protected function buildTopOfDiamond()
    {
        $return = '';
        for($cur = self::LETTER_A; $cur <= $this->maxLetter; $cur++) {
            $return .= $this->buildSingleLine($cur);
        }
        return $return;
    }

    protected function buildBottomOfDiamond()
    {
        $return = '';
        for($cur = $this->maxLetter - 1; $cur >= self::LETTER_A; $cur--) {
            $return .= $this->buildSingleLine($cur);
        }
        return $return;
    }

    protected function buildSingleLine($value)
    {
        $output = $this->getSpacesBeforeLetter($value)
                . $this->getLetter($value);

        if (self::LETTER_A == $value) {
            return $output . PHP_EOL;
        }

        return $output
             . $this->getSpacesBetweenLetters($value)
             . $this->getLetter($value)
             . PHP_EOL;
    }

    protected function getLetter($value)
    {
        return chr($value);
    }

    protected function getSpacesBeforeLetter($value)
    {
        return str_repeat(' ', $this->maxLetter - $value);
    }

    protected function getSpacesBetweenLetters($value)
    {
        $spaces = ($value - ord('B')) * 2 + 1;
        return str_repeat(' ', $spaces);
    }

}

