<?php

use Src\{PlainTextFilter, TextInput, InputFormatable, MarkdownFormat, DangerousHTMLTagsFilter};

function autoload($class) {
    include_once "{$class}.php";
}

spl_autoload_register("autoload");

function displayCommentAsWebsite(InputFormatable $formatable, string $text)
{
    echo $formatable->formatText($text);
}

$dangerousCommentFromForm = 'Hello! Nice blog post Please visit my <a href="http://www.iwillhackyou.com">homepage</a>. 
<script src="http://www.iwillhackyou.com/script.js"> performXSSAttack();</script>';

// Unsafe comment
$naiveInput = new TextInput();
echo 'Rendering without format anything (unsafe) <br>';
displayCommentAsWebsite($naiveInput, $dangerousCommentFromForm);
echo '<br><br>';

// Safe comment
$filteredInput = new PlainTextFilter($naiveInput);
echo 'Rendering without formating tags <br>';
displayCommentAsWebsite($filteredInput, $dangerousCommentFromForm);
echo '<br><br>';

$dangerousForumPostFromForm = <<<HERE
# Welcome

This is my first post on this **gorgeous** forum.

<script src="http://www.iwillhackyou.com/script.js">
  performXSSAttack();
</script>
HERE;

$text = new TextInput();
$markdown = new MarkdownFormat($text);
$filteredInput = new DangerousHTMLTagsFilter($markdown);
echo "Formatting markdown and removing HTML dangerous tags <br>";
displayCommentAsWebsite($filteredInput, $dangerousForumPostFromForm);
echo '<br><br>';