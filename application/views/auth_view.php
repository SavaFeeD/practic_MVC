<section class="container pt-5">

  <div class="container d-flex justify-content-center align-items-center">

      <h1 class="mr-5"><a href="/"><span class="text-warning">Authorization</span> <br/> <span class="mt-3">Crazy Tea Party</span></a></h1>

      <form class="w-50" action="/auth/auth" method="post">
        <?php if ($data): ?>
            <div class="alert alert-primary" role="alert">
                <?= $data ?>
            </div>
        <?php endif; ?>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
          </div>
        </div>
        <div class="form-group row w-100 d-flex justify-content-center align-items-center pl-4">
          <div class="w-100 d-flex justify-content-between">
            <a class="btn btn-outline-success col-2" href="/auth/register">Sing Up</a>
            <button type="submit" class="btn btn-block btn-primary col-9">Sign In</button>
          </div>
        </div>
      </form>

  </div>

</section>

<style>
a{
  text-decoration: none!important;
}
</style>
