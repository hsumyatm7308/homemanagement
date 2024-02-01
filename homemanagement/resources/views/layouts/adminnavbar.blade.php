	<!-- Start Top Sidebar -->
  <div class="col-lg-10 col-md-9 fixed-top ms-auto topnavbars">
    <div class="row">

      <nav class="navbar navbar-expand navbar-light  shadow">

        <!-- search -->
        <form class="me-auto" action="" method="">
          <div class="input-group">
            <input type="text" name="search" id="search"
              class="form-control border-0 shadow-none topnavsearchs"
              placeholder="Search Something..." />
            <div class="input-group-append">
              <button type="submit" class="btn topnavsearchbtns"><i
                  class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
        <!-- search -->

        <!-- notify & userlogout-->
        <ul class="navbar-nav me-5 pe-5">
          <!-- notify -->
          <li class="nav-item dropdowns">
            <a href="javascript:void(0);" class="nav-line dropbtn"
              onclick="dropbtn(event)">
              <i class="fas fa-bell"></i>
              <span class="badge bg-danger">5+</span>
            </a>

            <div class="dropdown-contents mydropdowns">
              <h6>Alert-Center</h6>
              <a href="javascript:void(0);" class="d-flex">
                <div>
                  <i class="fas fa-file-alt"></i>
                </div>
                <div>
                  <p class="small text-muted">3 May 2023</p>
                  <i>A new members created.</i>
                </div>
              </a>

              <a href="javascript:void(0);" class="d-flex">
                <div>
                  <i class="fas fa-database text-warning"></i>
                </div>
                <div>
                  <p class="small text-muted">3 May 2023</p>
                  <i>Some of your data are missing.</i>
                </div>
              </a>

              <a href="javascript:void(0);" class="d-flex">
                <div>
                  <i class="fas fa-user text-info"></i>
                </div>
                <div>
                  <p class="small text-muted">3 May 2023</p>
                  <i>New users are invited you.</i>
                </div>
              </a>

              <a href="javascript:void(0);" class="small text-muted text-center">Show
                All Notification</a>

            </div>

          </li>
          <!-- notify -->

          <!-- message -->
          <li class="nav-item dropdowns mx-3">
            <a href="javascript:void(0);" class="nav-line dropbtn"
              onclick="dropbtn(event)">
              <i class="fas fa-envelope"></i>
            </a>

            <div class="dropdown-contents mydropdowns">
              <h6>message-Center</h6>
              <a href="javascript:void(0);" class="d-flex">
                <div class="me-3">
                  <img src="./assets/img/users/user1.jpg" class="rounded-circle"
                    width="30" alt="user1" />
                </div>
                <div>
                  <p class="small text-muted">Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry.</p>
                  <i>Ms.July - 25m ago</i>
                </div>
              </a>

              <a href="javascript:void(0);" class="d-flex">
                <div class="me-3">
                  <img src="./assets/img/users/user2.jpg" class="rounded-circle"
                    width="30" alt="user2" />
                </div>
                <div>
                  <p class="small text-muted">Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry.</p>
                  <i>Mr.Anton - 40m ago</i>
                </div>
              </a>

              <a href="javascript:void(0);" class="d-flex">
                <div class="me-3">
                  <img src="./assets/img/users/user3.jpg" class="rounded-circle"
                    width="30" alt="user3" />
                </div>
                <div>
                  <p class="small text-muted">Lorem Ipsum is simply dummy text of
                    the printing and typesetting industry.</p>
                  <i>Ms.PaPa - 55m ago</i>
                </div>
              </a>

              <a href="javascript:void(0);" class="small text-muted text-center">Read
                More Message</a>

            </div>


          </li>
          <!-- message -->

          <!-- userlogout -->
          <li class="navitem dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle"
              data-bs-toggle="dropdown">
              <span class="text-white small me-2">{{Auth::user()->name}}</span>
              <img src="{{asset('assets/img/users/user1.jpg')}}" class="rounded-circle"
                width="25" />
            </a>
            <div class="dropdown-menu">
              <a href="javascript:void(0);" class="dropdown-item"><i
                  class="fas fa-user fa-sm text-muted me-2"></i> Profile</a>
              <a href="javascript:void(0);" class="dropdown-item"><i
                  class="fas fa-cogs fa-sm text-muted me-2"></i> Settings</a>
              <a href="javascript:void(0);" class="dropdown-item"><i
                  class="fas fa-list fa-sm text-muted me-2"></i> Activity Log</a>
              <div class="dropdown-divider"></div>
              <a href="javascript:void(0);" class="dropdown-item"><i
                  class="fas fa-sign-out-alt fa-sm text-muted me-2"></i>
                Logout</a>

            </div>
          </li>
          <!-- userlogout -->
        </ul>
        <!-- notify & userlogout-->

      </nav>

    </div>
  </div>
  <!-- End Top Sidebar -->