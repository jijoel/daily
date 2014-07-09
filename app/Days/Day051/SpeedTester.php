<?php namespace Days\Day051;

use ReflectionMethod;
use Days\Support\DataTransferObject;


class SpeedTester
{
    public function get()
    {
        return [
            $this->testFunctionSpeeds(),
            $this->testStringSpeeds(),
        ];
    }

    public function testFunctionSpeeds()
    {
        $result = $this->wrap([
            ['Without function','testSpeedWithoutFunction',[1000,100000,1000000]],
            ['With function',   'testSpeedWithFunction',   [1000,100000,1000000]],
        ]);

        $code = $this->export('testSpeedWithoutFunction')
            . $this->export('testSpeedWithFunction')
            . $this->export('getJ');

        return new DataTransferObject([
            'title' => 'Speed of function vs non-function',
            'result' => $result,
            'code' => $code,
        ]);
    }

    private function testSpeedWithoutFunction($iterations)
    {
        for($i=0; $i<$iterations; $i++)
            $j = $i - 1;        
    }

    private function testSpeedWithFunction($iterations)
    {
        for($i=0; $i<$iterations; $i++)
            $j = $this->getJ($i);
    }

    private function getJ($i)
    {
        return $i - 1;
    }


    public function testStringSpeeds()
    {
        $result = $this->wrap([
            ['Single quote','testStringSingleQuote',[1000,10000,100000,1000000]],
            ['Double quote','testStringDoubleQuote',[1000,10000,100000,1000000]],
            ['Join'        ,'testStringJoin',       [1000,10000,100000]],
        ]);

        $code = $this->export('testStringSingleQuote')
            . $this->export('testStringDoubleQuote')
            . $this->export('testStringJoin');

        return new DataTransferObject([
            'title' => 'Speed of string concatenation methods',
            'result' => $result,
            'code' => $code,
        ]);
    }

    private function testStringSingleQuote($iterations)
    {
        $text = '';
        for ($i=1; $i<$iterations; $i++)
            $text .= 'test ' . $i;
    }

    private function testStringDoubleQuote($iterations)
    {
        $text = "";
        for ($i=1; $i<$iterations; $i++)
            $text .= "test $i";
    }

    private function testStringJoin($iterations)
    {
        $arr = array();
        for ($i=1; $i<$iterations; $i++)
            $arr[] = 'test '.$i;

        $text = join($arr);
    }


// Helper Methods --------------------------------------------------------------

    private function export($methodName)
    {
        $method = new ReflectionMethod(get_class($this), $methodName);
        $filename = $method->getFileName();
        $start_line = $method->getStartLine()-2;
        $end_line = $method->getEndLine();
        $length = $end_line - $start_line;

        $source = file($filename);
        return implode("", array_slice($source, $start_line, $length));
    }

    private function wrap(array $items)
    {
        $output = '<table><thead><tr><td></td>';
        foreach($items[0][2] as $iterations)
            $output .= '<td>'.$iterations.'</td>';
        $output .= '</tr></thead><tbody>';

        foreach($items as $item) {
            $output .= '<tr><td>'.$item[0].'</td>';
            foreach($item[2] as $iterations)
                $output .= '<td>'.$this->runMethod($item[1],$iterations).'</td>';
            $output .= '</tr>';
        }
        return $output . '</tbody></table>';
    }

    private function runMethod($method,$iterations)
    {
        $start = microtime(true);
        $this->$method($iterations);
        $end   = microtime(true);
        return number_format($end - $start,4) . ' sec';
    }
    
}
