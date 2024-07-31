<?php

use Latte\Runtime as LR;

/** source: /mnt/d/myProjects/_projects/_landing-pages/lp-php-latte/src/views/home.latte */
final class Template_f8f8e31c37 extends Latte\Runtime\Template
{
	public const Source = '/mnt/d/myProjects/_projects/_landing-pages/lp-php-latte/src/views/home.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo '

';
		$this->createTemplate('partials/header.latte', $this->params, 'include')->renderToContentType('html') /* line 5 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 7 */;
		echo '

';
		$this->createTemplate('partials/footer.latte', $this->params, 'include')->renderToContentType('html') /* line 18 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = 'template/main.latte';
		return get_defined_vars();
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'My amazing blog';
	}


	/** {block content} on line 7 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="container">
	<h1>Welcome to my awesome homepage.</h1>

';
		$this->createTemplate('contact.latte', $this->params, 'include')->renderToContentType('html') /* line 11 */;
		echo '</div>


';
	}
}
