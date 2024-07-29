<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-4" style="max-width: 400px; width: 100%;">
        <h2 class="text-center">Criar conta</h2>
        <form action="index.php?c=auth&a=store" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= htmlspecialchars($user->email ?? '') ?>">
                <?php if ( isset($user->errors) && $user->errors->on('email')): ?>
                    <div class="text-danger">
                        <p>
                            <?php
                            if (is_array($user->errors->on('email'))) {
                                foreach ($user->errors->on('email') as $error) {
                                    echo $error . '<br>';
                                }
                            } else {
                                echo $user->errors->on('email');
                            }
                            ?>
                        </p>
                    </div>

                <?php endif; ?>
            </div>
            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <?php if (isset($user->errors) && $user->errors->on('password')): ?>
                    <div class="text-danger">
                        <p>
                            <?php
                                if (is_array($user->errors->on('password'))) {
                                    foreach ($user->errors->on('password') as $error) {
                                        echo $error . '<br>';
                                    }
                                } else {
                                    echo $user->errors->on('password');
                                }
                            ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-group mt-2">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                <?php if (isset($user->errors) && $user->errors->on('password_confirmation')): ?>
                    <div class="text-danger">
                        <p>
                            <?php
                            if (is_array($user->errors->on('password_confirmation'))) {
                                foreach ($user->errors->on('password_confirmation') as $error) {
                                    echo $error . '<br>';
                                }
                            } else {
                                echo $user->errors->on('password_confirmation');
                            }
                            ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-warning btn-block w-100 mt-4">Criar conta</button>
        </form>
        <a class="text-center pt-2" href="index.php?c=auth&a=index">Já possui conta?</a>
    </div>
</div>

