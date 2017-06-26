<?php
final class Category_Add extends GWF_MethodForm
{
	public function createForm(GWF_Form $form)
	{
		$table = GWF_Category::table();
		$form->addField($table->gdoColumn('cat_name'));
		$form->addField(GDO_Category::make('cat_parent'));
	}
}
