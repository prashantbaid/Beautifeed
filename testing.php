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

?>
<html> 
  <head> 
    <meta charset="utf-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" /> 
    <title>Beautifeed</title> 
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans|Droid+Sans+Mono" rel="stylesheet" type="text/css" /> 
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
    background-color: #eee;
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


      body {
  font: 14px Verdana, sans-serif;
  padding: 0;
  margin: 0;
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0px; top: 0px;
  -webkit-font-smoothing: antialiased;
  	overflow-y: scroll;
	overflow-x: hidden;
      }
      
      .presentation {
        position: absolute;
        height: 100%;
        width: 100%;
        left: 0px;
        top: 0px;
        display: block;
        overflow: hidden;
  background: #000;
  background: -webkit-gradient(linear, left top, left bottom, from(#444), to(black));
  background: -moz-linear-gradient(top, #444, black);
      }
      
      .slides {
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        position: absolute;
        display: block;
        -webkit-transition: -webkit-transform 1.5s ease-in-out;
        -moz-transition: -moz-transform 1.5s ease-in-out;
        -o-transition: -o-transform 1.5s ease-in-out;
        transition: transform 1.5s ease-in-out;
      }
      img {     display: block;
    margin-left: auto;
    margin-right: auto ;
border: 1px solid #DBD5D0 !important; ; padding: 7px ;	}
	
      .slide {
  display: none;
  position: absolute;
  width: 900px;
  height: 700px;
  left: 50%;
  top: 50%;
  overflow: auto !important;
   	overflow-y: scroll;
	overflow-x: hidden;
  margin-top: -350px;
  margin-right: 20px;
  margin-left: 20px;
  background-color: #eee;
  border-radius: 8px;
  -moz-border-radius: 8px;
  opacity: 0.35;

  -webkit-transform: scale(0.8) translateZ(0);
  -moz-transform: scale(0.8);
  -o-transform: scale(0.8);

  -webkit-transition-property: margin, -webkit-transform, opacity;
  -webkit-transition-duration: 0.3s, 0.3s, 0.3s;
  -webkit-transition-timing-function: ease-in-out;

  -moz-transition-property: margin, -moz-transform, opacity;
  -moz-transition-duration: 0.3s, 0.3s, 0.3s;
  -moz-transition-timing-function: ease-in-out;

  -o-transition-property: margin, -moz-transform, opacity;
  -o-transition-duration: 0.3s, 0.3s, 0.3s;
  -o-transition-timing-function: ease-in-out;

  /* NOTE(slightlyoff): simpler animations for slower boxes */
  /*
  -webkit-transition: margin 0.3s ease-in-out;
  -moz-transition: margin 0.3s ease-in-out;
  -o-transition: margin 0.3s ease-in-out;
  */
      }
.slide p, .slide textarea {
  font-size: 16px;
}

.slide .counter {
  color: #999999;
  position: absolute;
  left: 20px;
  bottom: 20px;
  display: block;
  font-size: 12px;
}

 
      .slide.title > .counter,
      .slide.segue > .counter,
      .slide.mainTitle > .counter {
        display: none;
      }
 
      .force-render {
        display: block;
        visibility: hidden;
      }
      
      .slide.far-past {
        display: block;
        margin-left: -2400px;
      }
      
      .slide.past {
        visibility: visible;
        display: block;
        margin-left: -1400px;
      }
      
      .slide.current {
        visibility: visible;
        display: block;
        margin-left: -450px;
		  -webkit-transform: scale(1.0);
  -moz-transform: scale(1.0);
  -o-transform: scale(1.0);
  opacity: 1.0;
      }
      
      .slide.future {
        visibility: visible;
        display: block;
        margin-left: 500px;
      }
      
      .slide.far-future {
        display: block;
        margin-left: 1500px;
      }
      
      body.three-d div.slides {
        -webkit-transform: translateX(50px) scale(0.8) rotateY(10deg);
        -moz-transform: translateX(50px) scale(0.8) rotateY(10deg);
        -o-transform: translateX(50px) scale(0.8) rotateY(10deg);
        transform: translateX(50px) scale(0.8) rotateY(10deg);
      }
      
      /* Content */
      
      @font-face { font-family: 'Junction'; src: url(src/Junction02.otf); }
      @font-face { font-family: 'LeagueGothic'; src: url(src/LeagueGothic.otf); }
      
      header {
        font: 18px Verdana, sans-serif;
        letter-spacing: -.05em;
		font-weight: normal;
        text-shadow: rgba(0, 0, 0, 0.2) 0 2px 5px;
		position: absolute;
        left: 30px;
        top: 25px;
        margin: 0;
        padding: 0;
      }
      
      h1 {
        font-size: 100%;
        display: inline;
        font-weight: normal;
        padding: 0;
        margin: 0;
      }
      
      h2 {
        font: 14px Verdana, sans-serif;
        color: black;
        font-size: 20px;
        padding: 0;
        margin:15px 0 5px 0;
      }
            
      h2:first-child {
        margin-top: 0;
      }
 
      section, footer {
        font: 14px Verdana, sans-serif;
        color: #3f3f3f;
		padding-right: 20px;
		padding-left: 20px;
        margin: 100px 30px 0;
        display: block;
        overflow: hidden;
      }
      
      footer {
        font-size: 12px;
        margin: 20px 0 0 30px;
      }
 
      a {
        color: inherit;
        display: inline-block;
        text-decoration: none;
        line-height: 110%;
      }
 
      ul {
        margin: 0;
        padding: 0;
      }
 
      button {
        font-size: 20px;
      }
      
      pre button {
        margin: 2px;
      }
      
      section.left {
        float: left;
        width: 390px;
      }
      
      section.small {
        font-size: 24px;
      }
      
      section.small ul {
        margin: 0 0 0 15px;
        padding: 0;
      }
      
      section.small li {
        padding-bottom: 0;
      }
            
      section.middle {
        display: table-cell;
        vertical-align: middle;
        height: 700px;
        width: 900px;
      }
      
      pre {
        text-align: left;
        font-family: 'Droid Sans Mono', Courier;
        font-size: 80%;
        padding: 10px 20px;
        background: rgba(255, 203, 0, 0.05);
        -webkit-border-radius: 8px;
        -khtml-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        border: 1px solid rgba(255, 0, 0, 0.2);
      }
      
      pre select {
        font-family: Monaco, Courier;
        border: 1px solid #c61800;
      }
        
      input {
        font-size: 100%;
        margin-right: 10px;
        font-family: Helvetica;
        padding: 3px;
      }
      input[type="range"] {
        width: 100%;
      }
      
      button {
        margin: 20px 10px 0 0;
        font-family: Verdana;
      }
      
      button.large {
        font-size: 32px;
      }
        
      pre b {
        font-weight: normal;
        color: #c61800;
        text-shadow: #c61800 0 0 1px;
        /*letter-spacing: -1px;*/
      }
      pre em {
        font-weight: normal;
        font-style: normal;
        color: #18a600;
        text-shadow: #18a600 0 0 1px;
      }
      pre input[type="range"] {
        height: 6px;
        cursor: pointer;
        width: auto;
      }
      
      div.example {
        display: block;
        padding: 10px 20px;
        color: black;
        background: rgba(255, 255, 255, 0.4);
        -webkit-border-radius: 8px;
        -khtml-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        margin-bottom: 10px;
        border: 1px solid rgba(0, 0, 0, 0.2);
      }
      
      video {
        -moz-border-radius: 8px;
        -khtml-border-radius: 8px;
        -webkit-border-radius: 8px;
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.2);
      }
      
      .key {
        font: 14px Verdana, sans-serif;
        color: black;
        display: inline-block;
        padding: 6px 10px 3px 10px;
        font-size: 100%;
        line-height: 30px;
        text-shadow: none;
        letter-spacing: 0;
        bottom: 10px;
        position: relative;
        -moz-border-radius: 10px;
        -khtml-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: white;
        box-shadow: rgba(0, 0, 0, 0.1) 0 2px 5px;
        -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0 2px 5px;
        -moz-box-shadow: rgba(0, 0, 0, 0.1) 0 2px 5px;
        -o-box-shadow: rgba(0, 0, 0, 0.1) 0 2px 5px;
      }
      
      .key { font-family: Arial; }
      
      :not(header) > .key {
        margin: 0 5px;
        bottom: 4px;
      }
 
      .two-column {
        -webkit-column-count: 2;
        -moz-column-count: 2;
        column-count: 2;
      }
 
      .stroke {
        -webkit-text-stroke-color: red;
        -webkit-text-stroke-width: 1px;
      } /* currently webkit-only */
      
      .center {
        text-align: center;
      }
      
      #presentation-counter {
        color: #fff;
        font-size: 70%;
        letter-spacing: 1px;
        position: relative;
        top: 40%;
        width: 100%;
        text-align: center;
      }
      
      div:not(.current).reduced {
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -o-transform: scale(0.8);
        transform: scale(0.8);
      } 
      
      .no-transitions {
        -webkit-transition: none;
        -moz-transition: none;
        -o-transition: none;
        transition: none;
      }
 
      .no-gradients {
        background: none;
        background-color: #fff;
      }
      
      ul.bulleted {
        padding-left: 30px;
      }
    </style> 
	</head>
	<body>
    <div class="presentation"> 
      <div id="presentation-counter"></div> 
      <div class="slides"> 
        <div class="slide" id="landing-slide"> 
          <section class="middle"> 
           <center> <img src="images/logob.png">
		   <h2>Untruncated Rss Feeds.</h2> 
            <p>Click here, Press <span class="key">&rarr;</span> key to advance.</p> 
			<p>Click the left arrow key first and then the right arrow key. <br/> (This is apparently a bug I am trying to work on it.)</p>
			<br/><br/></br>
			<p>Press 3 to zoom out</center></p>
          </section> 
        </div> 
        
        <?php
            $input = array();
            shuffle($input);
            for($i=0; $i<50; $i++)
            $input[]=$i;
            $file="data.xml";
            $test= new SimpleXMLElement($file, null, true);
		  <ul id="feeder">
      <?php            foreach($test->question as $question) {
               
            ?>
			<div class="slide"> 
          <section class="middle"> 
              <li><h2>
                 <?php for($i=0; i<5; i++) {
                 echo $question->ques[$input[$i]]; } ?> <br>
                 <?php echo $question->option[0]; ?>
                 <?php echo $question->option[1]; ?><br>
                 <?php echo $question->option[2]; ?>
                 <?php echo $question->option[3]; ?><br>
              </h2>
             
	<?php echo $item->description; ?> </br></br></br></li>
	</section> 
        </div> 
	<?php } ?>
	</ul>
          
 
      </div> <!-- slides --> 
 
    </div> <!-- presentation --> 
 
	 <script> 
   (function() {
  var doc = document;
  var disableBuilds = false;
  var disableNotes = false;

  var ctr = 0;
  var spaces = /\s+/, a1 = [''];

  var toArray = function(list) {
    return Array.prototype.slice.call(list || [], 0);
  };

  var byId = function(id) {
    if (typeof id == 'string') { return doc.getElementById(id); }
    return id;
  };

  var query = function(query, root) {
    return queryAll(query, root)[0];
  }

  var queryAll = function(query, root) {
    if (!query) { return []; }
    if (typeof query != 'string') { return toArray(query); }
    if (typeof root == 'string') {
      root = byId(root);
      if(!root){ return []; }
    }

    root = root || document;
    var rootIsDoc = (root.nodeType == 9);
    var doc = rootIsDoc ? root : (root.ownerDocument || document);

    // rewrite the query to be ID rooted
    if (!rootIsDoc || ('>~+'.indexOf(query.charAt(0)) >= 0)) {
      root.id = root.id || ('qUnique' + (ctr++));
      query = '#' + root.id + ' ' + query;
    }
    // don't choke on something like ".yada.yada >"
    if ('>~+'.indexOf(query.slice(-1)) >= 0) { query += ' *'; }
    return toArray(doc.querySelectorAll(query));
  };

  var strToArray = function(s) {
    if (typeof s == 'string' || s instanceof String) {
      if (s.indexOf(' ') < 0) {
        a1[0] = s;
        return a1;
      } else {
        return s.split(spaces);
      }
    }
    return s;
  };

  // Needed for browsers that don't support String.trim() (e.g. iPad)
  var trim = function(str) {
    return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
  };

  var addClass = function(node, classStr) {
    classStr = strToArray(classStr);
    var cls = ' ' + node.className + ' ';
    for (var i = 0, len = classStr.length, c; i < len; ++i) {
      c = classStr[i];
      if (c && cls.indexOf(' ' + c + ' ') < 0) {
        cls += c + ' ';
      }
    }
    node.className = trim(cls);
  };

  var removeClass = function(node, classStr) {
    var cls;
    if (classStr !== undefined) {
      classStr = strToArray(classStr);
      cls = ' ' + node.className + ' ';
      for (var i = 0, len = classStr.length; i < len; ++i) {
        cls = cls.replace(' ' + classStr[i] + ' ', ' ');
      }
      cls = trim(cls);
    } else {
      cls = '';
    }
    if (node.className != cls) {
      node.className = cls;
    }
  };

  var toggleClass = function(node, classStr) {
    var cls = ' ' + node.className + ' ';
    if (cls.indexOf(' ' + trim(classStr) + ' ') >= 0) {
      removeClass(node, classStr);
    } else {
      addClass(node, classStr);
    }
  };


  // modernizr lite via https://gist.github.com/598008
  var testStyle = function(style) {

    var elem = document.createElement('div');
    var prefixes = ['Webkit', 'Moz', 'O', 'ms', 'Khtml'];
    var bool;
    var bump = function(all, letter) {
          return letter.toUpperCase();
        };
    var prop;

    bool = style in elem.style;
    prop = style.replace(/^(.)/, bump).replace(/-([a-z])/ig, bump);

    for (var len = prefixes.length; len--; ){
      if (bool) {
        break;
      }
      bool = prefixes[len] + prop in elem.style;
    }

    document.documentElement.className += ' ' + (bool ? '' : 'no-') + style.replace(/-/g, '');
    return bool;
  };

  var canTransition = testStyle('transition');

  //
  // Slide class
  //
  var Slide = function(node, idx) {
    this._node = node;
    var note = query('.note > section', node);
    this._speakerNote = note ? note.innerHTML : '';
    if (idx >= 0) {
      this._count = idx + 1;
    }
    if (this._node) {
      addClass(this._node, 'slide distant-slide');
    }
    this._makeCounter();
    this._makeBuildList();
  };

  Slide.prototype = {
    _node: null,
    _count: 0,
    _buildList: [],
    _visited: false,
    _currentState: '',
    _states: [ 'distant-slide', 'far-past',
               'past', 'current', 'future',
               'far-future', 'distant-slide' ],
    setState: function(state) {
      if (typeof state != 'string') {
        state = this._states[state];
      }
      if (state == 'current' && !this._visited) {
        this._visited = true;
        this._makeBuildList();
      }
      removeClass(this._node, this._states);
      addClass(this._node, state);
      this._currentState = state;

      // delay first auto run. Really wish this were in CSS.
      /*
      this._runAutos();
      */
      var _t = this;
      setTimeout(function(){ _t._runAutos(); } , 400);

      if (state == 'current') {
        this._onLoad();
      } else {
        this._onUnload();
      }
    },
    _onLoad: function() {
      this._fireEvent('onload');
      this._showFrames();
    },
    _onUnload: function() {
      this._fireEvent('onunload');
      this._hideFrames();
    },
    _fireEvent: function(name) {
      var eventSrc = this._node.getAttribute(name);
      if (eventSrc) {
        eventSrc = '(function() { ' + eventSrc + ' })';
        var fn = eval(eventSrc);
        fn.call(this._node);
      }
    },
    _showFrames: function() {
      var frames = queryAll('iframe', this._node);
      function show() {
        frames.forEach(function(el) {
          var _src = el.getAttribute('_src');
          if (_src && _src.length) {
            el.src = _src;
          }
        });
      }
      setTimeout(show, 0);
    },
    _hideFrames: function() {
      var frames = queryAll('iframe', this._node);
      function hide() {
        frames.forEach(function(el) {
          var _src = el.getAttribute('_src');
          if (_src && _src.length) {
            el.src = '';
          }
        });
      }
      setTimeout(hide, 250);
    },
    _makeCounter: function() {
      if(!this._count || !this._node) { return; }
      var c = doc.createElement('span');
      c.className = 'counter';
      this._node.appendChild(c);
    },
    _makeBuildList: function() {
      this._buildList = [];
      if (disableBuilds) { return; }
      if (this._node) {
        this._buildList = queryAll('[data-build] > *', this._node);
      }
      this._buildList.forEach(function(el) {
        addClass(el, 'to-build');
      });
    },
    _runAutos: function() {
      if (this._currentState != 'current') {
        return;
      }
      // find the next auto, slice it out of the list, and run it
      var idx = -1;
      this._buildList.some(function(n, i) {
        if (n.hasAttribute('data-auto')) {
          idx = i;
          return true;
        }
        return false;
      });
      if (idx >= 0) {
        var elem = this._buildList.splice(idx, 1)[0];

        var _t = this;
        if (canTransition) {
          var l = function(evt) {
            elem.parentNode.removeEventListener('webkitTransitionEnd', l, false);
            elem.parentNode.removeEventListener('transitionend', l, false);  // moz
            elem.parentNode.removeEventListener('oTransitionEnd', l, false);
            _t._runAutos();
          };
          elem.parentNode.addEventListener('webkitTransitionEnd', l, false);
          elem.parentNode.addEventListener('transitionend', l, false);
          elem.parentNode.addEventListener('oTransitionEnd', l, false);
          removeClass(elem, 'to-build');
        } else {
          setTimeout(function() {
            removeClass(elem, 'to-build');
            _t._runAutos();
          }, 400);
        }
      }
    },
    getSpeakerNote: function() {
      return this._speakerNote;
    },
    buildNext: function() {
      if (!this._buildList.length) {
        return false;
      }
      removeClass(this._buildList.shift(), 'to-build');
      return true;
    },
  };

  //
  // SlideShow class
  //
  var SlideShow = function(slides) {
    this._slides = (slides || []).map(function(el, idx) {
      return new Slide(el, idx);
    });
    var h = window.location.hash;
    try {
      this.current = h;
    } catch (e) { /* squeltch */ }
    this.current = (!this.current) ? "landing-slide" : this.current.replace('#', '');
    if (!query('#' + this.current)) {
      // if this happens is very likely that someone is coming from
      // a link with the old permalink format, i.e. #slide24
      alert('The format of the permalinks have recently changed. If you are coming ' +
             'here from an old external link it\'s very likely you will land to the wrong slide');
      this.current = "landing-slide";
    }
    var _t = this;
    doc.addEventListener('keydown',
        function(e) { _t.handleKeys(e); }, false);
    doc.addEventListener('touchstart',
        function(e) { _t.handleTouchStart(e); }, false);
    doc.addEventListener('touchend',
        function(e) { _t.handleTouchEnd(e); }, false);
    window.addEventListener('popstate',
        function(e) { if (e.state) { _t.go(e.state, true); } }, false);
    query('#left-init-key').addEventListener('click',
        function() { _t.next(); }, false);
    this._update();
    queryAll('#nav-prev, #nav-next').forEach(function(el) {
      el.addEventListener('click', _t.onNavClick.bind(_t), false);
    });
    queryAll('menu button').forEach(function(el) {
      el.addEventListener('click', _t.onCommandClick.bind(_t), false);
    });
  };

  SlideShow.prototype = {
    _presentationCounter: query('#presentation-counter'),
    _menuCounter: query('#slide-no'),
    _speakerNote: query('#speaker-note'),
    _help: query('#help'),
    _slides: [],
    _getCurrentIndex: function() {
      var me = this;
      var slideCount = null;
      queryAll('.slide').forEach(function(slide, i) {
        if (slide.id == me.current) {
          slideCount = i;
        }
      });
      return slideCount + 1;
    },
    _update: function(targetId, dontPush) {
      // in order to delay the time where the counter shows the slide number we check if
      // the slides are already loaded (so we show the loading... instead)
      // the technique to test visibility is taken from here
      // http://stackoverflow.com/questions/704758/how-to-check-if-an-element-is-really-visible-with-javascript
      var currentIndex = this._getCurrentIndex();

      if (targetId) {
        var savedIndex = currentIndex;
        this.current = targetId;
        currentIndex = this._getCurrentIndex();
        if (Math.abs(savedIndex - currentIndex) > 1) {
          // if the current switch is not "prev" or "next", we need clear
          // the state setting near the original slide
          for (var x = savedIndex; x < savedIndex + 7; x++) {
            if (this._slides[x-4]) {
              this._slides[x-4].setState(0);
            }
          }
        }
      }
      var docElem = document.documentElement;
      var elem = document.elementFromPoint( docElem.clientWidth / 2, docElem.clientHeight / 2);
      if (elem && elem.className != 'presentation') {
        this._presentationCounter.textContent = currentIndex;
        if (this._menuCounter) {
          this._menuCounter.textContent = currentIndex;          
        }
      }
      this._speakerNote.innerHTML = this._slides[currentIndex - 1].getSpeakerNote();
      if (history.pushState) {
        if (!dontPush) {
          history.pushState(this.current, 'Slide ' + this.current, '#' + this.current);
        }
      } else {
        window.location.hash = this.current;
      }
      for (var x = currentIndex; x < currentIndex + 7; x++) {
        if (this._slides[x-4]) {
          this._slides[x-4].setState(x-currentIndex);
        }
      }
    },

    current: 0,
    next: function() {
      if (!this._slides[this._getCurrentIndex() - 1].buildNext()) {
        var next = query('#' + this.current + ' + .slide');
        //this.current = (next) ? next.id : this.current;
        this._update((next) ? next.id : this.current);
      }
    },
    prev: function() {
      var prev = query('.slide:nth-child(' + (this._getCurrentIndex() - 1) + ')');
      //this.current = (prev) ? prev.id : this.current;
      this._update((prev) ? prev.id : this.current);
    },
    go: function(slideId, dontPush) {
      //this.current = slideId;
      this._update(slideId, dontPush);
    },

    switch3D: function() {
      toggleClass(document.body, 'three-d');
    },


    handleKeys: function(e) {
      if (/^(input|textarea)$/i.test(e.target.nodeName) || e.target.isContentEditable) {
        return;
      }
      switch (e.keyCode) {
        case 37:  // left arrow
          this.prev(); break;
        case 39:  // right arrow
        case 32:  // space
          this.next(); break;
        case 51:  // 3
          this.switch3D(); break;
      }
    },
    _touchStartX: 0,
    handleTouchStart: function(e) {
      this._touchStartX = e.touches[0].pageX;
    },
    handleTouchEnd: function(e) {
      var delta = this._touchStartX - e.changedTouches[0].pageX;
      var SWIPE_SIZE = 150;
      if (delta > SWIPE_SIZE) {
        this.next();
      } else if (delta< -SWIPE_SIZE) {
        this.prev();
      }
    },
    onNavClick: function(e) {
      if (e.target.id == "nav-prev") {
        this.prev();
      } else if (e.target.id = "nav-next") {
        this.next();
      }
    },
  };

  // load highlight setting from session storage, if available.
  // session storage can only store strings so we have to assume type coercion
  // for the boolean logic here

  // disable style theme stylesheets
  var linkEls = queryAll('link.theme');
  var stylesheetPath = sessionStorage['theme'] || 'css/default.css';
  linkEls.forEach(function(stylesheet) {
    stylesheet.disabled = !(stylesheet.href.indexOf(stylesheetPath) != -1);
  });

  // Initialize
  var li_array = [];
  var transitionSlides = queryAll('.transitionSlide').forEach(function(el) {
    li_array.push( ['<li><a data-hash="', el.id, '">',
                    query('h2', el).textContent, '</a><img src="',
                    query('img', el).src.replace(/64/g, '32'),
                    '"/></li>'].join('')
                 );
  });


  var slideshow = new SlideShow(queryAll('.slide'));
  
  document.addEventListener('DOMContentLoaded', function() {
    query('.slides').style.display = 'block';
  }, false);


   
})();
    </script> 
    <!--[if lt IE 9]>
    <script 
      src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js">
    </script>
    <script>CFInstall.check({ mode: "overlay" });</script>
    <![endif]--> 
    
  </body> 
</html>