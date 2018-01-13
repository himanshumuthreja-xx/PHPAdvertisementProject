<?php
  function validateRegister(){
   if(isset($_POST["submit"]))
    {
        if(!(isset($_POST["firstname"])) || $_POST["firstname"] == ''){
            echo '<style type="text/css">
                    #firstNameError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }
        
        if(!(isset($_POST["lastname"])) || $_POST["lastname"] == ''){
            echo '<style type="text/css">
                    #lastNameError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }
        
        if(!(isset($_POST["mobilenumber"])) || $_POST["mobilenumber"] == ''){
            echo '<style type="text/css">
                    #mobileError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }
        
        if(!(isset($_POST["emailaddress"])) || $_POST["emailaddress"] == ''){
            echo '<style type="text/css">
                    #emailError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }
        
        if(!(isset($_POST["password"])) || $_POST["password"] == ''){
            echo '<style type="text/css">
                    #passwordError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }
        
        if(!(isset($_POST["confirmpassword"])) || $_POST["confirmpassword"] == ''){
            echo '<style type="text/css">
                    #confirmPasswordBlankError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }elseif($_POST["confirmpassword"] != $_POST["password"]){
            echo '<style type="text/css">
                    #confirmPasswordError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }
        
        return true;
    }
    }

function validateLogin(){
   if(isset($_POST["submit"]))
    {
        if(!(isset($_POST["loginUserName"])) || $_POST["loginUserName"] == ''){
            echo '<style type="text/css">
                    #emailError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }
        
        if(!(isset($_POST["loginPassword"])) || $_POST["loginPassword"] == ''){
            echo '<style type="text/css">
                    #passwordError {
                        display: block;
                        color:red;
                    }
                </style>';
            return false;
        }
       
       return true;
        
    }
    }
?>
