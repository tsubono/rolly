
/*--------------------------------------------

      ■サイドナビ読み込み

---------------------------------------------*/

function writeSidenav(rootDir){

	$.ajax({
		url: rootDir + "inc/side.html", 
		cache: false,
		async: false, 
		success: function(html){

			html = html.replace(/\{\$root\}/g, rootDir);
			document.write(html);
		}
	});

}

/*--------------------------------------------

      ■スマホサイドナビ読み込み

---------------------------------------------*/

function writeSidenavsp(rootDir){

	$.ajax({
		url: rootDir + "inc/side_sp.html", 
		cache: false,
		async: false, 
		success: function(html){

			html = html.replace(/\{\$root\}/g, rootDir);
			document.write(html);
		}
	});

}

