<?php


class ArticleJSONFormatter implements ArticleFormatter {
   public function formatFull(Article $Article){
      echo 'JSON Here';
      var_dump($Article);
   }
}