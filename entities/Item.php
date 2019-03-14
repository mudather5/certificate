<?php
class Item{
      protected $id,
                $name,
                $description,
                $price,
                $country,
                $status,
                $image,
                $cat_id,
                $member_id;
                


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
         * Get the value of country
         */ 
        public function getCountry()
        {
            return $this->country;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */ 
        public function setCountry($country)
        {
            $this->country = $country;

            return $this;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
            $this->status = $status;

            return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
            $this->price = $price;

            return $this;
        }

                

            
               

                /**
                 * Get the value of cat_id
                 */ 
                public function getCat_id()
                {
                    return $this->cat_id;
                }

                /**
                 * Set the value of cat_id
                 *
                 * @return  self
                 */ 
                public function setCat_id($cat_id)
                {
                    $this->cat_id = $cat_id;

                    return $this;
                }

                /**
                 * Get the value of member_id
                 */ 
                public function getMember_id()
                {
                    return $this->member_id;
                }

                /**
                 * Set the value of member_id
                 *
                 * @return  self
                 */ 
                public function setMember_id($member_id)
                {
                    $this->member_id = $member_id;

                    return $this;
                }

                /**
                 * Get the value of image
                 */ 
                public function getImage()
                {
                    return $this->image;
                }

                /**
                 * Set the value of image
                 *
                 * @return  self
                 */ 
                public function setImage($image)
                {
                    $this->image = $image;

                    return $this;
                }
                
                public function uploadfile($image){
                    if(move_uploaded_file($image, ('../assets/img/'))){
                        return true;
                    }
                }
}



?>