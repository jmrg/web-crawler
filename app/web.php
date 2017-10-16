<?php

$collector->get('/{filter}?', ['App\WebCrawler\Controllers\NewsList', 'listing']);