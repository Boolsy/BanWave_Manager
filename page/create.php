<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="text-center">Create an account</h5>
                <form action="index.php?page=app/create" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="login"></label>
                        <input type="text" class="form-control" id="login" name="username" placeholder="User" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd"></label>
                        <input type="password" class="form-control" id="pwd" name="password" placeholder="Password"
                               required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn-grad">Create an account</button>
                    </div>
                </form>
                <p class="text-center">Already have an account ? <a href="index.php?page=app/login">Login</a></p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
