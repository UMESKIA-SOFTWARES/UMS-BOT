<?php

use BotMan\BotMan\Messages\Conversations\Conversation;

class OnboardingConversation extends Conversation
{



  public function customerCareMessage()
  {
    $this->ask('Please Choose service you want me to help you with. 1. Wifi 2. Airtime 3. Bulk Sms 4. Others', function ($answer) {
      $optionSelected = $answer->getText();
      if ($optionSelected == '1') {
        $this->ask('Enter phone number buy airtime for', function ($answer) {
          $this->phoneNumber = $answer->getText();

          //MAKE VARIABLES $phonenumber A GLOBAL VARIABLE
          $this->ask('Enter the amount you want to buy', function ($answer) {
            $amount = $answer->getText();
            $phoneNumber = $this->phoneNumber;
            //GET VARIBALE $phonenumber
            //MAKE API CALL TO BUY AIRTIME
            //RETURN SUCCESS MESSAGE
            $this->say('You have successfully bought airtime for ' . $phoneNumber . ' of ' . $amount);
          });
        });
        //CALL THE NEXT STEP FUNCTION

      } else if ($optionSelected == '2') {
        $message = 'This is the first line of the message.                     ' . "\n";
        $message .= 'This is the second line of the message.';
        $this->say($message);
      } else if ($optionSelected == '3') {
        $this->say('You selected option 3');
      } else {
        $this->say('You selected an invalid option');
      }
    });
  }


  public function run()
  {
    $this->customerCareMessage();
  }
}

//CREATE A GLOBLA VARIABLE NAME PHONE CALL