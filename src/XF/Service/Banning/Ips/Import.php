<?php

namespace XF\Service\Banning\Ips;

use XF\Service\Banning\AbstractIpXmlImport;

class Import extends AbstractIpXmlImport
{
	protected function getMethod()
	{
		return 'banIp';
	}
}