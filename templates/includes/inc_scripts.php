<!-- scripts necessarios -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--Aleta-->
<script src="<?php echo JS . 'sweetalert.min.js'; ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

<!-- toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- waitme js -->
<script src="<?php echo PLUGINS . 'waitme/waitMe.min.js'; ?>"></script>

<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-auth.js"></script>
<?php if ($d->title == 'Login') : ?>
    <script src="<?php echo JS . 'login.js'; ?>"></script>
<?php elseif ($d->title == 'Flash') : ?>
    <script src="<?php echo JS . 'logout.js'; ?>"></script>
<?php else : ?>
<?php endif; ?>
<!-- Lightbox js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

<!-- Objeto Bee Javascript registrado -->
<?php echo load_bee_obj(); ?>

<!-- Scripts registrados manualmente -->
<?php echo load_scripts(); ?>

<!-- Scripts personalizados Bee Framework -->
<script src="<?php echo JS . 'main.js?v=' . get_version(); ?>"></script>