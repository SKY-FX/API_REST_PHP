<?php ob_start(); ?>
    <form method="POST" action="<?= URL ?>back/connection" >
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name='email' type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name='password' type="password" class="form-control" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        <?php if ($badRequest) {?>
            <div class="mb-3">
                <p>TOTO</p>
            </div>
        <?php } ?>
    </form>

<?php 
$content = ob_get_clean();
$titre = "Page de connection<br/>Administrateur";
require "views/commons/template.php";