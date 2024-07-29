<div class="card mb-3">
    <div class="card-body row" style="min-height: 500px">
        <div class="col">
            <div class=" d-flex justify-content-center">
                <form id="profile-form" action="index.php?c=perfil&a=upload&id=<?= $user->id ?>" method="post" enctype="multipart/form-data">
                    <label for="file-input" style="cursor: pointer;">
                        <figure id="figure_perfil_img" class="figure position-relative d-inline-block">
                            <?php if ($user->userimage && $user->userimage->path): ?>
                                <img src="<?=$user->userimage->path  ?>" class="rounded-circle" alt="Profile Image" style="width: 140px; height: 140px;">
                            <?php else: ?>
                                <img src="public/img/profile.png" class="rounded-circle" alt="Profile Image" style="width: 140px; height: 140px;">
                            <?php endif; ?>
                            <span class="position-absolute end-0 bg-white rounded-circle p-2" style="margin-right: 7px; bottom: -5px !important;">
                                <i class="bi bi-arrow-up-left-circle-fill text-primary" style="font-size: 1.4rem"></i>
                            </span>
                        </figure>
                    </label>
                    <input type="file" id="file-input" class="d-none" name="profile_image">
                </form>
            </div>
            <div class="d-flex align-items-center my-2 ">
                <hr class="flex-grow-1  d-md-block">
                <span class="px-3" style="font-size: 0.7rem">Sobre mim</span>
                <hr class="flex-grow-1  d-md-block">
            </div>

            <p class="fs-6 fw-semibold m-0 align-self-baseline text-center">Bio</p>
            <p class="text-secondary mt-2 mb-0 text-break text-center" style="font-size: 0.8rem"><?php if (!is_null($user->perfil)){ echo $user->perfil->bio;} ?></p>
            <div class="d-flex mt-5 align-items-center gap-2">
                <p class="fs-6 fw-semibold m-0">Publicações:</p>
                <p class="text-secondary mb-0" style="font-size: 0.8rem">13</p>
            </div>
            <div class="d-flex mt-2 align-items-center gap-2">
                <p class="fs-6 fw-semibold m-0">Comentários recebidos:</p>
                <p class="text-secondary mb-0" style="font-size: 0.8rem">27</p>
            </div>
            <div class="d-flex mt-2 align-items-center gap-2">
                <p class="fs-6 fw-semibold m-0">Likes:</p>
                <p class="text-secondary mb-0" style="font-size: 0.8rem">17</p>
            </div>
        </div>
        <form class="needs-validation col-12 col-lg-8 row" method="POST"
            <?php if (!is_null($user->perfil)): ?>
              action="index.php?c=perfil&a=update&id=<?=$user->perfil->id?>"
            <?php else: ?>
                action="index.php?c=perfil&a=store"
            <?php endif; ?>
              style="margin-left: 0px">
                <div class="mt-4" style="padding-left: 0px">
                    <h4 class="fs-1">Informações</h4>
                    <hr class="mb-3">
                </div>
            <input type="hidden" class="form-control" name="user_id" value="<?= $user->id ?>">
            <?php if (isset($perfil) && !empty($perfil->errors->full_messages())): ?>
                <div class="p-3 mb-3 text-bg-danger rounded-3 d-flex">
                    <i class="bi bi-exclamation-circle-fill align-self-center"></i>
                    <ul  style="margin-bottom: 0px;">
                        <?php foreach ($perfil->errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="row g-2">
                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required
                                       value="<?php if(!is_null($user->perfil) && !isset($perfil)) { echo $user->perfil->username; }?><?php if(isset($perfil)) { echo $perfil->username; }?>">
                                <div class="invalid-feedback">
                                    Your username is required.
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 120px" maxlength="230" name="bio" required><?php if(!is_null($user->perfil) && !isset($perfil)) { echo $user->perfil->bio; }?><?php if(isset($perfil)) { echo $perfil->bio; }?></textarea>
                            <label for="floatingTextarea" style="left: 5px">Biografia</label>
                        </div>
                    </div>
                <?php if (!is_null($user) && is_null($user->perfil)): ?>
                    <button class="btn btn-success btn-lg align-self-end w-auto ms-auto" type="submit">Adicionar perfil</button>

                <?php else: ?>
                    <button class="btn btn-warning btn-lg align-self-end w-auto ms-auto" type="submit">Atualizar</button>

                <?php endif; ?>
            </form>
        <?php if (is_null($user->perfil)): ?>
            <div id="liveToast" class="animation-bounce toast align-items-center bg-warning border-0 text-dark position-absolute" style="right: 20px"  role="alert" aria-live="assertive" aria-atomic="true"
                 data-bs-delay="60000">
                <div class="d-flex">
                    <div class="toast-body">
                        Olá, preencha o seu perfil para ter mais funcionalidades!
                    </div>
                    <button type="button" class="btn-close btn-close-dark me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var toastEl = document.getElementById('liveToast');
        var toast = new bootstrap.Toast(toastEl, {
            autohide: true,
            delay: 10000 // tempo em milissegundos (5 segundos)

        });
        toast.show();
    });
    document.getElementById('file-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#figure_perfil_img img').src = e.target.result;
            };
            reader.readAsDataURL(file);
            document.getElementById('profile-form').submit();

        }
    });
</script>


