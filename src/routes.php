<?php
//route docs
Route::get('docs/'.'{chapter?}', 'Yusidabcs\Doc\DocumentationController@showDocs');