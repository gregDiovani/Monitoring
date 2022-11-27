
<?php


?>

<body>


    <div class="form-screen">
        <a href="/" class="spur-logo"><i class="fas fa-bolt"></i> <span>S-Power</span></a>
        <?php if(isset($model['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><?= $model['error'] ?></h4>
            </div>
        <?php } ?>
        <div class="card account-dialog">
            <div class="card-header bg-primary text-white"> Please sign in </div>
            <div class="card-body">
                <form action="/user/postLogin" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"  class="form-control" id="InputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" onclick="myFunction()" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Show My password</label>
                        </div>
                    </div>
                    <div class="account-dialog-actions">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                        <!-- <a class="account-dialog-link" href="signup.html">Create a new account</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("InputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>



