<div class="container">

    <form action="index.php?controller=user&task=signUp" method="POST" >

        <div class="form-group">
            <label for="username">Username</label>

            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">password</label>

            <input type="password" class="form-control" name="password" required>
        </div>        
        <div class="form-group">
            <label for="passwordTry">password again</label>

            <input type="password" class="form-control" name="passwordTry" required>
        </div>        
        <div class="form-group">
            <label for="email">email</label>

            <input type="email" class="form-control" name="email" required>
        </div>        

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="S'inscrire">
        </div>

    </form>
















</div>