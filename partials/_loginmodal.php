
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login in to iDiscuss </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="partials/_handlelogin.php" method="POST" >
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input
            name="lemail"
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input
            name="lpassword"
              type="password"
              class="form-control"
              id="exampleInputPassword1"
            />
          </div>
  
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    
    </div>
  </div>
</div>