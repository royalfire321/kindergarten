<?php
  require_once dirname(__DIR__) . '/head.php';
  if($_SESSION['user']['kind'] !== 1)redirect_header(_WEB_URL, '您沒有權限', 3000);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
		<title>elFinder 2.1.x source version with PHP connector</title>

		<!-- Require JS (REQUIRED) -->
		<!-- Rename "main.default.js" to "main.js" and edit it if you need configure elFInder options or any things -->
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" href="elFinder/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="elFinder/css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script src="elFinder/js/elfinder.min.js"></script>
		
        <!-- elFinder translation (OPTIONAL) -->
        <script src="elFinder/js/i18n/elfinder.zh_TW.js"></script>

        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            // Helper function to get parameters from the query string.
            function getUrlParam(paramName) {
                var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
                var match = window.location.search.match(reParam) ;

                return (match && match.length > 1) ? match[1] : '' ;
            }

            $().ready(function() {
                var funcNum = getUrlParam('CKEditorFuncNum');

                var elf = $('#elfinder').elfinder({
                    url : 'elFinder/php/connector.minimal.php',
                    lang: 'zh_TW',                    // language (OPTIONAL)
                    getFileCallback : function(file) {
                        window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                        window.close();
                    },
                    resizable: false
                }).elfinder('instance');
            });
        </script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>