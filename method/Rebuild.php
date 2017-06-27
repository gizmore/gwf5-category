<?php
final class Category_Rebuild extends GWF_MethodForm
{
	public function execute()
	{
		$module = Module_Category::instance();
		return $module->renderAdminTabs()->add(parent::execute())->add($this->renderTree());
	}
	
	public function createForm(GWF_Form $form)
	{
		$form->addFields(array(
			GDO_AntiCSRF::make(),
			GDO_Submit::make(),
		));
	}
	
	public function formValidated(GWF_Form $form)
	{
		GWF_Category::table()->rebuildFullTree();
		return $this->message('msg_cat_tree_rebuilt');
	}
	
	### Tree
	public function renderTree()
	{
		return $this->templatePHP('rebuild.php');
	}
}
