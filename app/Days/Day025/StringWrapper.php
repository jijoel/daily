<?php namespace Days\Day025;


class StringWrapper
{
    public function wrap($text, $length=80)
    {
        if (strlen($text) > $length) {
            $break = strrpos(substr($text, 0, $length+1), ' ') ?: $length;
            return trim(substr($text,0,$break))
                . '\n' . $this->wrap(trim(substr($text,$break)), $length) ;
        }

        if ($text)
            return $text;

        return '';
    }
}

