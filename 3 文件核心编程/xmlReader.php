<?php
$items = array();
$reader = new XMLReader();
$reader->open('collection.xml', 'utf-8');
while ($reader->read()) {
    if ($reader->name == 'cd' && $reader->nodeType == XMLReader::ELEMENT) { //判断读取的是cd，并且是个节点
        $item = [];
        while ($reader->read() && $reader->name != 'cd') {
            if ($reader->nodeType != XMLReader::ELEMENT) continue; //如果不是节点直接跳过
            $name = $reader->name;
            $value = $reader->readString();
            $item[$name] = $value;
        }
    }
    $items[] = $item;
}
