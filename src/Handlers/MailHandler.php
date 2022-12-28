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
        $index = file_get_contents(__DIR__ . "/../../public/index.html");

        $this->response->setContent($index);
    }

    public function send($request) {
        var_dump($request);
        die();
        $response = implode(" ", );
        $this->response->setContent($response);
    }
}