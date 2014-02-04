<?php namespace Days\Day031;


class OptGroupSplitter
{
    public static function split($input = array(), $value=Null, $key=Null, $groupKey=Null)
    {
        if (! $value)
            return $input;

        $results = array();

        foreach($input as $item) {
            if ($groupKey) {
                $results[$item[$groupKey]][$item[$key]] = $item[$value];
            } elseif ($key) {
                $results[$item[$key]] = $item[$value];
            } else {
                $results[] = $item[$value];
            }
        }
        return $results;
    }
}
