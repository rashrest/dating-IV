<?php
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    public function __construct($fname, $lname, $age, $gender, $phone, $premMember = true, $_inDoorInterests="", $_outDoorInterests="")
    {
        parent::__construct($fname, $lname, $age, $gender, $phone,$premMember );
        $this->_inDoorInterests = $_inDoorInterests;
        $this->_outDoorInterests = $_outDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param mixed $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param mixed $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}