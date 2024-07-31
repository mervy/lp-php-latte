<?php

use Latte\Runtime as LR;

/** source: /mnt/d/myProjects/_projects/_landing-pages/lp-php-latte/src/views/contact.latte */
final class Template_201236e439 extends Latte\Runtime\Template
{
	public const Source = '/mnt/d/myProjects/_projects/_landing-pages/lp-php-latte/src/views/contact.latte';


	public function main(array $ʟ_args): void
	{
		echo '
    <form id="contactForm" action=\'/send\' method="post">
        <div class=\'form-group mb-3\'>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name">
        </div>
         <div class=\'form-group mb-3\'>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <div class=\'form-group mb-3\'>
            <label for="message">Mensagem:</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <button type="submit">Enviar</button>
    </form>
    <div id="formErrors"></div>
    <div id="formSuccess"></div>
    ';
	}
}
