

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign up for an iDiscuss account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="partials/_handleSignup.php" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input
            type="email"
            name="signupemail"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
          />
          <small id="emailHelp" class="form-text text-muted"
            >We'll never share your email with anyone else.</small
          >
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input
            name="signuppassword"
            type="password"
            class="form-control"
            id="exampleInputPassword1"
          />
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1"> Confirm Password</label>
          <input
          name ="signupcpassword"
            type="password"
            class="form-control"
            id="exampleInputPassword1"
          />
          <small id="emailHelp" class="form-text text-muted"
            >Make sure to type the correct password as above.</small
          >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>

    </div>
  </div>
</div>