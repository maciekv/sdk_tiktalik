<?php 

class TiktalikFiles extends AmazonS3
{
	const REGION_US_E1 = 'sds.tiktalik.com';

	const REGION_PL_E1 = 'sds.tiktalik.com';

	public function __construct(array $options = array())
	{
		parent::__construct($options);
		$this->use_ssl = false;
		$this->hostname = self::DEFAULT_URL;
	}

}

