<?php

use Latte\Runtime as LR;

/** source: /mnt/d/myProjects/_projects/_landing-pages/lp-php-latte/src/views/template/main.latte */
final class Template_e5051a784d extends Latte\Runtime\Template
{
	public const Source = '/mnt/d/myProjects/_projects/_landing-pages/lp-php-latte/src/views/template/main.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 6 */;
		echo '</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

    <main>
';
		$this->renderBlock('content', get_defined_vars()) /* line 12 */;
		echo '    </main>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="/assets/js/main.js"></script>
</body>
</html>';
	}


	/** {block title} on line 6 */
	public function blockTitle(array $ʟ_args): void
	{
	}


	/** {block content} on line 12 */
	public function blockContent(array $ʟ_args): void
	{
	}
}
