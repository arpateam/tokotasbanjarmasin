<?php

	header("Content-type: text/xml");
	echo'<?xml version=\'1.0\' encoding=\'UTF-8\'?>';
	echo'   <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

	require 'system/koneksi.php';

	$Sitemap1 = $pdo->query("SELECT * FROM sitemap_1 WHERE id_sub_sitemap='2' ORDER BY priority_1 DESC");
	while($resultSitemap1 = $Sitemap1->fetch(PDO::FETCH_ASSOC)){

?>
    <url>
    	<loc><?= $resultSitemap1['loc_1']; ?></loc>
    	<lastmod><?= $resultSitemap1['lastmod_1']; ?></lastmod>
    	<priority><?= $resultSitemap1['priority_1']; ?></priority>
    </url>

<?php
	}
?> 

</urlset>