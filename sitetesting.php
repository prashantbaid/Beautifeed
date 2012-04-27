<!DOCTYPE html> 
<!--
  Copyright 2010 Google Inc.
 
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at
 
     http://www.apache.org/licenses/LICENSE-2.0
 
  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
 
  Original slides: Marcin Wichary (mwichary@google.com)
  Modifications: Chrome Developer Relations <chrome-devrel@googlegroups.com>
--> 

<?php
include('simple_html_dom.php');
$html = file_get_html($_POST['url']);
foreach($html->find('link') as $element) {
if ($element->rel=="alternate")
	if($element->type=="application/rss+xml")
		break;
		else echo "Feeds not available";
}
echo "$element->href";
echo "</br>";
/*$cache = dirname(__FILE__) . "/cache/feed";

if(filemtime($cache) < (time() - 10800))
{
 
   if ( !file_exists(dirname(__FILE__) . '/cache') ) {
      mkdir(dirname(__FILE__) . '/cache', 0777);
   }
 




  if ( is_object($feed) && $feed->query->count ) {
      $cachefile = fopen($cache, 'wb');
      fwrite($cachefile, $feed);
      fclose($cachefile);
   }
}
else
{
   $feed = file_get_contents($cache);
}
*/
   $path = "http://query.yahooapis.com/v1/public/yql?q=";
   $path .= urlencode("SELECT * FROM feed WHERE url='http://fulltextrssfeed.com/"."$element->href"."'");
   $path .= "&format=json";
    $feed = file_get_contents($path, true);
$feed = json_decode($feed);

?>

<html>
  <head>
    <title>Presentation</title>

    <meta charset='utf-8'>
    <script
      src='http://html5slides.googlecode.com/svn/trunk/slides.js'></script>
  </head>
  
  <style>
   ::-webkit-scrollbar {
    width: 8px;
    height: 6px;
}

::-webkit-scrollbar-button:start:decrement,
::-webkit-scrollbar-button:end:increment {
    display: block;
    height: 10px;
}

::-webkit-scrollbar-button:vertical:increment {
    background-color: #fff;
}

::-webkit-scrollbar-track-piece {
  //  background-color: #eee;
    -webkit-border-radius: 3px;
}

::-webkit-scrollbar-thumb:vertical {
    height: 50px;
    background-color: #ccc;
    -webkit-border-radius: 3px;
}

::-webkit-scrollbar-thumb:horizontal {
    width: 50px;
    background-color: #ccc;
    -webkit-border-radius: 3px;
}

 html {
  overflow: auto;
  background-color: #fff;
  -webkit-font-smoothing: antialiased;
}
   
    
  </style>

  <body style='display: none'>

    <section class='slides layout-regular template-default'>
      
      <!-- Your slides (<article>s) go here. Delete or comment out the
           slides below. -->
        
        
      
      <article class='biglogo'>
      </article>
      <?php            foreach($feed->query->results->item as $item) {
               
            ?>
      <article>
                  
           
                 <?php echo $item->title; ?></br>
            
             
  <?php echo $item->description; ?> </br></br></br></li>
</article>
  <?php } ?>

</section>

  </body>
</html>
