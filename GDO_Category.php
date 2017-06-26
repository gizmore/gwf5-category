<?php
final class GDO_Category extends GDO_Select
{
	use GDO_ObjectTrait;
	
	public function defaultLabel() { return $this->label('category'); }
	
	public function __construct()
	{
		$this->table(GWF_Category::table());
		$this->completion(href('Category', 'Completion'));
	}
	
}
