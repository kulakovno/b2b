<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.01.2017
 * Time: 16:16
 */

function removeParamsByValue($url, $value)
{
    $parsed = parse_url($url);
    parse_str($parsed['query'], $params);

    $result = array_filter($params, function ($paramValue) use ($value) {
        return $paramValue !== (string)$value;
    });

    return generateUrl($parsed['host'], $parsed['path'], $result, $parsed['scheme']);
    //...
}

function removePath($url)
{
    $parsed = parse_url($url);
    parse_str($parsed['query'], $params);

    return generateUrl($parsed['host'], '', $params, $parsed['scheme']);
}

function sortParamsAsc($url)
{
    $parsed = parse_url($url);
    parse_str($parsed['query'], $params);
    asort($params);

    return generateUrl($parsed['host'], '', $params, $parsed['scheme']);
}

function addParam($url, $name, $value)
{
    $parsed = parse_url($url);
    parse_str($parsed['query'], $params);
    $params[$name] = $value;

    return generateUrl($parsed['host'], '', $params, $parsed['scheme']);
    //..
}

function generateUrl($host, $path = '', $params = [], $scheme = 'http')
{
    return $scheme . '://' . $host . '/' . $path . '?' . http_build_query($params);
}


function b2bTask2()
{

    $string = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3';
    $newParam = '/test/index.html';
    
    $filtered = removeParamsByValue($string, 3);
    $sorted = sortParamsAsc($filtered);
    $pathRemoved = removePath($sorted);
    $updated = addParam($pathRemoved, 'url', $newParam);

    return $updated;
}

echo b2bTask2();
