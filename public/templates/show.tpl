{include file="inc/header.tpl"}

<h1 class="mt-3">{$post.title}</h1>

<hr>

{if $image_name != ''}
<img src="{$image_name}" class="img-thumbnail">
{/if}

{include file="inc/footer.tpl"}