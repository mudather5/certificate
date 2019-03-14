<?php
class Category{
      protected $id,
                $name,
                $description,
                $ordering,
                $comments;


    public function __construct(array $array)
    {
        $this->hydrate($array);
    }


    public function hydrate(array $array)
	{
		foreach ($array as $key => $value)
		{
			////We retrieve the name of the setter corresponding to the attribute.
			$method = 'set'.ucfirst($key);

			// if the setter correspondant exist.
			if (method_exists($this, $method))
			{
                $this->$method($value);
				// we call the setter.
                
			}
		}
	}
                /**
                 * Get the value of id
                 * @return $id
                 */ 
                public function getId()
                {
                    return $this->id;
                }

                /**
                 * Get the value of firstname
                 * @return $irst_name

                 */ 
                public function getName()
                {
                    return $this->name;
                }

                

                /**
                 * Set the value of id
                 *
                 * @return  $id
                 */ 
                public function setId($id)
                {
                    $this->id = $id;

                    return $this;
                }

                /**
                 * Set the value of firstname
                 *
                 * @return  $first_name
                 */ 
                public function setName($name)
                {
                    $this->name = $name;

                    return $this;
                }

                

                /**
                 * Get the value of description
                 */ 
                public function getDescription()
                {
                    return $this->description;
                }

                /**
                 * Set the value of description
                 *
                 * @return  self
                 */ 
                public function setDescription($description)
                {
                    $this->description = $description;

                    return $this;
                }

                /**
                 * Get the value of ordering
                 */ 
                public function getOrdering()
                {
                    return $this->ordering;
                }

                /**
                 * Set the value of ordering
                 *
                 * @return  self
                 */ 
                public function setOrdering($ordering)
                {
                    $this->ordering = $ordering;

                    return $this;
                }

                /**
                 * Get the value of visibility
                 */ 
    

                /**
                 * Get the value of comments
                 */ 
                public function getComments()
                {
                    return $this->comments;
                }

                /**
                 * Set the value of comments
                 *
                 * @return  self
                 */ 
                public function setComments($comments)
                {
                    $this->comments = $comments;

                    return $this;
                }
}



?>