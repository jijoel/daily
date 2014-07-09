<?php namespace Days\Support;

use ArrayAccess;
use Illuminate\Support\Contracts\JsonableInterface;
use Illuminate\Support\Contracts\ArrayableInterface;


class DataTransferObject 
implements ArrayAccess, ArrayableInterface, JsonableInterface
{
    protected $data = array();
    protected $default = '';

    public function __construct($data = array())
    {
        if (is_array($data))
            $this->data = $data;

        if (is_object($data))
            $this->data = (array) $data;
    }

    public function __get($value)
    {
        if (isset($this->data[$value]))
            return $this->data[$value];

        return $this->default;
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __toString()
    {
        return $this->toJson();
    }

    public function toArray()
    {
        return $this->data;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    public function offsetSet($offset, $value) 
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetExists($offset) 
    {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset) 
    {
        unset($this->data[$offset]);
    }

    public function offsetGet($offset) 
    {
        return $this->__get($offset);
    }

}
