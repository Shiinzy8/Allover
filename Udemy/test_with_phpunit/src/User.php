<?php

/**
 * User
 *
 * A user of the system
 */
class User
{

    /**
     * First name
     * @var string
     */
    public $first_name;
    
    /**
     * Last name
     * @var string
     */
    public $surname;

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * @var Mailer
     */
    public $mailer;

    /**
     * Set mailerr object
     * @param Mailer $mailer 
     */
    public function setMailer(Mailer $mailer) 
    {
        $this->mailer = $mailer;
    }

    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    /**
     * Send the user a message
     * 
     * @param string $message The mmessage
     * 
     * @return boolean True if sent, false otherwise
     */
    public function notify($message) 
    {
        // $mailer = new Mailer();

        // $result = $mailer->sendMessage($this->email, $message);
        
        // return $result;

        // When we add $mailer as an property
        return $this->mailer->sendMessage($this->email, $message);
    }
}
