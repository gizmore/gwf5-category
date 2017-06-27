<?php
$gdo = GWF_Category::table();

echo GDO_Tree::make('tree')->gdo($gdo)->renderCell();
