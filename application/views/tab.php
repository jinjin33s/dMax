<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

  <script>
  $(document).ready(function() {
    $("#tabs").tabs();
  });
  </script>
</head>

<div id="tabs">
    <ul>
        <li><a href="#fragment-1"><span>ID</span></a></li>
        <li><a href="#fragment-2"><span>Description</span></a></li>
        <li><a href="#fragment-3"><span>Three</span></a></li>
    </ul>
    <div id="fragment-1">
        <p><?= $product->id ?></p>
    </div>
    <div id="fragment-2">
        <p><?= $product->features ?></p>
    </div>
    <div id="fragment-3">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
    </div>
</div>
