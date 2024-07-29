<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card  p-4" style="max-width: 400px; width: 100%;">
        <h2 class="text-center">Login </h2>
        <form action="index.php?c=auth&a=login" method="POST">
            <?php if ( isset($errors)): ?>
                <div class="bg-danger text-light rounded text-center"><p class="p-1">
                        <?php
                        if (is_array($errors)) {
                            foreach ($errors as $error) {
                                echo $error . '<br>';
                            }
                        } else {
                            echo $errors;
                        }
                        ?>
                    </p></div>
            <?php endif; ?>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= htmlspecialchars($email ?? '') ?>">
            </div>
            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-warning btn-block w-100 mt-4">Login</button>
        </form>
        <a class="text-center pt-2" href="index.php?c=auth&a=create">Não possui conta?</a>
    </div>
</div>

