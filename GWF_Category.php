<?php
/**
 * Category table inherits GWF_Tree.
 * 
 * @author gizmore
 * @since 2.0
 * @version 5.0
 */
final class GWF_Category extends GWF_Tree
{
	###########
	### GDO ###
	###########
	public function memCached() { return false; }
	public function gdoTreePrefix() { return 'cat'; }
	public function gdoColumns()
	{
		return array_merge(array(
			GDO_AutoInc::make('cat_id'),
			GDO_Name::make('cat_name'),
		), parent::gdoColumns());
	}

	##############
	### Getter ###
	##############
	public function getName() { return $this->getVar('cat_name'); }
	public function displayName() { return $this->getName(); }
	public function href_edit() { return href('Category', 'Edit', '&id='.$this->getID()); }

	#############
	### Cache ###
	#############
	public function all()
	{
		if (!($cache = GDOCache::get('gwf_category')))
		{
			$cache = self::table()->select('*')->exec()->fetchAllArray2dObject();
			GDOCache::set('gwf_category', $cache);
		}
		return $cache;
	}
	
	##############
	### Render ###
	##############
	public function renderCell()
	{
		return GDO_Category::make('cat')->gdo($this)->renderCell();
	}
	
}
