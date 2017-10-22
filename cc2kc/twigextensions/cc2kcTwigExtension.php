<?php
namespace Craft;

class cc2kcTwigExtension extends \Twig_Extension
{
	protected $env;

	public function getName()
	{
		return 'camelCase to kebab-case';
	}

	public function getFilters()
	{
		return array('cc2kc' => new \Twig_Filter_Method($this, 'cc2kc'));
	}

	public function getFunctions()
	{
		return array('cc2kc' => new \Twig_Function_Method($this, 'cc2kc'));
	}

	public function initRuntime(\Twig_Environment $env)
	{
		$this->env = $env;
	}

	public function cc2kc($var)
	{
		if (is_string($var) && strlen($var))
		{
			$var = preg_replace_callback('/(^|[a-z])([A-Z])/', function($matches) {
				return strtolower(strlen("\\1") ? "$matches[1]-$matches[2]" : "\\2");
			},
			$var);
		}

		return $var;
	}
}
