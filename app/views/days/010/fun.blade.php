<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day 10</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">

<style type="text/css">
    /* Colors */
    body {background-color: #CFC;}
    .container { background-color: blue; }
    .header {background-color: #FFC;}
    .class1 {background-color: orange;}
    .class2 {background-color: green;}
    .class3 {background-color: purple;}
    .class4 {background-color: yellow;}
    .class5 {background-color: cyan;}
    .class6 {background-color: magenta;}
    .class7 {background-color: pink;}
    .a { background-color: green; }

    /* Other html */
    * {
        box-sizing: border-box; 
    }
    html,body {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    body {
        overflow: hidden;
    }

    .header {
        position: absolute;
        width: 100%;
        height: 80px;
    }
    .class5 {
        display: -webkit-flex;
        -webkit-flex-flow: row wrap;
        padding: 10px;
        overflow-y: scroll;
    }
    .class5 header {
        width: 100%;
        -webkit-flex 1;
    }

    .class3 {
        overflow-y: scroll;
    }
    .a {
        margin-right: 10px;
        margin-bottom: 10px;
        width: 140px;
        height: 60px;
        -webkit-flex: 0 0 140px;
        border: 1px solid black;
        border-radius: 10px;
        box-shadow: 4px 4px 8px rgba(0, 0, 0, .8);
    }
    .b {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        box-shadow: inset 2px 2px 4px rgba(255, 255, 255, .5);
    }

    .fa:hover {
        font-size: 200%;
        text-shadow: 0px 0px 20px rgba(255, 255, 255, .8);
    }

    .huge.fa-rocket {
        font-size: 120pt;
        position: absolute;
        bottom: -100px;
        left: -100px;
        z-index: 5;
        text-shadow: 4px 4px 8px rgba(0, 0, 0, .8);
    }
    .huge.fa-heart, .huge.fa-heart:hover {
        position: absolute;
        font-size: 200pt;
        color: red;
        margin-left: 400px;
        margin-top: 200px;
        text-shadow: 4px 4px 8px rgba(0, 0, 0, .8);
    }

    @-webkit-keyframes heart {
        from {
            color: rgba(255,0,0,0);
            text-shadow: none;
        }
        to {
            color: rgba(255,0,0,1);
        }
    }

    @-webkit-keyframes rocket {
        from {
            color: blue; 
        }
        to { 
            color: green;
        -webkit-transform: translate(1000px,-800px);
        }
    }

    /* This is the element that we apply the animation to. */
    .fa-rocket:hover {
        -webkit-animation-name: rocket;
        -webkit-animation-duration: 10s;
        -webkit-animation-timing-function: ease; /* ease is the default */
        -webkit-animation-delay: 0s;             /* 0 is the default */
        -webkit-animation-iteration-count: 1;    /* 1 is the default */
        -webkit-animation-direction: alternate;  /* normal is the default */
    }

    .fa-heart {
        -webkit-animation-name: heart;
        -webkit-animation-duration: 10s;
    }

    [class^="chr-"],
    [class*=" chr-"] {
        font-family: arial;
        font-style: normal;
        font-weight: normal;
        font-size: 30pt;
    }

    i.chr-infinity:before {
        content: "\221e";
    }
    i.chr-check:before {
        content: "\2714";
    }
    i.chr-cancel:before {
        content: "\2717";
    }
    i.chr-snowflake:before {
        content: "\2744";
    }
    i.chr-floral-heart:before {
        content: "\2767";
    }
    i.chr-exclamation:before {
        content: "\0021";
    }


@media (min-width:660px)  {
    body, .c2, .c3, .c4 {
        display: -webkit-flex;
    }
    body, .c3 {
        -webkit-flex-flow: row;
    }
    .c2, .c4 {
        -webkit-flex-flow: column;
    }
    .class1, .class2, .class3, .class4, .class5, .class6 {
        -webkit-flex: 1;
    }
    .c2 {
        -webkit-flex: 4;
    }
    .c3 {
        -webkit-flex: 4;
    }
    .c4 {
        -webkit-flex: 1;
    }
}


/* Scrollbar */
@media only screen { 
    ::-webkit-scrollbar {
        width:  8px;
        height: 6px;
    }
    ::-webkit-scrollbar-button:start:decrement,
    ::-webkit-scrollbar-button:end:increment {
        background-color: #FCAF17;
        display: block;
        height: 10;
    }
    ::-webkit-scrollbar-track-piece {
        background-color: #eee;
        -webkit-border-radius: 6px;
    }
    ::-webkit-scrollbar-thumb:vertical {
        height: 10px;
        background-color: #FCAF17;
        -webkit-border-radius: 6px;
    }
    ::-webkit-scrollbar-thumb:horizontal {
        width: 20px;
        background-color: #FCAF17;
        -webkit-border-radius: 3px;
    }

    .class5::-webkit-scrollbar {
        width:  14px;
    }
    .class5::-webkit-scrollbar-button:start:decrement,
    .class5::-webkit-scrollbar-button:end:increment,
    .class5::-webkit-scrollbar-thumb:vertical,
    .class5::-webkit-scrollbar-thumb:horizontal {
        background-color: #006EA6;
    }
    .class5::-webkit-scrollbar-track-piece {
        background-color: #33A1D9;
    }
}


</style>
</head>
<body>


    <i class="huge fa fa-rocket"></i>
    <i class="huge fa fa-heart"></i>

    <div class="class1">
        <a href="/">Home</a>
        <h1>And now for something completely different...</h1>
    </div>
    <div class="c2">
        <div class="class2"></div>
        <div class="c3">
            <div class="c4">
                <div class="class3">
<i class="fa fa-adjust"></i>
<i class="fa fa-adn"></i>
<i class="fa fa-align-center"></i>
<i class="fa fa-align-justify"></i>
<i class="fa fa-align-left"></i>
<i class="fa fa-align-right"></i>
<i class="fa fa-ambulance"></i>
<i class="fa fa-anchor"></i>
<i class="fa fa-android"></i>
<i class="fa fa-angle-double-down"></i>
<i class="fa fa-angle-double-left"></i>
<i class="fa fa-angle-double-right"></i>
<i class="fa fa-angle-double-up"></i>
<i class="fa fa-angle-down"></i>
<i class="fa fa-angle-left"></i>
<i class="fa fa-angle-right"></i>
<i class="fa fa-angle-up"></i>
<i class="fa fa-apple"></i>
<i class="fa fa-archive"></i>
<i class="fa fa-arrow-circle-down"></i>
<i class="fa fa-arrow-circle-left"></i>
<i class="fa fa-arrow-circle-o-down"></i>
<i class="fa fa-arrow-circle-o-left"></i>
<i class="fa fa-arrow-circle-o-right"></i>
<i class="fa fa-arrow-circle-o-up"></i>
<i class="fa fa-arrow-circle-right"></i>
<i class="fa fa-arrow-circle-up"></i>
<i class="fa fa-arrow-down"></i>
<i class="fa fa-arrow-left"></i>
<i class="fa fa-arrow-right"></i>
<i class="fa fa-arrow-up"></i>
<i class="fa fa-arrows"></i>
<i class="fa fa-arrows-alt"></i>
<i class="fa fa-arrows-h"></i>
<i class="fa fa-arrows-v"></i>
<i class="fa fa-asterisk"></i>
<i class="fa fa-backward"></i>
<i class="fa fa-ban"></i>
<i class="fa fa-bar-chart-o"></i>
<i class="fa fa-barcode"></i>
<i class="fa fa-bars"></i>
<i class="fa fa-beer"></i>
<i class="fa fa-bell"></i>
<i class="fa fa-bell-o"></i>
<i class="fa fa-bitbucket"></i>
<i class="fa fa-bitbucket-square"></i>
<i class="fa fa-bitcoin"></i>
<i class="fa fa-bold"></i>
<i class="fa fa-bolt"></i>
<i class="fa fa-book"></i>
<i class="fa fa-bookmark"></i>
<i class="fa fa-bookmark-o"></i>
<i class="fa fa-briefcase"></i>
<i class="fa fa-btc"></i>
<i class="fa fa-bug"></i>
<i class="fa fa-building-o"></i>
<i class="fa fa-bullhorn"></i>
<i class="fa fa-bullseye"></i>
<i class="fa fa-calendar"></i>
<i class="fa fa-calendar-o"></i>
<i class="fa fa-camera"></i>
<i class="fa fa-camera-retro"></i>
<i class="fa fa-caret-down"></i>
<i class="fa fa-caret-left"></i>
<i class="fa fa-caret-right"></i>
<i class="fa fa-caret-square-o-down"></i>
<i class="fa fa-caret-square-o-left"></i>
<i class="fa fa-caret-square-o-right"></i>
<i class="fa fa-caret-square-o-up"></i>
<i class="fa fa-caret-up"></i>
<i class="fa fa-certificate"></i>
<i class="fa fa-chain"></i>
<i class="fa fa-chain-broken"></i>
<i class="fa fa-check"></i>
<i class="fa fa-check-circle"></i>
<i class="fa fa-check-circle-o"></i>
<i class="fa fa-check-square"></i>
<i class="fa fa-check-square-o"></i>
<i class="fa fa-chevron-circle-down"></i>
<i class="fa fa-chevron-circle-left"></i>
<i class="fa fa-chevron-circle-right"></i>
<i class="fa fa-chevron-circle-up"></i>
<i class="fa fa-chevron-down"></i>
<i class="fa fa-chevron-left"></i>
<i class="fa fa-chevron-right"></i>
<i class="fa fa-chevron-up"></i>
<i class="fa fa-circle"></i>
<i class="fa fa-circle-o"></i>
<i class="fa fa-clipboard"></i>
<i class="fa fa-clock-o"></i>
<i class="fa fa-cloud"></i>
<i class="fa fa-cloud-download"></i>
<i class="fa fa-cloud-upload"></i>
<i class="fa fa-cny"></i>
<i class="fa fa-code"></i>
<i class="fa fa-code-fork"></i>
<i class="fa fa-coffee"></i>
<i class="fa fa-cog"></i>
<i class="fa fa-cogs"></i>
<i class="fa fa-columns"></i>
<i class="fa fa-comment"></i>
<i class="fa fa-comment-o"></i>
<i class="fa fa-comments"></i>
<i class="fa fa-comments-o"></i>
<i class="fa fa-compass"></i>
<i class="fa fa-compress"></i>
<i class="fa fa-copy"></i>
<i class="fa fa-credit-card"></i>
<i class="fa fa-crop"></i>
<i class="fa fa-crosshairs"></i>
<i class="fa fa-css3"></i>
<i class="fa fa-cut"></i>
<i class="fa fa-cutlery"></i>
<i class="fa fa-dashboard"></i>
<i class="fa fa-dedent"></i>
<i class="fa fa-desktop"></i>
<i class="fa fa-dollar"></i>
<i class="fa fa-dot-circle-o"></i>
<i class="fa fa-download"></i>
<i class="fa fa-dribbble"></i>
<i class="fa fa-dropbox"></i>
<i class="fa fa-edit"></i>
<i class="fa fa-eject"></i>
<i class="fa fa-ellipsis-h"></i>
<i class="fa fa-ellipsis-v"></i>
<i class="fa fa-envelope"></i>
<i class="fa fa-envelope-o"></i>
<i class="fa fa-eraser"></i>
<i class="fa fa-eur"></i>
<i class="fa fa-euro"></i>
<i class="fa fa-exchange"></i>
<i class="fa fa-exclamation"></i>
<i class="fa fa-exclamation-circle"></i>
<i class="fa fa-exclamation-triangle"></i>
<i class="fa fa-expand"></i>
<i class="fa fa-external-link"></i>
<i class="fa fa-external-link-square"></i>
<i class="fa fa-eye"></i>
<i class="fa fa-eye-slash"></i>
<i class="fa fa-facebook"></i>
<i class="fa fa-facebook-square"></i>
<i class="fa fa-fast-backward"></i>
<i class="fa fa-fast-forward"></i>
<i class="fa fa-female"></i>
<i class="fa fa-fighter-jet"></i>
<i class="fa fa-file"></i>
<i class="fa fa-file-o"></i>
<i class="fa fa-file-text"></i>
<i class="fa fa-file-text-o"></i>
<i class="fa fa-files-o"></i>
<i class="fa fa-film"></i>
<i class="fa fa-filter"></i>
<i class="fa fa-fire"></i>
<i class="fa fa-fire-extinguisher"></i>
<i class="fa fa-flag"></i>
<i class="fa fa-flag-checkered"></i>
<i class="fa fa-flag-o"></i>
<i class="fa fa-flash"></i>
<i class="fa fa-flask"></i>
<i class="fa fa-flickr"></i>
<i class="fa fa-floppy-o"></i>
<i class="fa fa-folder"></i>
<i class="fa fa-folder-o"></i>
<i class="fa fa-folder-open"></i>
<i class="fa fa-folder-open-o"></i>
<i class="fa fa-font"></i>
<i class="fa fa-forward"></i>
<i class="fa fa-foursquare"></i>
<i class="fa fa-frown-o"></i>
<i class="fa fa-gamepad"></i>
<i class="fa fa-gavel"></i>
<i class="fa fa-gbp"></i>
<i class="fa fa-gear"></i>
<i class="fa fa-gears"></i>
<i class="fa fa-gift"></i>
<i class="fa fa-github"></i>
<i class="fa fa-github-alt"></i>
<i class="fa fa-github-square"></i>
<i class="fa fa-gittip"></i>
<i class="fa fa-glass"></i>
<i class="fa fa-globe"></i>
<i class="fa fa-google-plus"></i>
<i class="fa fa-google-plus-square"></i>
<i class="fa fa-group"></i>
<i class="fa fa-h-square"></i>
<i class="fa fa-hand-o-down"></i>
<i class="fa fa-hand-o-left"></i>
<i class="fa fa-hand-o-right"></i>
<i class="fa fa-hand-o-up"></i>
<i class="fa fa-hdd-o"></i>
<i class="fa fa-headphones"></i>
<i class="fa fa-heart-o"></i>
<i class="fa fa-home"></i>
<i class="fa fa-hospital-o"></i>
<i class="fa fa-html5"></i>
<i class="fa fa-inbox"></i>
<i class="fa fa-indent"></i>
<i class="fa fa-info"></i>
<i class="fa fa-info-circle"></i>
<i class="fa fa-inr"></i>
<i class="fa fa-instagram"></i>
<i class="fa fa-italic"></i>
<i class="fa fa-jpy"></i>
<i class="fa fa-key"></i>
<i class="fa fa-keyboard-o"></i>
<i class="fa fa-krw"></i>
<i class="fa fa-laptop"></i>
<i class="fa fa-leaf"></i>
<i class="fa fa-legal"></i>
<i class="fa fa-lemon-o"></i>
<i class="fa fa-level-down"></i>
<i class="fa fa-level-up"></i>
<i class="fa fa-lightbulb-o"></i>
<i class="fa fa-link"></i>
<i class="fa fa-linkedin"></i>
<i class="fa fa-linkedin-square"></i>
<i class="fa fa-linux"></i>
<i class="fa fa-list"></i>
<i class="fa fa-list-alt"></i>
<i class="fa fa-list-ol"></i>
<i class="fa fa-list-ul"></i>
<i class="fa fa-location-arrow"></i>
<i class="fa fa-lock"></i>
<i class="fa fa-long-arrow-down"></i>
<i class="fa fa-long-arrow-left"></i>
<i class="fa fa-long-arrow-right"></i>
<i class="fa fa-long-arrow-up"></i>
<i class="fa fa-magic"></i>
<i class="fa fa-magnet"></i>
<i class="fa fa-mail-forward"></i>
<i class="fa fa-mail-reply"></i>
<i class="fa fa-mail-reply-all"></i>
<i class="fa fa-male"></i>
<i class="fa fa-map-marker"></i>
<i class="fa fa-maxcdn"></i>
<i class="fa fa-medkit"></i>
<i class="fa fa-meh-o"></i>
<i class="fa fa-microphone"></i>
<i class="fa fa-microphone-slash"></i>
<i class="fa fa-minus"></i>
<i class="fa fa-minus-circle"></i>
<i class="fa fa-minus-square"></i>
<i class="fa fa-minus-square-o"></i>
<i class="fa fa-mobile"></i>
<i class="fa fa-mobile-phone"></i>
<i class="fa fa-money"></i>
<i class="fa fa-moon-o"></i>
<i class="fa fa-music"></i>
<i class="fa fa-outdent"></i>
<i class="fa fa-pagelines"></i>
<i class="fa fa-paperclip"></i>
<i class="fa fa-paste"></i>
<i class="fa fa-pause"></i>
<i class="fa fa-pencil"></i>
<i class="fa fa-pencil-square"></i>
<i class="fa fa-pencil-square-o"></i>
<i class="fa fa-phone"></i>
<i class="fa fa-phone-square"></i>
<i class="fa fa-picture-o"></i>
<i class="fa fa-pinterest"></i>
<i class="fa fa-pinterest-square"></i>
<i class="fa fa-plane"></i>
<i class="fa fa-play"></i>
<i class="fa fa-play-circle"></i>
<i class="fa fa-play-circle-o"></i>
<i class="fa fa-plus"></i>
<i class="fa fa-plus-circle"></i>
<i class="fa fa-plus-square"></i>
<i class="fa fa-plus-square-o"></i>
<i class="fa fa-power-off"></i>
<i class="fa fa-print"></i>
<i class="fa fa-puzzle-piece"></i>
<i class="fa fa-qrcode"></i>
<i class="fa fa-question"></i>
<i class="fa fa-question-circle"></i>
<i class="fa fa-quote-left"></i>
<i class="fa fa-quote-right"></i>
<i class="fa fa-random"></i>
<i class="fa fa-refresh"></i>
<i class="fa fa-renren"></i>
<i class="fa fa-repeat"></i>
<i class="fa fa-reply"></i>
<i class="fa fa-reply-all"></i>
<i class="fa fa-retweet"></i>
<i class="fa fa-rmb"></i>
<i class="fa fa-road"></i>
<i class="fa fa-rotate-left"></i>
<i class="fa fa-rotate-right"></i>
<i class="fa fa-rouble"></i>
<i class="fa fa-rss"></i>
<i class="fa fa-rss-square"></i>
<i class="fa fa-rub"></i>
<i class="fa fa-ruble"></i>
<i class="fa fa-rupee"></i>
<i class="fa fa-save"></i>
<i class="fa fa-scissors"></i>
<i class="fa fa-search"></i>
<i class="fa fa-search-minus"></i>
<i class="fa fa-share"></i>
<i class="fa fa-share-square"></i>
<i class="fa fa-share-square-o"></i>
<i class="fa fa-shield"></i>
<i class="fa fa-shopping-cart"></i>
<i class="fa fa-sign-in"></i>
<i class="fa fa-sign-out"></i>
<i class="fa fa-signal"></i>
<i class="fa fa-sitemap"></i>
<i class="fa fa-skype"></i>
<i class="fa fa-smile-o"></i>
<i class="fa fa-sort"></i>
<i class="fa fa-sort-alpha-asc"></i>
<i class="fa fa-sort-alpha-desc"></i>
<i class="fa fa-sort-amount-asc"></i>
<i class="fa fa-sort-amount-desc"></i>
<i class="fa fa-sort-asc"></i>
<i class="fa fa-sort-desc"></i>
<i class="fa fa-sort-down"></i>
<i class="fa fa-sort-numeric-asc"></i>
<i class="fa fa-sort-numeric-desc"></i>
<i class="fa fa-sort-up"></i>
<i class="fa fa-spinner"></i>
<i class="fa fa-square"></i>
<i class="fa fa-square-o"></i>
<i class="fa fa-stack-exchange"></i>
<i class="fa fa-stack-overflow"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-half"></i>
<i class="fa fa-star-half-empty"></i>
<i class="fa fa-star-half-full"></i>
<i class="fa fa-star-half-o"></i>
<i class="fa fa-star-o"></i>
<i class="fa fa-step-backward"></i>
<i class="fa fa-step-forward"></i>
<i class="fa fa-stethoscope"></i>
<i class="fa fa-stop"></i>
<i class="fa fa-strikethrough"></i>
<i class="fa fa-subscript"></i>
<i class="fa fa-suitcase"></i>
<i class="fa fa-sun-o"></i>
<i class="fa fa-superscript"></i>
<i class="fa fa-table"></i>
<i class="fa fa-tablet"></i>
<i class="fa fa-tachometer"></i>
<i class="fa fa-tag"></i>
<i class="fa fa-tags"></i>
<i class="fa fa-tasks"></i>
<i class="fa fa-terminal"></i>
<i class="fa fa-text-height"></i>
<i class="fa fa-text-width"></i>
<i class="fa fa-th"></i>
<i class="fa fa-th-large"></i>
<i class="fa fa-th-list"></i>
<i class="fa fa-thumb-tack"></i>
<i class="fa fa-thumbs-down"></i>
<i class="fa fa-thumbs-o-down"></i>
<i class="fa fa-thumbs-o-up"></i>
<i class="fa fa-thumbs-up"></i>
<i class="fa fa-ticket"></i>
<i class="fa fa-times"></i>
<i class="fa fa-times-circle"></i>
<i class="fa fa-times-circle-o"></i>
<i class="fa fa-tint"></i>
<i class="fa fa-toggle-down"></i>
<i class="fa fa-toggle-left"></i>
<i class="fa fa-toggle-right"></i>
<i class="fa fa-toggle-up"></i>
<i class="fa fa-trash-o"></i>
<i class="fa fa-trello"></i>
<i class="fa fa-trophy"></i>
<i class="fa fa-truck"></i>
<i class="fa fa-try"></i>
<i class="fa fa-tumblr"></i>
<i class="fa fa-tumblr-square"></i>
<i class="fa fa-turkish-lira"></i>
<i class="fa fa-twitter"></i>
<i class="fa fa-twitter-square"></i>
<i class="fa fa-umbrella"></i>
<i class="fa fa-underline"></i>
<i class="fa fa-undo"></i>
<i class="fa fa-unlink"></i>
<i class="fa fa-unlock"></i>
<i class="fa fa-unlock-alt"></i>
<i class="fa fa-unsorted"></i>
<i class="fa fa-upload"></i>
<i class="fa fa-usd"></i>
<i class="fa fa-user"></i>
<i class="fa fa-user-md"></i>
<i class="fa fa-users"></i>
<i class="fa fa-video-camera"></i>
<i class="fa fa-vimeo-square"></i>
<i class="fa fa-vk"></i>
<i class="fa fa-volume-down"></i>
<i class="fa fa-volume-off"></i>
<i class="fa fa-volume-up"></i>
<i class="fa fa-warning"></i>
<i class="fa fa-weibo"></i>
<i class="fa fa-wheelchair"></i>
<i class="fa fa-windows"></i>
<i class="fa fa-won"></i>
<i class="fa fa-wrench"></i>
<i class="fa fa-xing"></i>
<i class="fa fa-xing-square"></i>
<i class="fa fa-yen"></i>
<i class="fa fa-youtube"></i>
<i class="fa fa-youtube-play"></i>
<i class="fa fa-youtube-square"></i>

                </div>
                <div class="class4">

<i class="chr-infinity"></i>
<i class="chr-check"></i>
<i class="chr-cancel"></i>
<i class="chr-snowflake"></i>
<i class="chr-floral-heart"></i>
<i class="chr-exclamation icon-spin icon-4x"></i>

                </div>
            </div>
            <div class="class5">
                <header></header>
                <div class="a"><div class="b"></div></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
                <div class="a"></div>
            </div>
        </div>
        <div class="class6"></div>    
    </div>

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.mouse.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.draggable.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.huge.fa-heart').draggable();
});
</script>

</body>
</html>


