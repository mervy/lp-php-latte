<?php

namespace LPWithLatte\library;

use Exception;

class SendEmail
{
    public function __construct(
        private $to,
        private $subject,
        private $message,
        private $headers
    ) {
    }

    public function send()
    {
        if (!mail($this->to, $this->subject, $this->message, $this->headers)) {
            throw new Exception("Falha ao enviar o e-mail");
        }
    }
}