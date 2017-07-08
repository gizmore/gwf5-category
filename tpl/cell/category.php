<?php $field instanceof GDO_Category; ?>
<?php
if ($category = $field->getCategory())
{
	echo $category->displayName();
}
else
{
	l('no_category');
}
