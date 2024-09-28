<?php

namespace App\Mail;

use App\Models\Product; // Ensure you're using the correct namespace for Product
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewServiceAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $product;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param Product $product
     */
    public function __construct($user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_service_added')
                    ->subject('A New Service Has Been Added!')
                    ->with([
                        'user' => $this->user,
                        'product' => $this->product,
                    ]);
    }
}
