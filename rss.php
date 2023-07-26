<?php
header('Content-Type: application/rss+xml; charset=utf-8');
require_once("./ErrorHandler/error.php");
require_once("./Controller/RSS.php");

$rssController = new RSS();
$rssInfos = $rssController->getRssData();
$decodeRssInfos = json_decode($rssInfos, true);

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0">
    <channel>
        <title>GWSC Camping RSS Feed</title>
        <link>http://127.0.0.1</link>
        <description>GWSC Camping! Explore the world!</description>
        <language>en-us</language>
        <?php foreach ($decodeRssInfos as $item): ?>
            <item>
                <title><?php echo $item['title']; ?></title>
                <link><?php echo $item['description']; ?></link>
                <pubDate><?php echo $item['published_at']; ?></pubDate>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>