<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
      <div class="collapse navbar w-100 d-flex justify-content-center align-items-center" id="navbarResponsive">
        <a class="navbar-brand js-scroll-trigger" href="/">Crazy Tea Party</a>
      </div>
      <?php if (isset($_SESSION['admin'])): ?>
        <div class="collapse navbar d-flex justify-content-center align-items-center" id="navbarResponsive">
          <a class="btn btn-danger js-scroll-trigger" href="/admin/exit"><i class="fas fa-door-open"></i></a>
        </div>
      <?php endif; ?>
</nav>
