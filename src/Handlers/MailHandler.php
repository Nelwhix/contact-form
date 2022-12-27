<?php declare(strict_types = 1);

namespace Nelwhix\ContactForm\Handlers;

use Http\Request;
use Http\Response;

class MailHandler
{
    public function __construct(private Request $request,  private Response $response)
    {
    }

    public function index() {
        $this->response->setContent("Hola amigos");
    }
}