<?php include "./mvc/views/login/header.php"?>
    <div class="form">
        <form class="register-form" action="./register" method="post">
            <input type="text" placeholder="name" name="fullname"/>
            <input type="text" placeholder="email" name="email"/>
            <input type="password" placeholder="password" name="password"/>
            <input type="password" placeholder="Enter the password" name="password2"/>
            <input type="text" placeholder="phone" name="phone"/>
            <button type="submit" name="register">create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" method="post" action="./login/login_admin">
            <input type="text" placeholder="email" name="email" />
            <input type="password" placeholder="password" name="password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</div>
<?php include "./mvc/views/login/footer.php"?>