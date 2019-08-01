<section class="site-section">
    <div class="container1">
        <div class="row">
            <div id="kolona" class="col-md-6">
                <h2 id="naslov" class="mb-5">Login Form</h2>
                <form method="post">

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control ">
                        </div>
                        <p id="erorMail"></p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control ">
                        </div>
                        <p id="erorS"></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <button type="button" onclick="loginProvera();" value="Log in" name="login" id="dugmee" class="btn btn-primary py-3 px-5">Log in</button>
                        </div>
                    </div>
                </form>

                <div id="poruka1"></div>



            </div>
        </div>
</section>