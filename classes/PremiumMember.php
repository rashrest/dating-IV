<?php
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    public function __construct($fname, $lname, $age, $gender, $phone, $_member = true, $_inDoorInterests="", $_outDoorInterests="")
    {
        parent::__construct($fname, $lname, $age, $gender, $phone);
        $this->_inDoorInterests = $_inDoorInterests;
        $this->_outDoorInterests = $_outDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getInDoorInterests():array
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param mixed $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests): void
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutDoorInterests(): array
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param mixed $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests): void
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}