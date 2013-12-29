<?php namespace Days\Day022;


class Factors
{
    private $factors = array();
    private $valueToProcess;

    public function make($fromNumber)
    {
        $this->valueToProcess = $fromNumber;

        if ($this->isSmallPrime())
            return array($fromNumber);

        $this->calculateFactors();

        return $this->factors;
    }

    private function isSmallPrime()
    {
        return $this->valueToProcess >= -2 
            && $this->valueToProcess <=  3;
    }

    private function calculateFactors()
    {
        $this->setFactorForNegativeNumber();
        $this->setFactorsForSmallPrimes();
        $this->setFactorsForLargePrimes();
        $this->setFactorForRemainder();        
    }

    private function setFactorForNegativeNumber()
    {
        if ($this->valueToProcess < 0) {
            $this->valueToProcess = abs($this->valueToProcess);
            $this->factors[] = -1;
        }
    }

    private function setFactorsForSmallPrimes() 
    {
        foreach(array(2,3) as $candidate) {
            $this->setFactorFor($candidate);
        }

        return ($this->valueToProcess == 1);
    }

    private function setFactorsForLargePrimes() 
    {
        $maxNumber = sqrt($this->valueToProcess);

        for($candidate = 5; $candidate <= $maxNumber; $candidate++) {        
            $this->setFactorFor($candidate);
        }
    }

    private function setFactorForRemainder() 
    {
        if ($this->valueToProcess > 1)
            $this->setFactorFor($this->valueToProcess);
    }

    private function setFactorFor($number) 
    {
        while ($this->isEvenlyDivisibleBy($number)) {
            $this->setFactor($number);
        }
    }

    private function isEvenlyDivisibleBy($number)
    {
        return ($this->valueToProcess % $number == 0);
    }

    private function setFactor($prime) 
    {
        $this->valueToProcess = $this->valueToProcess / $prime;
        $this->factors[] = $prime;
    }

}
