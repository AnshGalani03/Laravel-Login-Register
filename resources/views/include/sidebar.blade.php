  <!--start user details offcanvas-->
  <div class="offcanvas offcanvas-start w-260" data-bs-scroll="true" tabindex="-1" id="offcanvasUserDetails">
      <div class="offcanvas-body">
          <div class="user-wrapper">
              <div class="text-center p-3 bg-light rounded">
                  @if (Auth::user()->image)
                      <img src="/{{ Auth::user()->image }}" class="rounded-circle p-1 shadow mb-3" width="120"
                          height="120" alt="">
                  @else
                      <img src="https://placehold.co/110x110" class="rounded-circle p-1 shadow mb-3" width="120"
                          height="120" alt="">
                  @endif
                  <h5 class="user-name mb-0 fw-bold">{{ Auth::user()->fname }}</h5>
                  <p class="mb-0">Administrator</p>
              </div>
              <div class="list-group list-group-flush mt-3 profil-menu fw-bold">
                  <a href="#"
                      class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-top"><i
                          class="material-icons-outlined">person_outline</i>Profile</a>
                  <a href="/change-password"
                      class="list-group-item list-group-item-action d-flex align-items-center gap-2"><i
                          class="material-icons-outlined">lock_reset</i>Change Password</a>
                  <a href="/dashboard/"
                      class="list-group-item list-group-item-action d-flex align-items-center gap-2"><i
                          class="material-icons-outlined">dashboard</i>Dashboard</a>

                  <form action="{{ route('logout') }}" method="POST" class="d-flex">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                          class="list-group-item list-group-item-action d-flex align-items-center gap-2 border-bottom"><i
                              class="material-icons-outlined">power_settings_new</i>Logout</button>
                  </form>

              </div>
          </div>

      </div>
      <div class="offcanvas-footer p-3 border-top">
          <div class="text-center">
              <button type="button" class="btn d-flex align-items-center gap-2" data-bs-dismiss="offcanvas"><i
                      class="material-icons-outlined">close</i><span>Close Sidebar</span></button>
          </div>
      </div>
  </div>
  <!--end user details offcanvas-->
