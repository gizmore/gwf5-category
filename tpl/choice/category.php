<?php $field instanceof GDO_Category; ?>
<?php
$category = $field->getCategory();
echo str_repeat('+', $category->getDepth()) . $category->displayName();
