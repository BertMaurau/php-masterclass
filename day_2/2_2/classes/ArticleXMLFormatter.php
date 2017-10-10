<?php

class ArticleXMLFormatter implements ArticleFormatter {
   public function formatFull(Article $Article){
      echo 'XML Here';
      var_dump($Article);
   }
}