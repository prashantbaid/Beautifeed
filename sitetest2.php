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
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" /> 
    <title>Beautifeed</title> 

         <link href="common.css" rel="stylesheet" media="screen" /> 
         <!-- <link href="presentation.css" rel="stylesheet" media="screen" />  -->
        <!-- <link href="http://fonts.googleapis.com/css?family=Droid+Sans|Droid+Sans+Mono" rel="stylesheet" type="text/css" /> -->
        <!-- <link href="default.css" rel="stylesheet" class="theme"  /> -->
        <link href="moon2.css" rel="stylesheet" class="theme" /> 
        <!-- <link id="prettify-link" href="prettify.css" rel="stylesheet" disabled /> -->
        

  </head>
  <body>
    <div class="presentation"> 
    <div class="slides">  
      <div id="presentation-counter">Loading...</div> 
      
        <div class="slide" id="landing-slide"> 
          <section class="middle"> 
           <center> <img src="images/logob.png">
       <a href="#" onclick="this.prev();"><h1>Press <span class="key">&larr;</span> to initialize</h1></a>
            <p>Click here, Press <span class="key" id= "left-init-key">&rarr;</span> key to advance.</p> 
      <p>Click the left arrow key first and then the right arrow key. <br/> (This is apparently a bug I am trying to work on it.)</p>
      <br/><br/></br>
      <p>Press 3 to zoom out</center></p>
          </section> 
        </div> 
        
        
      <ul id="feeder">
      <?php     $i=0;       foreach($feed->query->results->item as $item) {

               
            ?>
      <div class="slide" id="news-item<?php echo $i ?>"> 
          <section class="middle"> 
              <li><h2>
           
                 <?php echo $item->title; ?></br>
              </h2>
             
  <?php echo $item->description; ?> </br></br></br></li>
  </section> 
        </div> 
  <?php 
   $i++;} ?>
  </ul>
          
 
  </div> <!-- slides --> 
 </div>
  <script src="utils.js"></script>

<!--<script src="prettify.js" onload="prettyPrint();" defer></script> --> 
    <!--[if lt IE 9]>
    <script 
      src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js">
    </script>
    <script>CFInstall.check({ mode: "overlay" });</script>
    <![endif]--> 
    
  </body> 
</html>