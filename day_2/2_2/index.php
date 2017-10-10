<?php

header('HTTP/1.1 200 OK');
header('Content-Type: text/plain; charset=utf-8');

require_once 'interfaces/ArticleFormatter.php';

require_once 'models/Article.php';
require_once 'models/Category.php';
require_once 'models/Author.php';

require_once 'classes/ArticleXMLFormatter.php';
require_once 'classes/ArticleJSONFormatter.php';

$Category = (new Category())
               -> setDescription('Cat Descr');

$Author = (new Author())
               -> setName('Hans');

$Article = (new Article())
               -> setTitle('Title')
               -> setDescription('Description')
               -> setCategory($Category)
               -> setAuthor($Author);

echo $ArticleJSONFormatter = (new ArticleJSONFormatter()) -> formatFull($Article);

