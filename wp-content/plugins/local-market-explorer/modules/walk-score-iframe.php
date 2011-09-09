<!doctype html>
<html>
<head>
	<style type="text/css">
		#ws-walkscore-tile {
			position: relative;
			text-align: left;
			margin: 0 auto;
		}
		#ws-walkscore-tile * {
			float:none;
		}
		#ws-footer {
			position: absolute;
			top:268px;
			left:8px;
			width: 588px;
		}
		#ws-footer a, #ws-footer a:link {
			font:11px Verdana,Arial,Helvetica,sans-serif;
			margin-right:6px;
			white-space:nowrap;
			padding:0;
			color:#000;
			font-weight:bold;
			text-decoration:none;
		}
		#ws-footer a:hover{
			color:#777;
			text-decoration:none;
		}
		#ws-footer a:active{
			color:#b14900;
		}
		#ws-street {
			position:absolute;
			top:0px;
			left:225px;
			width:331px;
		}
		#ws-go {
			position:absolute;
			top:0px;
			right:0px;
		}
	</style>
</head>
<body>
	<div id="ws-walkscore-tile">
		<div id="ws-footer">
			<form id="ws-form">
				<a id="ws-a" href="http://www.walkscore.com/" target="_blank">Find out your home's Walk Score: </a>
				<input type="text" id="ws-street" />
				<input type="image" id="ws-go" src="http://www2.walkscore.com/images/tile/go-button.gif" height="15" width="22" border="0" alt="get my Walk Score" />
			</form>
		</div>
	</div>
	<script>
		var ws_wsid = '<?php echo $_GET["api-key"] ?>';
		var ws_address = '<?php echo str_replace("'", "\\'", $_GET["location"]) ?>';
		var ws_width = document.body.clientWidth;
		var ws_height = "286";
		var ws_layout = "horizontal";
	</script>
	<script src="http://www.walkscore.com/tile/show-walkscore-tile.php"></script>
</body>
</html>