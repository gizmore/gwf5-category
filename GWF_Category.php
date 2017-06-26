<?php
final class GWF_Category extends GWF_Tree
{
	public function gdoTreePrefix() { return 'cat'; }
	public function gdoColumns()
	{
		return array_merge(array(
			GDO_AutoInc::make('cat_id'),
			GDO_Name::make('cat_name'),
		), parent::gdoColumns());
	}
}
