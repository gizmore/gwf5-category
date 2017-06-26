<?php
/**
 * A selection for a GWF_Category object.
 * @author gizmore
 * @see GWF_Category
 */
final class GDO_Category extends GDO_Select
{
	use GDO_ObjectTrait;
	
	public function defaultLabel() { return $this->label('category'); }
	
	public function __construct()
	{
		$this->table(GWF_Category::table());
	}
	
	/**
	 * @return GWF_Category
	 */
	public function getCategory()
	{
		return $this->gdo;
	}
	
	public function withCompletion()
	{
	 	$this->completion(href('Category', 'Completion'));
	}
	
	public function renderCell()
	{
		return GWF_Template::modulePHP('Category', 'cell/category.php', ['field'=>$this]);
	}
	
	public function render()
	{
		if ($this->completionURL)
		{
			return GWF_Template::mainPHP('form/object_completion.php', ['field'=>$this]);
		}
		else
		{
			$this->choices($this->categoryChoices());
			return GWF_Template::mainPHP('form/select.php', ['field'=>$this]);
		}
	}
	
	public function validate($value)
	{
		$this->choices($this->categoryChoices());
		return parent::validate($value);
	}
	
	public function categoryChoices()
	{
		return GWF_Category::all();
	}
	
}
