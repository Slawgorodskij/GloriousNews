<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParser
{
        public function run($source)
    {
        $xml = XmlParser::load($source);

        $data = $xml->parse([
            'channel_title' => ['uses' => 'channel.title'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]'],
        ]);
        $category = Category::query()
            ->where('title', $data['channel_title'])
            ->first();
        if (is_null($category)) {
            Category::addCategory($data);
        }

        News::addNews($data);
    }
}
