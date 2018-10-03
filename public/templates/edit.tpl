{include file="inc/header.tpl"}

<div class="row mt-3">
    <div class="col-6">
        <form action="/update" method="POST">
            <input type="hidden" name="id" value="{$post.id}">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{$post.title}" autofocus>
            </div>
            <div class="form-group">
                <button class="btn btn-warning">Edit Post</button>
            </div>
        </form>
    </div>

    <div class="col-6">
        {if $image_name == ''}
            <h3>No image</h3>
            <form method="POST" action="/image_upload?id={$post.id}" enctype="multipart/form-data">
                <input type="file" name="image"><br><br>
                <input type="submit" value="Upload" class="btn btn-success">
            </form>
        {else}
            <img src="{$image_name}" class="img-thumbnail"><br>
            <a href="image_delete?id={$post.id}" class="btn btn-warning mt-2" onclick="return confirm('Are you sure?')">Delete image</a>
        {/if}
    </div>
</div>

{include file="inc/footer.tpl"}