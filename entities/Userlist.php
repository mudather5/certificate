<?php
class Userlist{
      protected $id,
                $email,
                $password;


    public function __construct(array $array)
    {
        $this->hydrate($array);
    }


    public function hydrate(array $array)
	{
		foreach ($array as $key => $value)
		{
			//We retrieve the name of the setter corresponding to the attribute.
			$method = 'set'.ucfirst($key);

			// iof the setter correspondant exist.
			if (method_exists($this, $method))
			{
                $this->$method($value);
				//we call the setter.
                
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
                 * Get the value of email
                 * @return $email
                 */ 
                public function getEmail()
                {
                  return $this->email;
                }

                /**
                 * Get the value of password
                 * @return $password
                 */ 
                public function getPassword()
                {
                  return $this->password;
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
                 * Set the value of email
                 *
                 * @return  $email
                 */ 
                public function setEmail($email)
                {
                  $this->email = $email;

                  return $this;
                }

                /**
                 * Set the value of password
                 *
                 * @return  $password
                 */ 
                public function setPassword($password)
                {
                   $this->password = $password;

                  return $this;
                }

            
}



?>