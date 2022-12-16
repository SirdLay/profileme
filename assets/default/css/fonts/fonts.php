

<?php header("Content-type: text/css; charset: UTF-8"); ?>
<?php echo $site_font = $_GET['font']; ?>

body{
    font-family: '<?=$site_font?>', sans-serif;
    font-size: 14px;
    background:#fafafa;
    overflow-x: hidden;
    position: relative;
}


.section-title h1, .section-title h2, .section-title h3, .section-title h4 ,.section-title h5{
    font-size: 18px;
    font-family: '<?=$site_font?>', sans-serif;
    font-weight: 600;
    position: relative;
}

.cbp-l-loadMore-link.site-btn{
    font-family: '<?=$site_font?>', sans-serif !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    border: 0 !important;
    border-radius: 50px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    padding: 1px 29px !important;
    line-height: 35px !important;
}

h1, h2, h3, h4, h5, h6{
    font-family: '<?=$site_font?>', sans-serif;
}

header nav ul li a {
    font-family: '<?=$site_font?>', sans-serif;
}

.habout{
    font-family: '<?=$site_font?>', sans-serif;
    margin-top: 10px;
    line-height: 18px;
}

p.post_details {
    font-size: 16px;
    font-family: '<?=$site_font?>', sans-serif;
    color: #333 !important;
    line-height:27px;
}