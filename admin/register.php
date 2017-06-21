<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form role="form" action="sql/register.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input type="text" class="form-control" id="username" placeholder="login" name="username">
                    </div>
                    <div class="form-group">
                        <label for="name"><span class="glyphicon glyphicon-registration-mark"></span> Ismingiz</label>
                        <input type="text" class="form-control" id="name" placeholder="Ismingiz" name="name">
                    </div>
                    <div class="form-group">
                        <label for="surname"><span class="glyphicon glyphicon-eject"></span>Surname</label>
                        <input type="text" class="form-control" id="surname" placeholder="Familiya" name="surname">
                    </div>
                    <div class="form-group">
                        <label for="tel"><span class="glyphicon glyphicon-eye-open"></span> Telefon</label>
                        <input type="tel" class="form-control" id="tel" placeholder="Telefongiz" name="tel">
                    </div>
                    <div class="form-group">
                        <label for="mail"><span class="glyphicon glyphicon-inbox"></span>Elektron manzil</label>
                        <input type="email" class="form-control" id="mail" placeholder="Pochtangiz" name="mail">
                    </div>
                    <div class="form-group">
                        <label for="birthday"><span class="glyphicon glyphicon-calendar"></span> Tug`ilgan
                            yilingiz</label>
                        <input type="date" class="form-control" id="birthday" placeholder="Tug`ilgan sana"
                               name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="image"><span class="glyphicon glyphicon-open-file"></span>Rasmingiz</label>
                        <input type="file" class="form-control" id="image" placeholder="Rasmingiz" name="file">
                    </div>
                    <div class="form-group">
                        <label for="pass"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input type="password" class="form-control" id="pass" placeholder="password" name="pass">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" checked>Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block" name="submit"><span
                            class="glyphicon glyphicon-off"></span> Login
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> Cancel
                </button>
                <p>Not a member? <a href="#">Sign Up</a></p>
                <p>Forgot <a href="#">Password?</a></p>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function () {
        $("#myBtn1").click(function () {
            $("#myModal1").modal();
        });
    });
</script>

