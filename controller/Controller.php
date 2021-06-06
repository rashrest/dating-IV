<?php
class Controller
{
    private $_f3;

    public function __construct($f3){
        $this->_f3 = $f3;
    }

    function home()

    {


        //Display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function personal()
    {
        //Reinitialize session array
        $_SESSION = array();

        //var_dump($_POST);

        //If the form has been submitted, add the data to session
        //and send the user to the summary page
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //data validation
            if(validName($_POST['name'])){
                $_SESSION['name']=$_POST['name'];
            }

            else{
                $this->_f3-> set('errors["name"]', 'Please enter a valid first name.');
            }

            if(validName($_POST['lname'])){
                $_SESSION['lname']=$_POST['lname'];
            }

            else {
                $this->_f3-> set('errors["lname"]', 'Please enter a valid last name.');
            }



            if(validAge($_POST['age'])){
                $_SESSION['age']=$_POST['age'];
            }
            else if(!validAge($_POST['age'])){
                $this->_f3-> set('errors["agee"]', 'Age should be number and between 18 to 118');
            }

            if(validPhone($_POST['phone'])){
                $_SESSION['phone']=$_POST['phone'];
            }
            else if(!validPhone($_POST['phone'])) {
                $this->_f3-> set('errors["phone"]', 'Phone value should be numeric and at least 10 digits');
            }

            if (empty($_POST["gender"]))
            {
                $this->_f3->set('errors["gender"]', 'Gender is required');
            }
            else {
                $_SESSION['gender'] = $_POST['gender'];

            }


            $_SESSION['premium']=$_POST['premium'];

            if(empty($this->_f3->get('errors'))){
                header('location: Profile');
            }


        }

        $this->_f3->set('names',$_POST['name']);
        $this->_f3->set('lnames',$_POST['lname']);
        $this->_f3->set('ages',$_POST['age']);
        $this->_f3->set('genders',$_POST['gender']);
        $this->_f3->set('phones',$_POST['phone']);
//        $this->_f3->set('premiums',$_POST['premium']);

        if($_POST['premium']=="iamchecked"){
            $member = new PremiumMember($_POST['name'], $_POST['lname'], $_POST['age'], $_POST['gender'], $_POST['phone'], true);
            $_SESSION['$member'] = serialize($member);
        }
        else{
            $member = new Member($_POST['name'], $_POST['lname'], $_POST['age'], $_POST['gender'], $_POST['phone'], false);
            $_SESSION['$member'] =serialize($member);
        }


        //Display the personal information form
        $view = new Template();
        echo $view-> render('views/personalForm.html');

    }

    function profile(){


        $member = unserialize($_SESSION['$member']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //data validation
            if(validEmail($_POST['email'])){
                $_SESSION['email'] = $_POST['email'];
            }

            else{
                $this->_f3-> set('errors["email"]', 'Please provide a valid email address.');
            }

            $_SESSION['state'] = $_POST['state'];
            $_SESSION['seek'] = $_POST['seek'];
            $_SESSION['bio'] = $_POST['bio'];


            if(empty($this->_f3->get('errors'))) {

                $member->setEmail($_POST['email']);
                $member->setState($_POST['state']);
                $member->setSeeking($_POST['seek']);
                $member->setBio($_POST['bio']);


                $_SESSION['$member'] = serialize($member);
                if ($member->ispremMember()) {
                    $this->_f3->reroute('/Interest');
                } else if (!($member->ispremMember())) {
                    $this->_f3->reroute('/Summary');
                }
            }

        }

        $this->_f3->set('emails',$_POST['email']);

        //Display the personal information form
        $view = new Template();
        echo $view-> render('views/profile.html');
    }

    function interest(){


        $member = unserialize($_SESSION['$member']);
        $member->setMember(true);
        $indoorChoice=array();
        $outdoorChoice=array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            //check to see the options are valid
            if(isset($_POST['indoorInterests'])){
                $indoorChoice=$_POST['indoorInterests'];

                //if choices are valid
                if(validIndoor($indoorChoice)){
                    $indoorArray = implode(", ",$_POST['indoorInterests']);
                    $member->setInDoorInterests($indoorArray);
                }
            }

            if(isset($_POST['outdoorInterests'])){
                $outdoorChoice=$_POST['outdoorInterests'];

                //if choices are valid
                if(validIndoor($outdoorChoice)){
                   $outdoorArray = implode(", ",$_POST['outdoorInterests']);
                    $member->setOutDoorInterests($outdoorArray);
                }
            }
            $_SESSION['$member'] = serialize($member);
            header('location: Summary');
        }



        //Display the personal information form
        $view = new Template();
        echo $view-> render('views/interests.html');
    }

    function summary(){
//        Display the personal information form
        $member = unserialize($_SESSION['$member']);


        $this->_f3->set('fName', $member->getFname());
        $this->_f3->set('lName', $member->getLname());
        $this->_f3->set('age' , $member->getAge());
        $this->_f3->set('gender', $member->getGender());
        $this->_f3->set('phone', $member->getPhone());
        $this->_f3->set('email', $member->getEmail());
        $this->_f3->set('state', $member->getState());
        $this->_f3->set('seeking', $member->getSeeking());
        $this->_f3->set('bio', $member->getBio());


        if ($member->ispremMember()===true){
            $this->_f3->set('inDoorInterests', array($member->getInDoorInterests()));
            $this->_f3->set('outDoorInterests', array($member->getOutDoorInterests()));
        }


        $view = new Template();
        echo $view-> render('views/summary.html');
    }

}