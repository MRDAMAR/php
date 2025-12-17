<?php
require_once __DIR__ . '/../models/MyModel.php';

$model = new MyModel();
$data = $model->getAll();

require_once __DIR__ . '/../views/index.php';
