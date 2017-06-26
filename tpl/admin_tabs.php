<?php
$bar = GDO_Bar::make('tabs');
$bar->addFields(array(
	GDO_Link::make('add')->href(href('Category', 'Add')),
));
echo $bar->render();
