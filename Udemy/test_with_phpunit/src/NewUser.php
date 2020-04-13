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

    protected $new_mailer_callable;

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

    public function setNewMailerCallable(callable $mailer)
    {
        $this->new_mailer_callable = $mailer;
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

        // return $this->mailer->sendNoStatic($this->email, $message);

        // second solution to create a callable
        // this is equvalemt to static call
        // return call_user_func([NewMailer::class, 'send'], $this->email, $message);
        // after addit callable property we rewrite this method
        // return call_user_func($this->new_mailer_callable, $this->email, $message);

        // third way to use Mockery
        return NewMailer::send($this->email, $message);
    }
}
