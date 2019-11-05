<?php

namespace Container;

class Container extends  AbstractContainer implements  \ArrayAccess{

    public function offsetExists($offset)
    {
        return $this->has($offset);
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
        // TODO: Implement offsetGet() method.
    }
    public function offsetUnset($offset)
    {
        unset($this->resolvedEntries[$offset]);
        unset($this->definitions[$offset]);
        // TODO: Implement offsetUnset() method.
    }
    public function offsetSet($offset, $value)
    {
        return $this->injection($offset,$value);
        // TODO: Implement offsetSet() method.
    }
}

