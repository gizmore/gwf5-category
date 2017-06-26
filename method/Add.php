<?php
final class Category_Add extends GWF_MethodForm
{
	public function createForm(GWF_Form $form)
	{
		$table = GWF_Category::table();
		$form->addField($table->gdoColumn('cat_name'));
		$form->addField(GDO_Category::make('cat_parent')->emptyChoice('select_parent_category'));
		$form->addField(GDO_AntiCSRF::make());
		$form->addField(GDO_Submit::make());
	}
	
	public function formValidated(GWF_Form $form)
	{
		GWF_Category::blank($form->values())->insert();
		GWF_Category::table()->rebuildFullTree();
		GDOCache::unset('gwf_category');
		return $this->message('msg_category_added')->add(GWF_Website::redirectMessage(href('Category', 'Overview')));
	}
}
