{include file="inc/header.tpl"}

{$create_data.login}

<div class="row">
    <div class="col-md-5">

        <form action="" method="POST" class="mt-2">
            <div class="form-group">
                <label for="InputLogin">Login</label>
                <input type="text" name="login" class="form-control" placeholder="Login" id="InputLogin" value="{$create_data.login}">
            </div>
            <div class="form-group">
                <label for="InputEmail">E-mail</label>
                <input type="text" name="email" class="form-control" placeholder="E-mail" id="InputEmail" value="{$create_data.email}">
            </div>
            <div class="form-group">
                <label for="InputNumber">Number</label>
                <input type="text" name="number" class="form-control" placeholder="Number" id="InputNumber" value="{$create_data.number}">
            </div>

            <input type="submit" class="btn btn-success" value="Отправить">
        </form>

    </div>
</div>

{if $validate_errors|count > 0}
<div class="row mt-3">
    <div class="col">
        <div class="border border-danger text-danger p-2 rounded">

        {foreach $validate_errors as $e}
            {$e}<br>
        {/foreach}

        </div>
    </div>
</div>
{/if}

{include file="inc/footer.tpl"}