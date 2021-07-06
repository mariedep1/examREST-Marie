<div class="container">


    <form action="index.php?controller=user&task=signIn" method="POST" >

        <div class="form-group">
            <label for="username">Username</label>

            <input type="text" class="form-control" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">password</label>

            <input type="password" class="form-control" name="password" required>
        </div>        

        <div class="form-group">
        <input type="submit" class="btn btn-success" value="Se connecter">
        </div>
    </form>


    
   


</div>