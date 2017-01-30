<?php

namespace Craft;

class cc2kcPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('camelCase to kebab-case filter');
	}

	public function getVersion()
	{
		return '1.0';
	}

	public function getDeveloper()
	{
		return 'Pnkt';
	}

	public function getDeveloperUrl()
	{
		return 'http://pnkt.no';
	}

	public function addTwigExtension()
	{
		Craft::import('plugins.cc2kc.twigextensions.cc2kcTwigExtension');

		return new cc2kcTwigExtension();
	}
}
