<?php if (!is_null($user) && !$user->perfil): ?>
    <div id="liveToast" class="animation-bounce toast align-items-center bg-warning border-0 text-dark position-fixed "
         style="right: 35px;bottom: 30px; z-index: 9999" role="alert" aria-live="assertive" aria-atomic="true"
         data-bs-delay="60000">
        <div class="d-flex  sticky-top">
            <div class="toast-body">
                Olá, preencha o seu perfil para ter mais funcionalidades!
            </div>
            <button type="button" class="btn-close btn-close-dark me-3 m-auto pe-2" data-bs-dismiss="toast"
                    aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<div class="position-relative row mt-4 ">
    <div class="col-12 col-md-12 col-lg-3 col-xl-3 mb-4 fs-6 order-1">
        <div id="rolante_left" class=" d-flex flex-column">
            <div class="card">
                <div class="card-body">

                    <h2>Categorias</h2>
                    <hr class="d-none d-md-block">

                    <ul class="list-group">
                        <li class="list-group-item d-flex gap-4 justify-content-between bg-warning list-group-item-action"
                            aria-current="true">
                            <div>
                 <span style="font-size: 1em; color: #282726;padding-right: 20px">
                   <i class="fa-solid fa-house"></i>
                 </span>
                                <span>Home</span>
                            </div>
                            <span class="align-self-end" style="font-size: 1em; color: #7b7a7a;">
                <i class="fa-solid fa-arrow-right"></i>
             </span>
                        </li>

                        <li class="list-group-item d-flex gap-4 justify-content-between list-group-item-action"
                            aria-current="true">
                            <div>
                 <span style="font-size: 1em; color: #282726;padding-right: 20px">
                    <i class="fa-solid fa-code"></i>
                 </span>
                                Programação
                            </div>
                            <span class="align-self-end" style="font-size: 1em; color: #7b7a7a;">
                <i class="fa-solid fa-arrow-right"></i>
             </span>
                        </li>

                        <li class="list-group-item d-flex gap-4 justify-content-between list-group-item-action"
                            aria-current="true">
                            <div>
                 <span style="font-size: 1em; color: #282726;padding-right: 20px">
                    <i class="fa-solid fa-comment"></i>
                 </span>
                                Debate
                            </div>
                            <span class="align-self-end" style="font-size: 1em; color: #7b7a7a;">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
    <div class="col order-3 order-md-3 order-lg-2">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center gap-2">
                    <?php if (!is_null($user) && $user->userimage): ?>
                        <img src="<?= $user->userimage->path ?>" class="rounded-circle" height="40" width="40">
                    <?php else: ?>
                        <i class="bi bi-person-circle" style="font-size: 1.5rem; color: cornflowerblue;"></i>
                    <?php endif; ?>

                    <div class="input-group rounded-5 position-relative ">
                        <input class="form-control rounded-5 z-1" placeholder="Escreva uma nota rápida">
                        <a href="index.php?c=post&a=create" class="input-group-text rounded-5 position-absolute end-0 z-2">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1">
            <div class="d-flex align-items-center my-2">
                <hr class="flex-grow-1 d-none d-md-block">
                <span class="px-2" style="font-size: 0.7rem">Publicações</span>
                <hr class="flex-grow-1 d-none d-md-block">
            </div>
            <div class="col mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <img src="public/img/foto1.jpg" class="rounded-circle" height="40" width="40">
                            <p class="fs-6 fw-semibold m-0">Vitinho</p>
                            <p class="text-secondary ms-auto mb-0" style="font-size: 0.8rem">23/07/2023</p>
                        </div>
                        <hr class="d-none d-md-block">
                        <h3 class="mt-4">Titulo post</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                    <img class="img-fluid border-bottom" src="public/img/foto1.jpg" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary" style="font-size: 0.8rem">8 likes</span>

                            <span class="text-secondary" style="font-size: 0.8rem">36 coméntarios</span>
                        </div>
                        <hr class="d-none d-md-block">
                        <div class="d-flex justify-content-around align-items-center">
                            <button class="ps-0 d-flex align-items-center bg-transparent btn-like">
                                     <span style="font-size: 1.7em; color: #282726;padding-right: 5px;  padding-left: 10px;">
                                        <i class="fa-regular fa-thumbs-up"></i>
                                     </span>
                                <h4 class="fs-6 mb-0">gostei</h4>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            <img src="public/img/foto1.jpg" class="rounded-circle" height="40" width="40">
                            <p class="fs-6 fw-semibold m-0">Vitinho</p>
                            <p class="fs-6 text-secondary ms-auto mb-0">23/07/2023</p>
                        </div>
                        <hr class="d-none d-md-block">
                        <h3 class="mt-4">Titulo post</h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                    <!--                    <img class=" img-fluid border-bottom" src="public/img/foto1.jpg"  alt="...">-->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary" style="font-size: 0.8rem">8 likes</span>

                            <span class="text-secondary" style="font-size: 0.8rem">36 coméntarios</span>
                        </div>
                        <hr class="d-none d-md-block">

                        <div class="d-flex justify-content-around align-items-center">
                            <button class="ps-0 d-flex align-items-center bg-transparent" style="border: none">
                                     <span style="font-size: 1.4em; color: #282726;padding-right: 10px">
                                        <i class="fa-regular fa-thumbs-up"></i>
                                     </span>
                                <h4 class="fs-6 mb-0">gostei</h4>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Comentar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                         xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                         preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-2">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                         xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                         preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-3 col-xl-3 mb-4 fs-6 order-2  order-md-2">
        <div id="rolante_right">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fs-5 fw-semibold">Posts mais relevantes</h5>
                    <hr class="d-none d-md-block" style="margin-bottom: 0px;">
                </div>
                <div class="d-flex flex-column action card-body">
                    <span class="" style="font-size: 0.7rem; font-weight: 500; color: black">Mafra é atacada</span>
                    <span class=""
                          style="font-size: 0.7rem; font-weight: 300; color: #7b7a7a">há 1 hora • 17 1414 likes</span>
                </div>
                <div class="d-flex flex-column action card-body">
                    <span class="" style="font-size: 0.7rem; font-weight: 500; color: black">Mafra é atacada</span>
                    <span class=""
                          style="font-size: 0.7rem; font-weight: 300; color: #7b7a7a">há 1 hora • 17 1414 likes</span>
                </div>
                <div class="d-flex flex-column action card-body">
                    <span class="" style="font-size: 0.7rem; font-weight: 500; color: black">Mafra é atacada</span>
                    <span class=""
                          style="font-size: 0.7rem; font-weight: 300; color: #7b7a7a">há 1 hora • 17 1414 likes</span>
                </div>
                <div class="d-flex flex-column action card-body">
                    <span class="" style="font-size: 0.7rem; font-weight: 500; color: black">Mafra é atacada</span>
                    <span class=""
                          style="font-size: 0.7rem; font-weight: 300; color: #7b7a7a">há 1 hora • 17 1414 likes</span>
                </div>
                <div class="d-flex flex-column action card-body">
                    <span class="" style="font-size: 0.7rem; font-weight: 500; color: black">Mafra é atacada</span>
                    <span class=""
                          style="font-size: 0.7rem; font-weight: 300; color: #7b7a7a">há 1 hora • 17 1414 likes</span>
                </div>
                <img src="public/img/foto2.png" class="img-fluid" height="300">
            </div>
        </div>
    </div hei>
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
</script>