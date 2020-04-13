<?php

/**
 * NewUser
 *
 * An example user class
 */
class NewUser
{
    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * NewMailer object
     * @var NewMailer
     */
    protected $mailer;

    /**
     * Constructor
     *
     * @param string $email The user's email
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * Mailer setter
     *
     * @param NewMailer $mailer A Mailer object
     *
     * @return void
     */
    public function setMailer(NewMailer $mailer) 
    {
        $this->mailer = $mailer;        
    }
    
    // bad practic to test this
    // first varian is to change of send method
    // simply remove static
    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean
     */
    public function notify(string $message)
    {
        // return $this->mailer::send($this->email, $message);

        return $this->mailer->sendNoStatic($this->email, $message);
    }
}
