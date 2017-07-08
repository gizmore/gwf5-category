<?php $field instanceof GDO_Category; ?>
<?php
$category = $field->gdo; //getCategory();
echo str_repeat('+', $category->getDepth()) . $category->displayName();

