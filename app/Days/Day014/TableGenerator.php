<?php namespace Days\Day014;


class TableGenerator
{
    protected $valuesToMutate = array(
        'one_test_item',
        'one-test-item',
        'OneTestItem',
        'One Test Item',
        'I ❤ you',
        'person',
        'people',
    );

    protected $mutations = array(
        'ascii',
        'camel',
        'lower',
        'plural',
        'singular',
        'snake',
        'studly',
        'title',
        'upper',
        'slug',
        'length',
    );

    protected $stringMutator;

    public function __construct($stringMutator)
    {
        $this->stringMutator = $stringMutator;
    }

    public function generateTable($custom=Null)
    {
        $this->insertCustomValue($custom);

        return $this->generateHeader()
             . $this->generateBody()
             . $this->generateFooter();
    }

    public function insertCustomValue($custom)
    {
        if($custom)
            array_unshift($this->valuesToMutate, $custom);
    }

    public function generateHeader()
    {
        return '<table><tr><thead><th></th>'
             . $this->getHeaderCells()
             . '</thead></tr>';
    }

    protected function getHeaderCells()
    {
        $result = '';
        foreach($this->valuesToMutate as $value) {
            $result .= "<th>$value</th>";
        }
        return $result;
    }

    public function generateBody()
    {
        $output = '';
        foreach($this->mutations as $method) {
            $output .= '<tr>' . $this->generateCells($method) . '</tr>';
        }
        return $output;
    }

    protected function generateCells($method)
    {
        $output = "<td>$method</td>";
        foreach($this->valuesToMutate as $value) {
            $output .= '<td>' . $this->stringMutator->$method($value) . '</td>';
        }
        return $output;
    }

    public function generateFooter()
    {
        return '</table>';
    }

}
