<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsFunction
 */
/**
 * Smarty Markdown function plugin
 *
 * Type:     markdown<br>
 * Name:     lower<br>
 * Purpose:  convert string to markdown format
 *
 * @link davidscherer.blogspot.com
 * @author David Scherer <scherer dot david dot h at gmail dot com>
 * @param array $params parameters
 * @return string with converted text
 */
require_once('PHP-Markdown-Lib-1.8.0/Michelf/Markdown.php');
use \Michelf\Markdown;
function smarty_function_markdown($params, Smarty_Internal_Template $template) {
	if (!in_array('text', array_keys($params))) {
		trigger_error("markdown missing 'text' parameter", E_USER_NOTICE);
        return;
    }
    
    return Markdown::defaultTransform($params['text']);
}
?>