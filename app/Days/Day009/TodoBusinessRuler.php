<?php namespace Days\Day009;

use Days\Day009\DomainException;
use Days\Day009\TodoRepositoryInterface;

/**
 * Sets business rules for todos:
 *
 *   * Do not show todos starting with the letter 'B'
 *     or ending with the letter 's'
 *   * Only keep new todos starting with phrase 'Simon Says'
 *     (remove 'Simon Says' from text before storing)
 *   * Do not keep todos that include the word "psych!"
 *   * Do not delete todos that include the characters "!!!"
 */
class TodoBusinessRuler
{
    protected $repo;

    public function __construct(TodoRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function filteredItems()
    {
        return $this->repo->items()
            ->notStartingWith('B')
            ->notEndingWith('s');
    }

    /**
     * Store a new record
     */
    public function store($attrs)
    {
        if (! $this->simonSays($attrs)) {
            throw new DomainException('Simon didn\'t say!');
        }
        $this->removeSimonSays($attrs);

        if ( $this->contains($attrs, 'psych!')) {
            throw new DomainException('Ha! I tricked you!');
        }

        return $this->repo->create($attrs);
    }

    public function find($id)
    {
        return $this->repo->findId($id);
    }

    public function update($id, $attrs)
    {
        if (empty($attrs)) {
            throw new DomainException('You have to enter something');
        }
        if ( $this->contains($attrs, 'psych!')) {
            throw new DomainException('Ha! I tricked you!');
        }

        return $this->repo->update($id, $attrs);
    }

    public function delete($id)
    {
        $model = $this->find($id);

        if ( $this->contains($model->item, '!!!')) {
            throw new DomainException('What? This is important!!!');
        }

        $this->repo->delete($id);
    }

// Helpers -----------------------------------------

    protected function simonSays(array $input)
    {
        foreach($input as $item) {
            if (strpos($item, 'Simon Says')===0) {
                return True;
            }
        }
    }

    protected function removeSimonSays(array &$input)
    {
        foreach($input as $key=>$value) {
            if (strpos($value, 'Simon Says')===0) {
                $input[$key] = trim(substr($value, 10));
            }
        }
    }

    protected function contains($input, $string)
    {
        if (! is_array($input)) {
            $input = array($input);
        }

        foreach($input as $item) {
            if (strpos($item, $string)!==False) {
                return True;
            }
        }
    }
}

