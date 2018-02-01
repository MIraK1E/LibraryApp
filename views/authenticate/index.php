<div class="card mx-auto" style="width:300px; margin-top:12%;">
    <div class="card-body">
        <h4><i class="fa fa-sign-in -fa-fw"></i> Login</h4>
        <hr>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <label for="username">Username</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username">
            </div>
            <label for="Password">Password</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-key fa-fw"></i></span>
                </div>
                <input type="password" class="form-control" name="Password" placeholder="Password">
            </div>
            <button class="btn btn-outline-info btn-block" name="submit">Login</button>
        </form>
    </div>
</div>
