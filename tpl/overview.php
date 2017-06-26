<?php
$gdo = GWF_Category::table();
$module = Module_Category::instance();
echo $module->renderAdminTabs(); 

# Render table with this query
$query = $gdo->select('*');
$table = GDO_Table::make();
$table->addFields(array(
	$gdo->gdoColumn('cat_id'),
	$gdo->gdoColumn('cat_name'),
	GDO_Button::make('edit'),
));
$table->query($query);
$table->paginate(true, 50);
echo $table->render();
